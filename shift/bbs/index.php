<?php
//セッションの復元
session_start();
//ログインチェック
require_once '../login_check.php';
//設定ファイル読み込み
require_once '../conf.php';

//確認フォームから戻ってきたデータ
$wdate = $_POST['wdate'];
$bbstitle = $_POST['bbstitle'];
$bbscont = $_POST['input'];
//新規IDを取得
$id=time('U');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新規ニュース書き込み</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />

</head>

<body>
<div id="container">

<h1>新規ニュース書き込み</h1>
<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>
<p align="left" style="margin-top:15px; margin-bottom:15px;"><a href="disp.php"><img src="../img/sub2.jpg" width="300" height="67" /></a></p>
<form action="check.php" method="post" enctype="multipart/form-data">
<p align="left">日付（自動入力）：<br /><input name="wdate" type="text" class="w_px150" value="
<?php
if($wdate == $empty){
	echo date('Y年m月d日');
}else{
	echo $wdate;
}
?>" />
</p>
<p align="left">タイトル：<br /><input name="bbstitle" type="text" class="w_px150" value="<?php echo $bbstitle; ?>" />
</p>
<p align="left">写真登録：<br />
  <input class="w_per50" type="file" name="photo1" /></p>
<p align="left">商品説明：<br /><textarea name="input" cols="50" rows="15" class="w_px80" id="input"><?php echo $input; ?></textarea>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
</p>
<p><input name="submit" type="submit" class="w_px100" value="確認" />
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
