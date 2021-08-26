// UTF-8
/**
 * scrollsmoothly.js
 * Copyright (c) 2008 KAZUMiX
 * http://d.hatena.ne.jp/KAZUMiX/20080418/scrollsmoothly
 * Licensed under the MIT License:
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * 譖ｴ譁ｰ螻･豁ｴ
 * 2009/02/12
 * 繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ蜈医′逕ｻ髱｢蟾ｦ荳翫↓縺ｪ繧峨↑縺�ｴ蜷医�謖吝虚繧剃ｿｮ豁｣
 * 2008/04/18
 * 蜈ｬ髢
 *
*/

(function(){
   var easing = 0.25;
   var interval = 20;
   var d = document;
   var targetX = 0;
   var targetY = 0;
   var targetHash = '';
   var scrolling = false;
   var splitHref = location.href.split('#');
   var currentHref_WOHash = splitHref[0];
   var incomingHash = splitHref[1];
   var prevX = null;
   var prevY = null;

   // 繝峨く繝･繝｡繝ｳ繝郁ｪｭ縺ｿ霎ｼ縺ｿ螳御ｺ�凾縺ｫinit()繧貞ｮ溯｡後☆繧
   addEvent(window, 'load', init);

   // 繝峨く繝･繝｡繝ｳ繝郁ｪｭ縺ｿ霎ｼ縺ｿ螳御ｺ�凾縺ｮ蜃ｦ逅
   function init(){
     // 繝壹�繧ｸ蜀�Μ繝ｳ繧ｯ縺ｫ繧､繝吶Φ繝医ｒ險ｭ螳壹☆繧
     setOnClickHandler();
     // 螟夜Κ縺九ｉ繝壹�繧ｸ蜀�Μ繝ｳ繧ｯ莉倥″縺ｧ蜻ｼ縺ｳ蜃ｺ縺輔ｌ縺溷ｴ蜷
     if(incomingHash){
       if(window.attachEvent && !window.opera){
         // IE縺ｮ蝣ｴ蜷医�縺｡繧�▲縺ｨ蠕�▲縺ｦ縺九ｉ繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ
         setTimeout(function(){scrollTo(0,0);setScroll('#'+incomingHash);},50);
       }else{
         // IE莉･螟悶�縺昴�縺ｾ縺ｾGO
         scrollTo(0, 0);
         setScroll('#'+incomingHash);
       }
     }
   }

   // 繧､繝吶Φ繝医ｒ霑ｽ蜉縺吶ｋ髢｢謨ｰ
   function addEvent(eventTarget, eventName, func){
     if(eventTarget.addEventListener){
       // 繝｢繝繝ｳ繝悶Λ繧ｦ繧ｶ
       eventTarget.addEventListener(eventName, func, false);
     }else if(window.attachEvent){
       // IE
       eventTarget.attachEvent('on'+eventName, function(){func.apply(eventTarget);});
     }
   }
   
   function setOnClickHandler(){
     var links = d.links;
     for(var i=0; i<links.length; i++){
       // 繝壹�繧ｸ蜀�Μ繝ｳ繧ｯ縺ｪ繧峨せ繧ｯ繝ｭ繝ｼ繝ｫ縺輔○繧
       var link = links[i];
       var splitLinkHref = link.href.split('#');
       if(currentHref_WOHash == splitLinkHref[0] && d.getElementById(splitLinkHref[1])){
         addEvent(link, 'click', startScroll);
       }
     }
   }

   function startScroll(event){
     // 繝ｪ繝ｳ繧ｯ縺ｮ繝�ヵ繧ｩ繝ｫ繝亥虚菴懊ｒ谿ｺ縺
     if(event){ // 繝｢繝繝ｳ繝悶Λ繧ｦ繧ｶ
       event.preventDefault();
       //alert('modern');
     }else if(window.event){ // IE
       window.event.returnValue = false;
       //alert('ie');
     }
     // this縺ｯ蜻ｼ縺ｳ蜃ｺ縺怜�縺ｫ縺ｪ縺｣縺ｦ繧
     setScroll(this.hash);
   }

   function setScroll(hash){
     // 繝上ャ繧ｷ繝･縺九ｉ繧ｿ繝ｼ繧ｲ繝�ヨ隕∫ｴ縺ｮ蠎ｧ讓吶ｒ繧ｲ繝�ヨ縺吶ｋ
     var targetEle = d.getElementById(hash.substr(1));
     if(!targetEle)return;
     //alert(scrollSize.height);
     // 繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ蜈亥ｺｧ讓吶ｒ繧ｻ繝�ヨ縺吶ｋ
     var ele = targetEle;
     var x = 0;
     var y = 0;
     while(ele){
       x += ele.offsetLeft;
       y += ele.offsetTop;
       ele = ele.offsetParent;
     }
     var maxScroll = getScrollMaxXY();
     targetX = Math.min(x, maxScroll.x);
     targetY = Math.min(y, maxScroll.y);
     targetHash = hash;
     // 繧ｹ繧ｯ繝ｭ繝ｼ繝ｫ蛛懈ｭ｢荳ｭ縺ｪ繧峨せ繧ｯ繝ｭ繝ｼ繝ｫ髢句ｧ
     if(!scrolling){
       scrolling = true;
       scroll();
     }
   }

   function scroll(){
     var currentX = d.documentElement.scrollLeft||d.body.scrollLeft;
     var currentY = d.documentElement.scrollTop||d.body.scrollTop;
     var vx = (targetX - currentX) * easing;
     var vy = (targetY - currentY) * easing;
     var nextX = currentX + vx;
     var nextY = currentY + vy;
     if((Math.abs(vx) < 1 && Math.abs(vy) < 1)
       || (prevX === currentX && prevY === currentY)){
       // 逶ｮ讓吝ｺｧ讓吩ｻ倩ｿ代↓蛻ｰ驕斐＠縺ｦ縺�◆繧臥ｵゆｺ
       scrollTo(targetX, targetY);
       scrolling = false;
       location.hash = targetHash;
       prevX = prevY = null;
       return;
     }else{
       // 郢ｰ繧願ｿ斐＠
       scrollTo(parseInt(nextX), parseInt(nextY));
       prevX = currentX;
       prevY = currentY;
       setTimeout(function(){scroll()},interval);
     }
   }
   
   function getDocumentSize(){
     return {width:Math.max(document.body.scrollWidth, document.documentElement.scrollWidth), height:Math.max(document.body.scrollHeight, document.documentElement.scrollHeight)};
   }

   function getWindowSize(){
     var result = {};
     if(window.innerWidth){
       var box = d.createElement('div');
       with(box.style){
         position = 'absolute';
         top = '0px';
         left = '0px';
         width = '100%';
         height = '100%';
         margin = '0px';
         padding = '0px';
         border = 'none';
         visibility = 'hidden';
       }
       d.body.appendChild(box);
       var width = box.offsetWidth;
       var height = box.offsetHeight;
       d.body.removeChild(box);
       result = {width:width, height:height};
     }else{
       result = {width:d.documentElement.clientWidth || d.body.clientWidth, height:d.documentElement.clientHeight || d.body.clientHeight};
     }
     return result;
   }
   
   function getScrollMaxXY() {
     if(window.scrollMaxX && window.scrollMaxY){
       return {x:window.scrollMaxX, y:window.scrollMaxY};
     }
     var documentSize = getDocumentSize();
     var windowSize = getWindowSize();
     return {x:documentSize.width - windowSize.width, y:documentSize.height - windowSize.height};
   }
   
 }());