<?php
//セッションの復元
session_start();
//ログインチェック
require_once '../../shift/login_check.php';
//設定ファイル読み込み
require_once '../../shift/conf.php';

//フォームからデータ受け取り
$id = $_POST['id'];
$wdate = $_POST['wdate'];
$bbstitle = $_POST['bbstitle'];
$input = $_POST['input'];
$photo1 = $_POST['photo1'];
$jpeg = $_POST['jpeg'];

$input = str_replace('\\' , '' , $input);



//書込みデータを結合
$data = array($id,$wdate,$bbstitle,$input,$photo1,$jpeg,$blank);
$data = implode(',' , $data);
$data = $data . "\n";

//CSVファイルへ書き込み
$filename = 'bbs.csv';
$handle = fopen($filename , 'a');
flock($handle , LOCK_EX);
fputs($handle , $data);
fclose($handle);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登録完了</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

<h1>登録完了しました。</h1>

<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>
新規書き込み成功しました
<table width="100%">
<tr>
<th width="51%">日付</th>
<td width="49%"><?php echo $wdate; ?></td>
</tr>
<tr>
<th>タイトル</th>
<td><?php echo $bbstitle; ?></td>
</tr>
<tr>
<th>書き込み内容</th>
<td><?php echo $input; ?></td>
</tr>
</table>
<?php include'bbsmenu.php'; ?>
<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>
