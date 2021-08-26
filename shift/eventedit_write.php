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
	
	$sche[$i] = str_replace("\r\n" , "" , $sche[$i]); //改行コードを削除
}
//書込みデータを結合
$data = array($id,$sche[1],$sche[2],$sche[3],$sche[4],$sche[5],$sche[6],$sche[7],$sche[8],$sche[9],$sche[10],$sche[11],$sche[12],$sche[13],$sche[14],$sche[15],$sche[16],$sche[17],$sche[18],$sche[19],$sche[20],$sche[21],$sche[22],$sche[23],$sche[24],$sche[25],$sche[26],$sche[27],$sche[28],$sche[29],$sche[30],$sche[31]);
$data = implode(',' , $data);
$data = $data . "\n";
//CSVファイルへ書き込み
$filename = 'sche.csv';
$handle = fopen($filename , 'w');
flock($handle , LOCK_EX);
fputs($handle , $data);
fclose($handle);
 ?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>イベントスケジュール編集完了</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="container">
<h1><?php print $now_month; ?>月のイベントスケジュール編集完了</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">
<div align="center">
登録完了しました。</div>
</div>


<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>