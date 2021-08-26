<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';

$now_year = date("Y"); //現在の年を取得
 $now_month = date("n"); //現在の月を取得
 $now_day = date("j"); //現在の日を取得
 $countdate = date("t",strtotime('+1 month'));  //来月の日数を取得
 $weekday = array("日","月","火","水","木","金","土"); //曜日の配列作成
 
 $id = $_GET['id'];
 
 $data = file('../shift/sche2.csv');
for($i=0;$i<sizeof($data);$i++){
	$line = explode(',' , $data[$i]);
	if($line[0] == $id){
		for( $k=1; $k <= 31; $k++ ){
$sche[$k]= $line[$k];
 }
	}
}
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?>年<?php print $next_month; ?>月の月間イベント｜群馬県館林市のガールズバー「WaiWai合衆国」モバイル版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のモバイル版 月間イベントページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,モバイル版,月間イベント">

</head>

<body bgcolor="#010080" text="#ffffff" link="#e70014" vlink="#990000">
<table width="240" border="1" bordercolor="#010080" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">
    <img src="img/logo.jpg" width="240" height="56" alt="館林 ガールズバー「WaiWai合衆国」" /><br />
    </td>
  <tr>
  <tr>
    <td bgcolor="#010080" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#df0000" colspan="2">
    <font color="#FFFFFF" size="2">■EVENT　<font size="1"><?php if($now_month=='12'){echo $next_year;}
else{echo $now_year;} ?>年<?php print $next_month; ?>月｜月間イベント</font></font>
    </td>
  </tr>
  </table>
<br />
  <table width="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td>
    <font size="1">
    <a href="event.php?id=<?php print $now_year; ?><?php print $now_month; ?>">&gt;&gt;<?php print $now_month; ?>月のイベントスケジュール</a>
    </font>
    </td>
  </tr>
  </table>
<br />
<table width="240" border="1" cellpadding="0" cellspacing="0">
  <font size="1">
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
         $style = "color:#C30;background:#FEF0EF;";
         break;
     case 6: //土曜日の文字色
         $style = "color:#03C;background:#F0F8FF;";
         break;
     default: //月～金曜日の文字色
         $style = "color:#fff;";
 }
 

  
 if( $day == $now_day ){
     $style = $style." background:silver"; //今日の背景色
 }
 //スタイルシートの値設定ここまで-----------------------------------
  
 $line = $day."日（".$weekday[$w]."）"; //１行の定義：日付（曜日）

  
 //スタイルシートを挿入・1行ごとに改行して出力
 echo '<tr><td width="80" style="'.$style.'">'.$line."</td><td style=\"$style\">".$sche[$day]."</td></tr>\n";

 }
  echo "\n";
 ?>
  </font>
  </table>
  <table width="240" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td bgcolor="#010080" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#df0000" colspan="2">
    <font color="#FFFFFF" size="2">■MENU</font>
    </td>
  </tr>
  <tr>
    <td colspan="2">
    <br />
	<?php include ('php/menum.php'); ?><br />
    <br />
    </td>
  </tr>
  <tr>
    <td bgcolor="#df0000" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
    <br />
	<?php include ('php/data.php'); ?><br />
    <br />
    </td>
  </tr>
  <tr>
    <td bgcolor="#df0000" align="center" colspan="2">
    <font color="#ffffff" size="1">
    <br />
    copyright (c) 2013 e-nomiya. <br />
    All Rights Reserved.</font><br />
    <br />
    </td>
  </tr>
</table>

</body>
</html>
