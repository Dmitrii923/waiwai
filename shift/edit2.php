<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$name2 = $_GET['name2'];

//データを読み込み
$data = file('data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	if ($line[2] == $name2) {
		include('parts/basic_hensu.php');
		include('parts/function.php');
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出勤情報編集</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />

</head>

<body>
<div id="container2">
<form action="rewrite2.php" method="post">
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
<?php echo $name; ?>ちゃんの出勤情報<br />
<table width="100%">
<tr>
<th class="th2"><?php echo $day1 . '(' . $week1 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day2 . '(' . $week2 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day3 . '(' . $week3 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day4 . '(' . $week4 . ')' ?>の出勤</th>
</tr>
<tr>
<td align="left" class="td2">

<?php
$getdays=getDays($tdy_8dig,$yobi7);

if($getdays<1){
echo <<<GOLGO
<input type="radio" name="yotei1" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei1" value="3" />出勤<br />
GOLGO;
}else{
if ($yotei1 == '2') {
echo <<<GOLGO
<input type="radio" name="yotei1" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei1" value="3" />出勤<br />
GOLGO;
} elseif ($yotei1 == '3') {
echo <<<GOLGO
<input type="radio" name="yotei1" value="2" />お休み<br />
<input type="radio" name="yotei1" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yotei1" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei1" value="3" />出勤<br />
GOLGO;
}
}
?></td>
<td align="left" class="td2">
<?php
if($getdays<2){
echo <<<GOLGO
<input type="radio" name="yotei2" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei2" value="3" />出勤<br />
GOLGO;
}else{
if ($yotei2 == '2') {
echo <<<GOLGO
<input type="radio" name="yotei2" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei2" value="3" />出勤<br />
GOLGO;
} elseif ($yotei2 == '3') {
echo <<<GOLGO
<input type="radio" name="yotei2" value="2" />お休み<br />
<input type="radio" name="yotei2" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yotei2" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei2" value="3" />出勤<br />
GOLGO;
}
}
?></td>
<td align="left" class="td2">
<?php
if($getdays<3){
echo <<<GOLGO
<input type="radio" name="yotei3" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei3" value="3" />出勤<br />
GOLGO;
}else{
if ($yotei3 == '2') {
echo <<<GOLGO
<input type="radio" name="yotei3" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei3" value="3" />出勤<br />
GOLGO;
} elseif ($yotei3 == '3') {
echo <<<GOLGO
<input type="radio" name="yotei3" value="2" />お休み<br />
<input type="radio" name="yotei3" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yotei3" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei3" value="3" />出勤<br />
GOLGO;
}
}
?></td>
<td align="left" class="td2">
<?php
if($getdays<4){
echo <<<GOLGO
<input type="radio" name="yotei4" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei4" value="3" />出勤<br />
GOLGO;
}else{
if ($yotei4 == '2') {
echo <<<GOLGO
<input type="radio" name="yotei4" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei4" value="3" />出勤<br />
GOLGO;
} elseif ($yotei4 == '3') {
echo <<<GOLGO
<input type="radio" name="yotei4" value="2" />お休み<br />
<input type="radio" name="yotei4" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yotei4" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei4" value="3" />出勤<br />
GOLGO;
}
}
?></td>
</tr>
<tr>
<th class="th2"><?php echo $day5 . '(' . $week5 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day6 . '(' . $week6 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day7 . '(' . $week7 . ')' ?>の出勤</th>
<th class="th2">&nbsp;</th>
</tr>
<tr>
<td align="left" class="td2">

<?php
if($getdays<5){
echo <<<GOLGO
<input type="radio" name="yotei5" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei5" value="3" />出勤<br />
GOLGO;
}else{
if ($yotei5 == '2') {
echo <<<GOLGO
<input type="radio" name="yotei5" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei5" value="3" />出勤<br />
GOLGO;
} elseif ($yotei5 == '3') {
echo <<<GOLGO
<input type="radio" name="yotei5" value="2" />お休み<br />
<input type="radio" name="yotei5" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yotei5" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei5" value="3" />出勤<br />
GOLGO;
}
}
?></td>
<td align="left" class="td2">
<?php
if($getdays<6){
echo <<<GOLGO
<input type="radio" name="yotei6" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei6" value="3" />出勤<br />
GOLGO;
}else{
if ($yotei6 == '2') {
echo <<<GOLGO
<input type="radio" name="yotei6" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei6" value="3" />出勤<br />
GOLGO;
} elseif ($yotei6 == '3') {
echo <<<GOLGO
<input type="radio" name="yotei6" value="2" />お休み<br />
<input type="radio" name="yotei6" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yotei6" value="2" checked="checked" />お休み<br />
<input type="radio" name="yotei6" value="3" />出勤<br />
GOLGO;
}
}
?></td>
<td align="left" class="td2">
<?php
if($getdays<7){
echo <<<GOLGO
<input type="radio" name="yobi4" value="2" checked="checked" />お休み<br />
<input type="radio" name="yobi4" value="3" />出勤<br />
GOLGO;
}else{
if ($yobi4 == '2') {
echo <<<GOLGO
<input type="radio" name="yobi4" value="2" checked="checked" />お休み<br />
<input type="radio" name="yyobi4" value="3" />出勤<br />
GOLGO;
} elseif ($yobi4 == '3') {
echo <<<GOLGO
<input type="radio" name="yobi4" value="2" />お休み<br />
<input type="radio" name="yobi4" value="3" checked="checked" />出勤<br />
GOLGO;
} else {
echo <<<GOLGO
<input type="radio" name="yobi4" value="2" checked="checked" />お休み<br />
<input type="radio" name="yobi4" value="3" />出勤<br />
GOLGO;
}
}
?></td>
<td align="left" class="td2">&nbsp;</td>
</tr>
</table>
<input type="hidden" name="yobi1" value="<?php echo $yobi1; ?>" />
<input type="hidden" name="yobi2" value="<?php echo $yobi2; ?>" />
<input type="hidden" name="yobi3" value="<?php echo $yobi3; ?>" />
<input type="hidden" name="yobi7" value="<?php echo date('Ymd' , time() + (144+$jisa)*3600); ?>" />
<input type="hidden" name="yobi8" value="<?php echo $yobi8; ?>" />
<input type="hidden" name="yobi9" value="<?php echo $yobi9; ?>" />
<input type="hidden" name="yobi10" value="<?php echo $yobi10; ?>" />
<input type="hidden" name="edittime" value="<?php echo date('md' , time() + $jisa*3600); ?>" />
<!-- 表示期限日 -->
<input type="hidden" name="operation" value="edit" />
<p class="align_center"><input class="w_px100" type="submit" value="出勤情報を決定" /></p>
</form>
</div>
</body>
</html>
