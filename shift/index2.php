<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>新規登録</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">

<h1>新規登録</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">

<form action="check.php" method="post" enctype="multipart/form-data">
<table width="100%">
<tr>
<th width="37%" align="left">名前（表示用）</th>
<td width="63%" align="left"><input name="name" type="text" class="w_per50" /></td>
</tr>
<tr>
<th align="left">名前（アルファベット・小文字・半角）<br />
  <span class="col_red">※初回登録時入力必須</span></th>
<td align="left"><input name="name2" type="text" class="w_per50" />
  <br />
※他の女の子の名前と重複しないようにしてください。登録後の変更不可。</td>
</tr>
<tr>
<th align="left">年齢</th>
<td align="left">
<select name="age">
<?php
$data = file('parts/age.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>歳</td>
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
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>cm</td>
</tr>

<!--
<tr>
<th>体重</th>
<td><select name="weight">
<?php
$data = file('parts/weight.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>kg</td>
</tr>

<tr>
<th>スリーサイズ</th>
<td>B<select name="bust">
<?php
$data = file('parts/bhsize.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>cm/

<select name="cup">
<?php
$data = file('parts/cup.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>cup/

W<select name="waist">
<?php
$data = file('parts/wsize.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>cm/

H<select name="hip">
<?php
$data = file('parts/bhsize.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	
	echo "<option value=\"$line\">$line</option>\n";
}
?>
</select>cm/</td>
</tr>
-->

<tr>
  <th align="left">誕生日　例）2000年1月1日</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo1" /></td>
</tr>

<tr>
  <th align="left">血液型</th>
  <td align="left"><select name="profinfo2">
  <option value="--">--</option>
  <option value="A型">A型</option>
  <option value="O型">O型</option>
  <option value="B型">B型</option>
  <option value="AB型">AB型</option>
  </select></td>
</tr>

<tr>
  <th align="left">出身地</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo3" /></td>
</tr>

<tr>
  <th align="left">資格、特技</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo4" /></td>
</tr>

<tr>
  <th align="left">好きな男性のタイプ</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo5" /></td>
</tr>

<tr>
  <th align="left">好きな食べ物</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo7" /></td>
</tr>

<tr>
  <th align="left">好きなお酒</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo8" /></td>
</tr>

<tr>
  <th align="left">好きなブランド</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo9" /></td>
</tr>

<tr>
  <th align="left">チャームポイント</th>
  <td align="left"><input type="text" class="w_per90" name="profinfo10" /></td>
</tr>


<tr>
  <th align="left">女の子から一言</th>
  <td align="left"><textarea name="comment" rows="" cols="" class="w_per90 h_px50"></textarea></td>
</tr>


<tr>
  <th align="left">ブログURL（アメブロ限定）</th>
  <td align="left">http://ameblo.jp/<input type="text" class="w_per50" name="profinfo6" /></td>
</tr>
<tr>
  <th colspan="2" align="left"><table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="76%" class="valign_middle"><p>写真（1）：
        <input class="w_per50" type="file" name="photo1" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（2）：
        <input class="w_per50" type="file" name="photo2" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（3）：
        <input class="w_per50" type="file" name="photo3" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（4）：
        <input class="w_per50" type="file" name="photo4" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（5）：
        <input class="w_per50" type="file" name="photo5" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（6）：
        <input class="w_per50" type="file" name="photo6" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（7）：
        <input class="w_per50" type="file" name="photo7" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（8）：
        <input class="w_per50" type="file" name="photo8" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（9）：
        <input class="w_per50" type="file" name="photo9" />
      </p></td>
    </tr>
    <tr>
      <td class="valign_middle"><p>写真（10）：
        <input class="w_per50" type="file" name="photo10" />
      </p></td>
    </tr>
    </table></th>
  </tr>

<!--
<tr>
  <th>【キャスト別バラメーター】</th>
  <td>&nbsp;</td>
</tr>


<?php
//パラメーター項目
$param = file('parts/param.csv');
$p = 31;
for($i=0; $i<sizeof($param); $i++) {
	$line = explode(',' , $param[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	echo "<tr>\n";
	echo "<th>$line</th>\n";
	echo "<td>\n";
	echo "<select name=\"option".$p."\">\n";

//パラメーター値
$param_value = file('parts/param_value.csv');
for($i2=0; $i2<sizeof($param_value); $i2++) {
	$line = explode(',' , $param_value[$i2]);
	$line = $line[0];
	$line = str_replace("\r\n" , "" , $line);
	
	echo "<option value=\"$line\">$line</option>\n";
}
	echo "</select></td>\n";
	echo "</tr>\n";
	$p++;
}

?>


<tr>
  <th>【オプション】</th>
  <td>&nbsp;</td>
</tr>


<?php
//オプション項目
$data = file('parts/op_koumoku.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	$line = $line[0];
	//改行コードを削除
	$line = str_replace("\r\n" , "" , $line);
	echo "<tr>\n";
	echo "<th>$line</th>\n";
	echo "<td>\n";
	$s = $s+1;
	echo "<select name=\"option$s\">\n";

	//オプション値
	$data2 = file('parts/option.csv');
	for($i2=0; $i2<sizeof($data2); $i2++) {
		$line = explode(',' , $data2[$i2]);
		$line = $line[0];
		$line = str_replace("\r\n" , "" , $line);
	
		echo "<option value=\"$line\">$line</option>\n";
	}
	echo "</select></td>\n";
	echo "</tr>\n";
}

?>


<tr>
  <th>&nbsp;</th>
  <td>&nbsp;</td>
</tr>
<tr>
  <th>新人/オススメ</th>
  <td><input type="radio" name="yobi9" value="newface" /> 新人<br />
  <input type="radio" name="yobi9" value="osusume" /> オススメ<br />
  <input type="radio" name="yobi9" value="taiken" /> 体験入店<br />
  <input type="radio" name="yobi9" value="" /> 解除</td>
</tr>
<tr>
  <th>&nbsp;</th>
  <td>&nbsp;</td>
</tr>

<tr>
  <th>その他</th>
  <td><input type="radio" name="yobi2" value="tsuika" /> 追加出勤<br />
  <input type="radio" name="yobi2" value="event" /> イベント姫<br />
  <input type="radio" name="yobi2" value="tokubetsu" /> 特別企画<br />
  <input type="radio" name="yobi2" value="taiken" /> 体験入店</td>
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
  <th align="left">編集日</th>
  <td align="left"><?php echo $edittime; ?></td>
</tr>
<tr>
  <th align="left">現在の出勤表示期限日</th>
  <td align="left"><?php echo $yobi7; ?></td>
</tr>
</table>


  <h1>出勤情報入力 </h1>
  <table width="100%">
  <tr>
<th class="th2"><?php echo $day1 . '(' . $week1 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day2 . '(' . $week2 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day3 . '(' . $week3 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day4 . '(' . $week4 . ')' ?>の出勤</th>
</tr>
<tr>
<td align="left" class="td2">

	<input type="radio" name="yotei1" value="2" />お休み<br />
	<input type="radio" name="yotei1" value="3" />出勤<br />

</td>
<td align="left" class="td2">

	<input type="radio" name="yotei2" value="2" />お休み<br />
	<input type="radio" name="yotei2" value="3" />出勤<br />

</td>
<td align="left" class="td2">

	<input type="radio" name="yotei3" value="2" />お休み<br />
	<input type="radio" name="yotei3" value="3" />出勤<br />

</td>
<td align="left" class="td2">

	<input type="radio" name="yotei4" value="2" />お休み<br />
	<input type="radio" name="yotei4" value="3" />出勤<br />

</td>
</tr>
<tr>
<th class="th2"><?php echo $day5 . '(' . $week5 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day6 . '(' . $week6 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day7 . '(' . $week7 . ')' ?>の出勤</th>
<th class="th2">&nbsp;</th>
</tr>
<tr>
<td align="left" class="td2">

	<input type="radio" name="yotei5" value="2" />お休み<br />
	<input type="radio" name="yotei5" value="3" />出勤<br />

</td>
<td align="left" class="td2">

	<input type="radio" name="yotei6" value="2" />お休み<br />
	<input type="radio" name="yotei6" value="3" />出勤<br />

</td>
<td align="left" class="td2">

	<input type="radio" name="yobi4" value="2" />お休み<br />
	<input type="radio" name="yobi4" value="3" />出勤<br />

</td>
<td align="left" class="td2">&nbsp;</td>
</tr>
</table>
  <p>
    <input type="hidden" name="edittime" value="<?php echo date('md' , time() + $jisa*3600); ?>" />
    <!-- 表示期限日 -->
    <input type="hidden" name="yobi7" value="<?php echo date('Ymd' , time() + (144+$jisa)*3600); ?>" />
    <span class="align_center">
      <input class="w_px100" type="submit" value="登録" />
    </span></p>
</form>
</div>
</div>

<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>