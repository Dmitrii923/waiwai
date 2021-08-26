<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';


//一覧ページからのデータ
$name = $_POST['name'];
$name2 = $_POST['name2'];
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>写真登録・変更</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">

<h1>写真登録・変更</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<p>「<?php echo $name; ?>」ちゃんの写真登録または変更画面です。</p>
<p class="col_red">※女の子写真登録です。一枚目は必ず横600x縦900pxのJPEG画像（縦写真）を指定してください。<br />
二枚目以降は600x900px（縦写真）または900x600px（横写真）を指定してください。</p>
<table width="100%">
<form action="upload_photo.php" method="post" enctype="multipart/form-data">

<tr>
  <td width="14%" bgcolor="#CCCCCC">1枚目</td>
  <td width="35%"><?php
if ($photo1 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo1 . '_p.jpg" alt="photo1" />';
}
?></td>
  <td width="51%"><p>写真（1）：<input class="w_per50" type="file" name="photo1" />
    &nbsp;<?php
if($photo1!=$empty){
	echo "<input type=\"checkbox\" name=\"delete1\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">2枚目</td>
  <td><?php
if ($photo2 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo2 . '_p.jpg" alt="photo2" />';
}
?></td>
  <td><p>写真（2）：<input class="w_per50" type="file" name="photo2" />
    &nbsp;<?php
if($photo2!=$empty){
	echo "<input type=\"checkbox\" name=\"delete2\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">3枚目</td>
  <td><?php
if ($photo3 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo3 . '_p.jpg" alt="photo3" />';
}
?></td>
  <td><p>写真（3）：<input class="w_per50" type="file" name="photo3" />
    &nbsp;<?php
if($photo3!=$empty){
	echo "<input type=\"checkbox\" name=\"delete3\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">4枚目</td>
  <td><?php
if ($photo4 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo4 . '_p.jpg" alt="photo4" />';
}
?></td>
  <td><p>写真（4）：<input class="w_per50" type="file" name="photo4" />
    &nbsp;<?php
if($photo4!=$empty){
	echo "<input type=\"checkbox\" name=\"delete4\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">5枚目</td>
  <td><?php
if ($photo5 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo5 . '_p.jpg" alt="photo5" />';
}
?></td>
  <td><p>写真（5）：<input class="w_per50" type="file" name="photo5" />
    &nbsp;<?php
if($photo5!=$empty){
	echo "<input type=\"checkbox\" name=\"delete5\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">6枚目</td>
  <td><?php
if ($photo6 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo6 . '_s.jpg" alt="photop" />';
}
?></td>
  <td><p>写真（6）：<input class="w_per50" type="file" name="photo6" />
    &nbsp;<?php
if($photo6!=$empty){
	echo "<input type=\"checkbox\" name=\"delete6\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">7枚目</td>
  <td><?php
if ($photo7 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo7 . '_p.jpg" alt="photo7" />';
}
?></td>
  <td><p>写真（7）：<input class="w_per50" type="file" name="photo7" />
    &nbsp;<?php
if($photo7!=$empty){
	echo "<input type=\"checkbox\" name=\"delete7\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">8枚目</td>
  <td><?php
if ($photo8 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo8 . '_p.jpg" alt="photo8" />';
}
?></td>
  <td><p>写真（8）：<input class="w_per50" type="file" name="photo8" />
    &nbsp;<?php
if($photo8!=$empty){
	echo "<input type=\"checkbox\" name=\"delete8\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">9枚目</td>
  <td><?php
if ($photo9 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo9 . '_p.jpg" alt="photo9" />';
}
?></td>
  <td><p>写真（9）：<input class="w_per50" type="file" name="photo9" />
    &nbsp;<?php
if($photo9!=$empty){
	echo "<input type=\"checkbox\" name=\"delete9\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>

<tr>
  <td bgcolor="#CCCCCC">10枚目</td>
  <td><?php
if ($photo10 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo10 . '_p.jpg" alt="photo10" />';
}
?></td>
  <td><p>写真（10）：<input class="w_per50" type="file" name="photo10" />
    &nbsp;<?php
if($photo10!=$empty){
	echo "<input type=\"checkbox\" name=\"delete10\" value=\"delete\" />&nbsp;削除";
}
?>
</p></td>
</tr>


<tr>
<input type="hidden" name="name2" value="<?php echo $name2; ?>" />
<td colspan="3"><p class="col_red">※処理に時間がかかる場合があります。ボタンを一度押してしばらくお待ちください。</p>
  <p><input class="w_px100" type="submit" value="登録" /></p></td>
</form>
<tr>
  <td>  
  </tr>
</table>

<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>

</body>
</html>