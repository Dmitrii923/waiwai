<?php
//設定ファイル読み込み
require_once('../conf.php');

//フォームからの生データ
$taiken_num = $_POST['taiken_num'];

//設定日の日付
$limit = $tdy;

//書込みデータを結合
$data = array($taiken_num,$limit);
$data = implode(',' , $data);
$data = $data . "\n";

//CSVファイルへ書き込み
$filename = 'taiken.csv';
$handle = fopen($filename , 'w');
flock($handle , LOCK_EX);
fputs($handle , $data);
fclose($handle);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>体験キャスト設定</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="taiken.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">

<h1>体験キャスト設定完了</h1>
<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>

<p class="taiken_midashi"><?php echo $day1; ?>の体験出勤人数は「<?php echo $taiken_num; ?>」人です。</p>

<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>
