<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once '../login_check.php';
	
	//設定ファイル読み込み
	require_once '../conf.php';


//一覧ページからのデータ
$id = $_POST['id'];
$title = $_POST['title'];
$photo1 = $_POST['photo1'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>写真登録・変更</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">

<h1>写真登録・変更</h1>
<ul id="menu"><?php include ('../parts/menu3.php'); ?></ul>
<div id="under_line"></div>
<p>タイトル「<?php echo $title; ?>」の書込みへの画像登録です。</p>
<p class="col_red">※商品の写真登録です。必ず横600px以下のJPEG画像を指定してください。</p>
<table border="1" bordercolor="#333333">
<form action="upload_photo.php" method="post" enctype="multipart/form-data">

<tr>
<td class="w_px80"><?php
if ($photo1 == $empty) {
	echo '<p>未登録です。</p>';
} else {
	echo '<img src="' . $photo1 . '_bbss.jpg" alt="photo1" />';
}
?></td>
<td class="valign_middle"><p>写真：<input class="w_per50" type="file" name="photo1" />
&nbsp;<?php
if($photo1!=$empty){
	echo "<input type=\"checkbox\" name=\"delete1\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<td colspan="2"><p>※処理に時間がかかる場合があります。ボタンを一度押してしばらくお待ちください。</p>
  <p><input class="w_px100" type="submit" value="登録" /></p></td>
</form>
</tr>
</table>

<?php include ('bbsmenu.php'); ?>
<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>