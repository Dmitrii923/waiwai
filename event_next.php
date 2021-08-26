<?php
//設定ファイル読み込み
require_once 'shift/conf.php';
//ファンクションファイル読み込み
require_once 'shift/parts/function.php';

$now_year = date("Y"); //現在の年を取得
 $now_month = date("n"); //現在の月を取得
 $now_day = date("j"); //現在の日を取得
 $countdate = date("t",strtotime(date('Y-m-1').' +1 month')) ;  //来月の日数を取得
 $weekday = array("日","月","火","水","木","金","土"); //曜日の配列作成
 
 $id = $_GET['id'];
 
 $data = file('shift/sche2.csv');
for($i=0;$i<sizeof($data);$i++){
	$line = explode(',' , $data[$i]);
	if($line[0] == $id){
		for( $k=1; $k <= 31; $k++ ){
$sche[$k]= $line[$k];
 }
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?>年<?php print $next_month; ?>月の月間イベント</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />     

</head>

<body>

<div id="header_bg2">
  <h1>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h1>
  <div id="header"><img src="img/logo2.png" width="1024" height="98" /></div>
</div>
<div id="button"><?php include ('php/menu.php'); ?></div>
<div id="main_bg2">
  <div id="blackarea"></div>
  <div id="pagenavi"><h2>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h2>
  <p></p>
  <p>｜<a href="index.php" title="群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」">トップページ</a> ＞＞ <strong><?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?>年<?php print $next_month; ?>月の月間イベント</strong></p></div>
  <div id="hoka_main">
    <div id="left"><?php include ('php/left.php'); ?></div>
    <div id="right"><img src="img/eventpage.jpg" width="790" height="129" /><div id="event_naka"><div class="box"><?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?>年<?php print $next_month; ?>月のイベントスケジュール</div>
  <div id="event_next"><a href="event.php?id=<?php print $now_year; ?><?php print $now_month; ?>">&gt;&gt;<?php print $now_month; ?>月のイベントスケジュール</a></div>
  <br>
<div id="clear"></div>
      <table cellspacing="0">
  <?php
  
 //一覧表示
 for( $day=1; $day <= $countdate; $day++ ){ //今月の日数分ループする
  
     //各日付の曜日を数値で取得
     //曜日用の配列$weekdayを使い、$weekday[$w+]で日本語の曜日が取得できる
    if ($now_month=='12'){
     $w = date("w", mktime( 0, 0, 0, $next_month, $day, $next_year) );
	  }else{
		  $w = date("w", mktime( 0, 0, 0, $next_month, $day, $now_year) );
	  }
	   
 //スタイルシートの値設定ここから-----------------------------------
  
  switch( $w ){
     case 0: //日曜日の文字色
         $style = "color:#000;background:#FFD4E8;";
         break;
     case 6: //土曜日の文字色
         $style = "color:#000;background:#DAF1FD;";
         break;
     default: //月～金曜日の文字色
         $style = "color:#000;";
 }
 //スタイルシートの値設定ここまで-----------------------------------
  
 $line = $day."日（".$weekday[$w]."）"; //１行の定義：日付（曜日）

  
 //スタイルシートを挿入・1行ごとに改行して出力
 echo '<tr><td width="150" style="'.$style.'">'.$line."</td><td style=\"$style\">".$sche[$day]."</td></tr>\n";

 }
  echo "\n";
 ?></table></div></div>
    <div id="clear"></div>
  </div>
  <div id="footer"><?php include ('php/sitemap.php'); ?>
</div>
</div>
</body>
</html>