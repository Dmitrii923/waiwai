<?php
//セッションの復元
session_start();
//ログインチェック
require_once '../login_check.php';
//設定ファイル読み込み
require_once '../conf.php';
//ファンクションファイル読み込み
require_once '../parts/function.php';

//編集・削除ページからデータを受け取る
$id = $_POST['id'];
$wdate = $_POST['wdate'];
$bbstitle = $_POST['bbstitle'];
$input = $_POST['input'];
$edit = $_POST['edit'];
$photo1 = $_POST['photo1'];
$jpeg = $_POST['jpeg'];

//データを整形
$wdate = mb_convert_kana($wdate,'KVnr','utf-8');
$bbstitle =mb_convert_kana($bbstitle,'KVnr','utf-8');
$input = mb_convert_kana($input,'KVnr','utf-8');
//[,]を除去
$wdate = str_replace(',' , '' , $wdate);
$bbstitle = str_replace(',' , '' , $bbstitle);
$input = str_replace(',' , '' , $input);
//追加
$input = str_replace('\\' , '' , $input);
//改行コードの前に改行タグを入れる
$input = nl2br($input);
//改行コードを削除
$input = str_replace("\r\n" , "" , $input);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>編集・削除完了</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

<h1>編集</h1>

<?php
//書込みデータを結合
$line = array($id,$wdate,$bbstitle,$input,$photo1,$jpeg,$blank);
$line = implode(',' , $line);
$line = $line . "\n";

//配列入れ替え
$data = file('bbs.csv');
for($i=0;$i<sizeof($data);$i++) {
	$lines = explode(',' , $data[$i]);
	if ($lines[0] == $id) {
		if ($edit == 'edit') {
			array_splice($data , $i , 1 , $line);
		} elseif ($edit == 'delete') {
			array_splice($data , $i , 1);
		}
	}
}

//CSVファイルへ書き込み
$handle = fopen('bbs.csv' , 'w');
flock($handle , LOCK_EX);
foreach($data as $item)fputs($handle , $item);
fclose($handle);
?>
<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>
<p>作業が完了しました。</p>
<?php include'bbsmenu.php'; ?>
<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</div>
</body>
</html>
