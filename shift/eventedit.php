<?php
//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
 $now_year = date("Y"); //現在の年を取得
 $now_month = date("n"); //現在の月を取得
 $now_day = date("j"); //現在の日を取得
 $countdate = date("t"); //今月の日数を取得
 $weekday = array("日","月","火","水","木","金","土"); //曜日の配列作成 
 $id = $_GET['id'];
 
 $data = file('sche.csv');
for($i=0;$i<sizeof($data);$i++){
	$line = explode(',' , $data[$i]);
	if($line[0] == $id){
		for( $k=1; $k <= 31; $k++ ){
$sche[$k]= $line[$k];
 }
	}
}
 for( $i=1; $i <= 31; $i++ ){
$sche[$i] = str_replace("<br />" , "\r\n" , $sche[$i]); //改行コードを削除
 }
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>イベントスケジュール編集</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="container">

<h1><?php print $now_month; ?>月のイベントスケジュール編集</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">

<form action="eventedit_check.php" method="post">
<table width="100%">

<?php

$j = $now_year.$now_month;

if ($id != $j) {
				echo $id;
			}else{
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
 
$i = sche.$day;

 //スタイルシートを挿入・1行ごとに改行して出力
 echo '<tr><td><div style="'.$style.'">'.$line."</div></td><td><textarea name=\"$i\" type=\"text\" class=\"w_px50\" />".$sche[$day]."</textarea></td></tr>\n";
 }
  echo "</tr></table>\n";
			}
 ?>
 <input type="hidden" name="id" value="<?php echo $id; ?>">
 
<input class="w_px100" type="submit" value="登録" /><br /><br />
</form>
</div>


<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>