/**
 * クロスフェードするロールオーバー処理
 * rollover2.js
 * Copyright (c) 2007 KAZUMiX
 * http://d.hatena.ne.jp/KAZUMiX/20071017/rollover2
 * 
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * 更新履歴
 * 2009/06/02 ブラウザの「戻る」でフェード状態が残っている場合に対処
 * 2007/10/17 公開
 */

(function(){
   // ページ遷移時に透明にする用
   var rolloverImages = [];
   
   function setRollOver2(){
     if(!document.images){return;}
     var imgs = document.images;
     var insert = [];
     for(var i=0,len=imgs.length; i<len; i++){
       var splitname = imgs[i].src.split('_rollout.');
       if(splitname[1]){
         var rolloverImg = document.createElement('img');
         rolloverImages.push(rolloverImg);
         rolloverImg.src = splitname[0]+'_rollover.'+splitname[1];
         var alpha = 0;
         rolloverImg.currentAlpha = alpha;
         rolloverImg.style.opacity = alpha/100;
         rolloverImg.style.filter = 'alpha(opacity='+alpha+')';
         rolloverImg.style.position = 'absolute';

         //ロールオーバー・アウト処理それぞれを設定
         addEvent(rolloverImg,'mouseover',function(){setFader(this,100);});
         addEvent(rolloverImg,'mouseout',function(){setFader(this,0);});

         // 後で追加するために追加場所と共に保存しておく
         // この時点で追加するとdocument.imagesが書き換わって不都合
         insert[insert.length] = {position:imgs[i],element:rolloverImg};
       }
     }
     // ↑で作ったロールオーバー画像を追加
     for(i=0,len=insert.length; i<len ;i++){
       var parent = insert[i].position.parentNode;
       parent.insertBefore(insert[i].element,insert[i].position);
     }

     // ページ遷移時にはフェード状態をクリアする
     addEvent(window,'beforeunload', clearRollover);
   }

   // 指定要素を指定透明度にするためのフェードアニメを設定する関数

   function setFader(targetObj,targetAlpha){
     targetObj.targetAlpha = targetAlpha;
     if(targetObj.currentAlpha==undefined){
       targetObj.currentAlpha = 100;
     }
     if(targetObj.currentAlpha==targetObj.targetAlpha){
       return;
     }
     if(!targetObj.fading){
       if(!targetObj.fader){
         targetObj.fader = fader;
       }
       targetObj.fading = true;
       targetObj.fader();
     }
   }

   // アルファ値をターゲット値に近づける関数
   // ターゲット値になったら終了

   function fader(){
     this.currentAlpha += (this.targetAlpha - this.currentAlpha)*0.2;
     if(Math.abs(this.currentAlpha-this.targetAlpha)<1){
       this.currentAlpha = this.targetAlpha;
       this.fading = false;
     }
     var alpha = parseInt(this.currentAlpha);
     this.style.opacity = alpha/100;
     this.style.filter = 'alpha(opacity='+alpha+')';
     if(this.fading){
       var scope = this;
       setTimeout(function(){fader.apply(scope)},30);
     }
   }
   
   // すべてのロールオーバー画像をを透明にする関数（遷移時用）

   function clearRollover(){
     for(var i=0,len=rolloverImages.length; i<len; i++){
       var image = rolloverImages[i];
       image.style.opacity = 0;
       image.style.filter = 'alpha(opacity=0)';
     }
   }

   // イベントを追加する関数

   function addEvent(eventTarget, eventName, func){
     if(eventTarget.addEventListener){
       // モダンブラウザ
       eventTarget.addEventListener(eventName, func, false);
     }else if(window.attachEvent){
       // IE
       eventTarget.attachEvent('on'+eventName, function(){func.apply(eventTarget);});
     }
   }

   addEvent(window,'load',setRollOver2);

 })();
