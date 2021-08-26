<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$id = $_POST['id'];
	$name2 = $_POST['name2'];
	
	//CSVから該当データを取り出して変数に代入
	$data = file('data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	
	if($line[2] == $name2) {
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
<div id="container">

<h1>編集・削除ページ</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">

<form action="rewrite.php" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>" />
<input name="name2" type="hidden" class="w_per50" value="<?php echo $name2; ?>" />
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
<table width="100%">
  <tr>
    <th align="left">名前（表示用）</th>
    <td align="left"><input name="name" type="text" class="w_per50" value="<?php echo $name; ?>" /></td>
  </tr>
  <tr>
    <th align="left">名前（アルファベット・小文字・半角）</th>
    <td align="left"><?php echo $name2; ?>　<span class="col_red">※変更不可</span>
      <input name="name2" type="hidden" class="w_per50" value="<?php echo $name2; ?>" /></td>
  </tr>
  <tr>
    <th align="left">年齢</th>
    <td align="left"><select name="age">
<?php
$data = file('parts/age.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $age) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>
      歳</td>
  </tr>
  <!--
<tr>
<th>身長</th>
<td><select name="height">
<?php
$data = file('parts/height.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $height) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>cm</td>
</tr>

<tr>
<th>スリーサイズ</th>
<td>B<select name="bust">
<?php
$data = file('parts/bhsize.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $bust) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>cm/

<select name="cup">
<?php
$data = file('parts/cup.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $cup) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>cup/

W<select name="waist">
<?php
$data = file('parts/wsize.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $waist) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>cm/

H<select name="hip">
<?php
$data = file('parts/bhsize.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	
	if ($line == $hip) {
		echo "<option value=\"$line\" selected=\"selected\">$line</option>\n";
	}else{
		echo "<option value=\"$line\">$line</option>\n";
	}
}
?>
</select>cm/</td>
</tr>
-->
  <tr>
    <th align="left">誕生日</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo1" value="<?php echo $profinfo1; ?>" /></td>
  </tr>
  <tr>
    <th align="left">血液型</th>
    <?php
if($profinfo2=='--'){$b_type0=' selected="selected"';}
if($profinfo2=='A型'){$b_type1=' selected="selected"';}
if($profinfo2=='O型'){$b_type2=' selected="selected"';}
if($profinfo2=='B型'){$b_type3=' selected="selected"';}
if($profinfo2=='AB型'){$b_type4=' selected="selected"';}
?>
    <td align="left"><select name="profinfo2">
      <option value="--"<?php echo $b_type0; ?>>--</option>
      <option value="A型"<?php echo $b_type1; ?>>A型</option>
      <option value="O型"<?php echo $b_type2; ?>>O型</option>
      <option value="B型"<?php echo $b_type3; ?>>B型</option>
      <option value="AB型"<?php echo $b_type4; ?>>AB型</option>
    </select></td>
  </tr>
  <tr>
    <th align="left">出身地</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo3" value="<?php echo $profinfo3; ?>" /></td>
  </tr>
  <tr>
    <th align="left">資格、特技</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo4" value="<?php echo $profinfo4; ?>" /></td>
  </tr>
  <tr>
    <th align="left">好きな男性のタイプ</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo5" value="<?php echo $profinfo5; ?>" /></td>
  </tr>
  <tr>
    <th align="left">好きな食べ物</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo7" value="<?php echo $profinfo7; ?>" /></td>
  </tr>
  <tr>
    <th align="left">好きなお酒</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo8" value="<?php echo $profinfo8; ?>" /></td>
  </tr>
  <tr>
    <th align="left">好きなブランド</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo9" value="<?php echo $profinfo9; ?>" /></td>
  </tr>
  <tr>
    <th align="left">チャームポイント</th>
    <td align="left"><input type="text" class="w_per90" name="profinfo10" value="<?php echo $profinfo10; ?>" /></td>
  </tr>
<tr>
  <th align="left">女の子から一言</th>
  <td align="left"><?php $comment = str_replace("<br />" , "\r\n" , $comment); ?>
  <textarea name="comment" rows="" cols="" class="w_per90 h_px50"><?php echo $comment; ?></textarea></td>
</tr>
  <tr>
    <th align="left">ブログURL（アメブロ限定）</th>
    <td align="left">http://ameblo.jp/
      <input type="text" class="w_per50" name="profinfo6" value="<?php echo $profinfo6; ?>" /></td>
  </tr>
  <!--
<tr>
  <th>【パラメーター】</th>
  <td>&nbsp;</td>
</tr>

<?php
//パラメーター項目を変数に代入
$data=file('parts/param.csv');
for($i=0; $i<sizeof($data); $i++){
	$koumoku=explode(',',$data[$i]);
	$koumoku=$koumoku[0];
	
	//select name用
	$op_ary=array('option31','option32','option33','option34','option35','option36','option37','option38','option39','option40');
	$op_ary=$op_ary[$i];
	
	//パラメーターの値を結合
	$option=array($option31,$option32,$option33,$option34,$option35,$option36,$option37,$option38,$option39,$option40);
	$option=$option[$i];
	
	echo "<tr><th>";
	echo $koumoku;
	echo "</th>\n";
	echo "<td>\n";
	echo "<select name=\"";
	echo $op_ary;
	echo "\">\n";
	//0～5
	$data2=file('parts/param_value.csv');
	for($s=0; $s<sizeof($data2); $s++){
		$koumoku2=explode(',',$data2[$s]);
		$koumoku2=$koumoku2[0];
		//改行コードを削除
		$koumoku2=str_replace("\r\n","",$koumoku2);
		if ($koumoku2 == $option) {
			echo "<option value=\"";
			echo $koumoku2;
			echo "\" selected=\"selected\">";
			echo $koumoku2;
			echo "</option>\n";
		}else{
			echo "<option value=\"";
			echo $koumoku2;
			echo "\">";
			echo $koumoku2;
			echo "</option>\n";
		}
	}
	echo "</select>\n";
	echo "</td></tr>\n";
}
unset($data,$koumoku,$op_ary,$option,$data2,$s,$koumoku2);
?>


<tr>
  <th>【オプション】</th>
  <td>&nbsp;</td>
</tr>

<?php
//オプション項目を変数に代入
$data=file('parts/op_koumoku.csv');
for($i=0; $i<sizeof($data); $i++){
	$koumoku=explode(',',$data[$i]);
	$koumoku=$koumoku[0];
	
	//select name用
	$op_ary=array('option1','option2','option3','option4','option5','option6','option7','option8','option9','option10','option11','option12','option13','option14','option15','option16','option17','option18','option19','option20','option21','option22','option23','option24','option25','option26','option27','option28','option29','option30');
	$op_ary=$op_ary[$i];
	
	//オプションの値を結合
	$option=array($option1,$option2,$option3,$option4,$option5,$option6,$option7,$option8,$option9,$option10,$option11,$option12,$option13,$option14,$option15,$option16,$option17,$option18,$option19,$option20,$option21,$option22,$option23,$option24,$option25,$option26,$option27,$option28,$option29,$option30);
	$option=$option[$i];
	
	echo "<tr><th>";
	echo $koumoku;
	echo "</th>\n";
	echo "<td>\n";
	echo "<select name=\"";
	echo $op_ary;
	echo "\">\n";
	//○△×
	$data2=file('parts/option.csv');
	for($s=0; $s<sizeof($data2); $s++){
		$koumoku2=explode(',',$data2[$s]);
		$koumoku2=$koumoku2[0];
		//改行コードを削除
		$koumoku2=str_replace("\r\n","",$koumoku2);
		if ($koumoku2 == $option) {
			echo "<option value=\"";
			echo $koumoku2;
			echo "\" selected=\"selected\">";
			echo $koumoku2;
			echo "</option>\n";
		}else{
			echo "<option value=\"";
			echo $koumoku2;
			echo "\">";
			echo $koumoku2;
			echo "</option>\n";
		}
	}
	echo "</select>\n";
	echo "</td></tr>\n";
}
?>

<tr>
  <th>&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr>
  <th>新人/オススメ</th>
<?php
if ($yobi9 == 'newface') {
	$newface_check = 'checked="checked"';
}elseif($yobi9=='osusume'){
	$osusume_check='checked="checked"';
}elseif($yobi9=='taiken'){
	$taiken_check='checked="checked"';
}else{
	$yobi9_check='checked="checked"';
}

if ($yobi1 == 'pickup') {
	$pickup_check = 'checked="checked"';
}

#if ($yobi2 == 'tsuika') {
#	$tsuika_check = 'checked="checked"';
#}elseif($yobi2=='event'){
#	$event_check = 'checked="checked"';
#}elseif($yobi2=='tokubetsu'){
#	$tokubetsu_check = 'checked="checked"';
#}elseif($yobi2=='taiken'){
#	$taiken_check = 'checked="checked"';
#}else{
#	$yobi2_check='checked="checked"';
#}
?>
  <td><input type="radio" name="yobi9" value="newface" <?php echo $newface_check; ?> /> 新人<br />
  <input type="radio" name="yobi9" value="osusume" <?php echo $osusume_check; ?> /> オススメ<br />
  <input type="radio" name="yobi9" value="taiken" <?php echo $taiken_check; ?> /> 体験入店<br />
  <input type="radio" name="yobi9" value="" <?php echo $yobi9_check; ?> /> 解除</td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>&nbsp;</td>
</tr>


<tr>
  <th>その他</th>
  <td><input type="radio" name="yobi2" value="tsuika" <?php echo $tsuika_check; ?> /> 追加出勤<br />
  <input type="radio" name="yobi2" value="event" <?php echo $event_check; ?> /> イベント姫<br />
  <input type="radio" name="yobi2" value="tokubetsu" <?php echo $tokubetsu_check; ?> /> 特別企画<br />
  <input type="radio" name="yobi2" value="taiken" <?php echo $taiken_check; ?> /> 体験入店<br />
  <input type="radio" name="yobi2" value="" <?php echo $yobi2_check; ?> /> 解除</td>
</tr>

<tr>
  <th>ピックアップ</th>
  <td><input type="checkbox" name="yobi1" value="pickup" <?php echo $pickup_check; ?> /></td>
</tr>
-->
  <tr>
    <th align="left">登録日</th>
    <td align="left"><input type="text" name="yobi8" value="<?php echo $yobi8; ?>" /></td>
  </tr>
  <tr>
    <th align="left">前回編集日</th>
    <td align="left"><?php echo $edittime; ?></td>
  </tr>
  <tr>
    <th align="left">現在の出勤表示期限日</th>
    <td align="left"><?php echo $yobi7; ?></td>
  </tr>
</table>
<p class="midashi1">出勤情報編集</p>

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

<table width="100%" class="bg2">
<tr>
<td><select name="operation">
<option value="edit" selected="selected">編集</option>
<option value="delete">削除</option>
</select> <span class="col_red">※データを削除する場合は、「削除」を選んでください。削除したデータの復元はできません。</span></td>
</tr>
</table>

<input type="hidden" name="edittime" value="<?php echo date('md' , time() + $jisa*3600); ?>" />
<!-- 表示期限日 -->
<input type="hidden" name="yobi7" value="<?php echo date('Ymd' , time() + (144+$jisa)*3600); ?>" />
<p class="align_center"><input class="w_px100" type="submit" value="実行" /></p>
</form>
</div>


<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>
