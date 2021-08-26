<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once '../login_check.php';
	
	//設定ファイル読み込み
	require_once '../conf.php';
	include ('../parts/function.php');
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

<h1>体験キャスト設定</h1>
<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>

<p class="align_center"><?php echo $day1; ?>の体験人数設定</p>
<form class="form1" action="wright.php" method="post">
<select name="taiken_num" class="w_px90">
<?php
$a = file('taiken.csv');
$b = explode(',',$a[0]);
$b[0] = str_replace("\r\n" , "" , $b[0]);

$data = file('num.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];

	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $b[0]) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>
<br />
<br />
<input type="submit" class="w_px100" value="設定" />
</form>

<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>
