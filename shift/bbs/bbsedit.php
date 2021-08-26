<?php
//セッションの復元
session_start();
//ログインチェック
require_once '../login_check.php';
//設定ファイル読み込み
require_once '../conf.php';
//ファンクションファイル読み込み
require_once '../parts/function.php';

//一覧ページからデータを受け取る
$id = $_GET['id'];

//CSVファイルからデータを呼び出し
$data = file('bbs.csv');
for($i=0;$i<sizeof($data);$i++){
	$line = explode(',' , $data[$i]);
	if($line[0] == $id){
		$wdate = $line[1];
		$bbstitle = $line[2];
		$input = $line[3];
		$photo1 = $line[4];
		$jpeg = $line[5];
	}
}
$input = str_replace("<br />" , "\r\n" , $input);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ニュース編集削除</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

<h1>ニュース編集</h1>
<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>
<form action="bbsrewrite.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<p align="left">日付：<br /><input name="wdate" type="text" class="w_px150" value="<?php echo $wdate; ?>" /></p>
<p align="left">題名：<br /><input name="bbstitle" type="text" class="w_px150" value="<?php echo $bbstitle; ?>" /></p>
<p align="left">商品説明：<br /><textarea name="input" cols="50" rows="15" class="w_px80" id="input"><?php echo $input; ?></textarea></p>
<p align="left"><select name="edit">
<option value="edit">編集</option>
<option value="delete">削除</option>
</select></p>
<p align="left">※編集または削除します。よろしいですか？</p>
<input name="photo1" type="hidden" value="<?php echo $photo1; ?>" />
<input name="jpeg" type="hidden" value="<?php echo $jpeg; ?>" />
<p><input name="submit" type="submit" class="w_px100" value="実行" />
</p>
</form>

<?php include'bbsmenu.php'; ?>

<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>
