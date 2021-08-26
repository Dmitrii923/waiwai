<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';


$id = $_POST['id'];
	$name2 = $_POST['name2'];
	$sort_button = $_POST['sort_button'];
	
	//CSVから該当データを取り出して変数に代入
	$data = file('data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	
	if($line[2] == $name2) {
		include('parts/basic_hensu.php');
	}
}
if($sort_button == '1'){
$photo1 = $_POST['photo2'];
$photo2 = $_POST['photo1'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '2'){
$photo1 = $_POST['photo2'];
$photo2 = $_POST['photo1'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '3'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo3'];
$photo3 = $_POST['photo2'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '4'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo3'];
$photo3 = $_POST['photo2'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '5'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo4'];
$photo4 = $_POST['photo3'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '6'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo4'];
$photo4 = $_POST['photo3'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '7'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo5'];
$photo5 = $_POST['photo4'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '8'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo5'];
$photo5 = $_POST['photo4'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '9'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo6'];
$photo6 = $_POST['photo5'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '10'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo6'];
$photo6 = $_POST['photo5'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '11'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo7'];
$photo7 = $_POST['photo6'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '12'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo7'];
$photo7 = $_POST['photo6'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '13'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo8'];
$photo8 = $_POST['photo7'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '14'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo8'];
$photo8 = $_POST['photo7'];
$photo9 = $_POST['photo9'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '15'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo9'];
$photo9 = $_POST['photo8'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '16'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo9'];
$photo9 = $_POST['photo8'];
$photo10 = $_POST['photo10'];
}elseif($sort_button == '17'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo10'];
$photo10 = $_POST['photo9'];
}elseif($sort_button == '18'){
$photo1 = $_POST['photo1'];
$photo2 = $_POST['photo2'];
$photo3 = $_POST['photo3'];
$photo4 = $_POST['photo4'];
$photo5 = $_POST['photo5'];
$photo6 = $_POST['photo6'];
$photo7 = $_POST['photo7'];
$photo8 = $_POST['photo8'];
$photo9 = $_POST['photo10'];
$photo10 = $_POST['photo9'];
}else{
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
}
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

<h1>写真表示順・変更</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<p style="font-size:12px; color: #F03;">写真の順番を変える場合矢印ボタンで位置を変え、下の『並び順を決定』ボタンをクリックして下さい。</p>
<p style="font-size:16px; color: #F03;">※一枚目の写真は必ず縦写真ににして下さい！横写真を一枚目にすると写真画像が荒れてしまいます。</p>
<table width="100%" align="center">
  <tr>
    <td width="17%" bgcolor="#CCCCCC">1枚目</td>
<td width="49%"><?php
if ($photo1 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo1 . '_p.jpg" alt="photo1" />';
}
?></td>
<td width="34%" align="center">
  <p><?php
if($photo1!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="1" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
</tr><tr>
<td bgcolor="#CCCCCC">2枚目</td>
<td><?php
if ($photo2 == $empty) {
	echo '<img src="photo/no_photo_p.jpg" alt="準備中" />';
} else {
	echo '<img src="' . $photo2 . '_p.jpg" alt="photo2" />';
}
?></td>
<td align="center"><p><?php
if($photo2!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="2" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo2!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="3" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo3!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="4" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo3!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="5" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo4!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="6" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo4!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="7" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo5!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="8" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo5!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="9" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo6!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="10" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo6!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="11" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo7!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="12" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo7!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="13" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo8!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="14" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo8!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="15" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo9!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="16" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?>　
  <?php
if($photo9!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="17" />
<input type="submit" value="↓" /></form>
GOLGO;
}
?></p></td>
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
<td align="center"><p><?php
if($photo10!=$empty){
echo <<<GOLGO
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input type="hidden" name="sort_button" value="18" />
<input type="submit" value="↑" /></form>
GOLGO;
}
?></p></td>
</tr>
<tr>
  <td colspan="3"><form action="sort_write.php" method="post">
  <input type="hidden" name="id" value="<?php echo $id; ?>" />
<input type="hidden" name="name" value="<?php echo $name; ?>" />
<input type="hidden" name="name2" value="<?php echo $name2; ?>" />
<input type="hidden" name="age" value="<?php echo $age; ?>" />
<input type="hidden" name="height" value="<?php echo $height; ?>" />
<input type="hidden" name="weight" value="<?php echo $weight; ?>" />
<input type="hidden" name="bust" value="<?php echo $bust; ?>" />
<input type="hidden" name="cup" value="<?php echo $cup; ?>" />
<input type="hidden" name="waist" value="<?php echo $waist; ?>" />
<input type="hidden" name="hip" value="<?php echo $hip; ?>" />
<?php $comment = str_replace("<br />" , "\r\n" , $comment); ?>
<input type="hidden" name="comment" value="<?php echo $comment; ?>" />
<input type="hidden" name="profinfo1" value="<?php echo $profinfo1; ?>" />
<input type="hidden" name="profinfo2" value="<?php echo $profinfo2; ?>" />
<input type="hidden" name="profinfo3" value="<?php echo $profinfo3; ?>" />
<input type="hidden" name="profinfo4" value="<?php echo $profinfo4; ?>" />
<input type="hidden" name="profinfo5" value="<?php echo $profinfo5; ?>" />
<input type="hidden" name="profinfo6" value="<?php echo $profinfo6; ?>" />
<input type="hidden" name="profinfo7" value="<?php echo $profinfo7; ?>" />
<input type="hidden" name="profinfo8" value="<?php echo $profinfo8; ?>" />
<input type="hidden" name="profinfo9" value="<?php echo $profinfo9; ?>" />
<input type="hidden" name="profinfo10" value="<?php echo $profinfo10; ?>" />
<input type="hidden" name="option1" value="<?php echo $option1; ?>" />
<input type="hidden" name="option2" value="<?php echo $option2; ?>" />
<input type="hidden" name="option3" value="<?php echo $option3; ?>" />
<input type="hidden" name="option4" value="<?php echo $option4; ?>" />
<input type="hidden" name="option5" value="<?php echo $option5; ?>" />
<input type="hidden" name="option6" value="<?php echo $option6; ?>" />
<input type="hidden" name="option7" value="<?php echo $option7; ?>" />
<input type="hidden" name="option8" value="<?php echo $option8; ?>" />
<input type="hidden" name="option9" value="<?php echo $option9; ?>" />
<input type="hidden" name="option10" value="<?php echo $option10; ?>" />
<input type="hidden" name="option11" value="<?php echo $option11; ?>" />
<input type="hidden" name="option12" value="<?php echo $option12; ?>" />
<input type="hidden" name="option13" value="<?php echo $option13; ?>" />
<input type="hidden" name="option14" value="<?php echo $option14; ?>" />
<input type="hidden" name="option15" value="<?php echo $option15; ?>" />
<input type="hidden" name="option16" value="<?php echo $option16; ?>" />
<input type="hidden" name="option17" value="<?php echo $option17; ?>" />
<input type="hidden" name="option18" value="<?php echo $option18; ?>" />
<input type="hidden" name="option19" value="<?php echo $option19; ?>" />
<input type="hidden" name="option20" value="<?php echo $option20; ?>" />
<input type="hidden" name="option21" value="<?php echo $option21; ?>" />
<input type="hidden" name="option22" value="<?php echo $option22; ?>" />
<input type="hidden" name="option23" value="<?php echo $option23; ?>" />
<input type="hidden" name="option24" value="<?php echo $option24; ?>" />
<input type="hidden" name="option25" value="<?php echo $option25; ?>" />
<input type="hidden" name="option26" value="<?php echo $option26; ?>" />
<input type="hidden" name="option27" value="<?php echo $option27; ?>" />
<input type="hidden" name="option28" value="<?php echo $option28; ?>" />
<input type="hidden" name="option29" value="<?php echo $option29; ?>" />
<input type="hidden" name="option30" value="<?php echo $option30; ?>" />
<input type="hidden" name="option31" value="<?php echo $option31; ?>" />
<input type="hidden" name="option32" value="<?php echo $option32; ?>" />
<input type="hidden" name="option33" value="<?php echo $option33; ?>" />
<input type="hidden" name="option34" value="<?php echo $option34; ?>" />
<input type="hidden" name="option35" value="<?php echo $option35; ?>" />
<input type="hidden" name="option36" value="<?php echo $option36; ?>" />
<input type="hidden" name="option37" value="<?php echo $option37; ?>" />
<input type="hidden" name="option38" value="<?php echo $option38; ?>" />
<input type="hidden" name="option39" value="<?php echo $option39; ?>" />
<input type="hidden" name="option40" value="<?php echo $option40; ?>" />
<input type="hidden" name="photo1" value="<?php echo $photo1; ?>" />
<input type="hidden" name="photo2" value="<?php echo $photo2; ?>" />
<input type="hidden" name="photo3" value="<?php echo $photo3; ?>" />
<input type="hidden" name="photo4" value="<?php echo $photo4; ?>" />
<input type="hidden" name="photo5" value="<?php echo $photo5; ?>" />
<input type="hidden" name="photo6" value="<?php echo $photo6; ?>" />
<input type="hidden" name="photo7" value="<?php echo $photo7; ?>" />
<input type="hidden" name="photo8" value="<?php echo $photo8; ?>" />
<input type="hidden" name="photo9" value="<?php echo $photo9; ?>" />
<input type="hidden" name="photo10" value="<?php echo $photo10; ?>" />
<input type="hidden" name="yotei1" value="<?php echo $yotei1; ?>" />
<input type="hidden" name="start1" value="<?php echo $start1; ?>" />
<input type="hidden" name="end1" value="<?php echo $end1; ?>" />
<input type="hidden" name="yotei2" value="<?php echo $yotei2; ?>" />
<input type="hidden" name="start2" value="<?php echo $start2; ?>" />
<input type="hidden" name="end2" value="<?php echo $end2; ?>" />
<input type="hidden" name="yotei3" value="<?php echo $yotei3; ?>" />
<input type="hidden" name="start3" value="<?php echo $start3; ?>" />
<input type="hidden" name="end3" value="<?php echo $end3; ?>" />
<input type="hidden" name="yotei4" value="<?php echo $yotei4; ?>" />
<input type="hidden" name="start4" value="<?php echo $start4; ?>" />
<input type="hidden" name="end4" value="<?php echo $end4; ?>" />
<input type="hidden" name="yotei5" value="<?php echo $yotei5; ?>" />
<input type="hidden" name="start5" value="<?php echo $start5; ?>" />
<input type="hidden" name="end5" value="<?php echo $end5; ?>" />
<input type="hidden" name="yotei6" value="<?php echo $yotei6; ?>" />
<input type="hidden" name="start6" value="<?php echo $start6; ?>" />
<input type="hidden" name="end6" value="<?php echo $end6; ?>" />
<input type="hidden" name="yobi1" value="<?php echo $yobi1; ?>" />
<input type="hidden" name="yobi2" value="<?php echo $yobi2; ?>" />
<input type="hidden" name="yobi3" value="<?php echo $yobi3; ?>" />
<input type="hidden" name="yobi4" value="<?php echo $yobi4; ?>" />
<input type="hidden" name="yobi5" value="<?php echo $yobi5; ?>" />
<input type="hidden" name="yobi6" value="<?php echo $yobi6; ?>" />
<input type="hidden" name="yobi7" value="<?php echo date('Ymd' , time() + (144+$jisa)*3600); ?>" />
<input type="hidden" name="yobi8" value="<?php echo $yobi8; ?>" />
<input type="hidden" name="yobi9" value="<?php echo $yobi9; ?>" />
<input type="hidden" name="yobi10" value="<?php echo $yobi10; ?>" />
<input type="hidden" name="edittime" value="<?php echo date('md' , time() + $jisa*3600); ?>" />
<input type="hidden" name="operation" value="edit" />
<!-- 表示期限日 -->

<p class="col_red">登録には時間がかかる場合があります。ボタンは一度だけ押してください。</p>
<p align="center"><input type="submit" class="w_px100" value="並び順を決定" />
</p>
</form></td>
  </tr>
</table>
<br />
<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>

</body>
</html>