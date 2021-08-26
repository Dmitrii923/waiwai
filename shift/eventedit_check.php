<?php
require_once('conf.php');
 $now_year = date("Y"); //現在の年を取得
 $now_month = date("n"); //現在の月を取得
 $now_day = date("j"); //現在の日を取得
 $countdate = date("t"); //今月の日数を取得
 $weekday = array("日","月","火","水","木","金","土"); //曜日の配列作成
 
 $id = $_POST['id'];
 
 for( $i=1; $i <= 31; $i++ ){
	$sche[$i] = $_POST['sche'.$i];
	$sche[$i] = mb_convert_encoding($sche[$i],'UTF-8','AUTO');
	$sche[$i] = mb_convert_kana($sche[$i],'KaV','utf-8');
	$sche[$i] = str_replace(',' , '' , $sche[$i]);
	$sche[$i] = nl2br($sche[$i]); //改行コードの前に改行タグを入れる
	$sche[$i] = str_replace("\r\n" , "" , $sche[$i]); //改行コードを削除
}
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>イベントスケジュール登録確認</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="container">

<h1><?php print $now_month; ?>月のイベントスケジュール登録確認</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">

<table width="100%">
<?php

 //見出し部分出力
 echo "<tr><td colspan=\"2\"><div>".$now_year.'年'.$now_month."月のイベントスケジュール</div></td></tr>\n";
 
  
 //一覧表示
 for( $day=1; $day <= $countdate; $day++ ){ //今月の日数分ループする
  
     //各日付の曜日を数値で取得
     //曜日用の配列$weekdayを使い、$weekday[$w+]で日本語の曜日が取得できる
     $w = date("w", mktime( 0, 0, 0, $now_month, $day, $now_year) );
	   
 //スタイルシートの値設定ここから-----------------------------------
  
 switch( $w ){
     case 0: //日曜日の文字色
         $style = "color:#C30;";
         break;
     case 6: //土曜日の文字色
         $style = "color:#03C;";
         break;
     default: //月～金曜日の文字色
         $style = "color:#333;";
 }
   
 if( $day == $now_day ){
     $style = $style." background:silver"; //今日の背景色
 }
 //スタイルシートの値設定ここまで-----------------------------------
  
 $line = $day."日（".$weekday[$w]."）"; //１行の定義：日付（曜日）

  
 //スタイルシートを挿入・1行ごとに改行して出力
 echo '<tr><td width="20%"><div style="'.$style.'">'.$line."</div></td><td>".$sche[$day]."</td></tr>\n";

 }
  echo "</tr></table>\n";
 ?>
 
 <form action="eventedit_write.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <?php
	for ($i=1; $i <= 31; $i++) {
		echo '<input type="hidden" name="sche' . $i . '" value="' . $sche[$i] . '">';
	}
?>
<input type="submit" class="w_px100" value="スケジュールを送信する">
</form>
</div>


<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>