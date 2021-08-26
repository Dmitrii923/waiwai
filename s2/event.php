<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';

$now_year = date("Y"); //現在の年を取得
 $now_month = date("n"); //現在の月を取得
 $now_day = date("j"); //現在の日を取得
 $countdate = date("t"); //今月の日数を取得
 $weekday = array("日","月","火","水","木","金","土"); //曜日の配列作成
 
 $id = $_GET['id'];
 
 $data = file('../shift/sche.csv');
for($i=0;$i<sizeof($data);$i++){
	$line = explode(',' , $data[$i]);
	if($line[0] == $id){
		for( $k=1; $k <= 31; $k++ ){
$sche[$k]= $line[$k];
 }
	}
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title><?php print $now_year; ?>年<?php print $now_month; ?>月の月間イベント｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版<?php print $now_year; ?>年<?php print $now_month; ?>月のイベントページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,月間イベント">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">

<script type="text/javascript" src="_shared/js/smoothScroll.js"></script>

<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="iphone.png">

</head>
<body>
<header id="top">
  <img src="img/top.jpg" width="100%" alt="館林 ガールズバー「WaiWai合衆国」"><br />
        <section>
          <div align="center">
            <button type="button" onClick="location.href='index.php'" class="css3button2" style="width:90px;height:90px"><img src="img/home.png"><br />ホーム</button>
            <button type="button" onClick="location.href='tel:0276'" class="css3button2" style="width:90px;height:90px"><img src="img/tel.png"><br />電話</button>
            <button type="button" onClick="location.href='schedule.php?sche=0'" class="css3button2" style="width:90px;height:90px"><img src="img/schedule.png"><br />出勤情報</button>
            </div>
        </section>
  <h1>館林 ガールズバー「WaiWai合衆国」</h1>
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <strong><?php print $now_year; ?>年<?php print $now_month; ?>月のイベント</strong></p>
</header>

<h2 class="heading"><?php print $now_year; ?>年<?php print $now_month; ?>月のイベント　<span id="hd">Event Info</span></h2>
<div id="wrap">

<div id="shop_event">
  <div class="event_next">
  <a href="event_next.php?id=<?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?><?php print $next_month; ?>"><?php print $next_month; ?>月のイベント ＞＞</a>
  </div>
  <table class="event_t">
  <?php
  
 //一覧表示
 for( $day=1; $day <= $countdate; $day++ ){ //今月の日数分ループする
  
     //各日付の曜日を数値で取得
     //曜日用の配列$weekdayを使い、$weekday[$w+]で日本語の曜日が取得できる
     $w = date("w", mktime( 0, 0, 0, $now_month, $day, $now_year) );
	   
 //スタイルシートの値設定ここから-----------------------------------
  
 switch( $w ){
     case 0: //日曜日の文字色
         $style = "event sun";
         break;
     case 6: //土曜日の文字色
         $style = "evnt sat";
         break;
     default: //月～金曜日の文字色
         $style = "";
 }
 

  
 if( $day == $now_day ){
     $style = $style." background:silver"; //今日の背景色
 }
 //スタイルシートの値設定ここまで-----------------------------------
  
 $line = $day."日（".$weekday[$w]."）"; //１行の定義：日付（曜日）

  
 //スタイルシートを挿入・1行ごとに改行して出力
 echo '<tr class="'.$style.'"><td class="data">'.$line."</td><td class=\"naiyou\"><p class=\"cmt\">".$sche[$day]."</p></td></tr>\n";

 }
  echo "\n";
 ?>
  </table>
  <div class="event_next">
  <a href="event_next.php?id=<?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?><?php print $next_month; ?>"><?php print $next_month; ?>月のイベント ＞＞</a>
  </div>
</div>

<?php include ('php/menu.php'); ?>

</div>
<div id="footContent" class="clearfix">
  <p id="btnTop"><a href="#top">Page Top</a></p>
</div>
<hr>
<?php include ('php/shopdata.php'); ?>

</body>
</html>