<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	//フォームからの生データ
$name = htmlspecialchars($_POST['name'] , ENT_QUOTES);
$name2 = htmlspecialchars($_POST['name2'] , ENT_QUOTES);
$age = $_POST['age'];
$height = $_POST['height'];
$weight = $_POST['weight'];
$bust = $_POST['bust'];
$cup = $_POST['cup'];
$waist = $_POST['waist'];
$hip = $_POST['hip'];
$comment = htmlspecialchars($_POST['comment'] , ENT_QUOTES);
$comment2 = htmlspecialchars($_POST['comment2'] , ENT_QUOTES);
$profinfo1 = htmlspecialchars($_POST['profinfo1'] , ENT_QUOTES);
$profinfo2 = htmlspecialchars($_POST['profinfo2'] , ENT_QUOTES);
$profinfo3 = htmlspecialchars($_POST['profinfo3'] , ENT_QUOTES);
$profinfo4 = htmlspecialchars($_POST['profinfo4'] , ENT_QUOTES);
$profinfo5 = htmlspecialchars($_POST['profinfo5'] , ENT_QUOTES);
$profinfo6 = htmlspecialchars($_POST['profinfo6'] , ENT_QUOTES);
$profinfo7 = htmlspecialchars($_POST['profinfo7'] , ENT_QUOTES);
$profinfo8 = htmlspecialchars($_POST['profinfo8'] , ENT_QUOTES);
$profinfo9 = htmlspecialchars($_POST['profinfo9'] , ENT_QUOTES);
$profinfo10 = htmlspecialchars($_POST['profinfo10'] , ENT_QUOTES);
$option1 = $_POST['option1'];
$option2 = $_POST['option2'];
$option3 = $_POST['option3'];
$option4 = $_POST['option4'];
$option5 = $_POST['option5'];
$option6 = $_POST['option6'];
$option7 = $_POST['option7'];
$option8 = $_POST['option8'];
$option9 = $_POST['option9'];
$option10 = $_POST['option10'];
$option11 = $_POST['option11'];
$option12 = $_POST['option12'];
$option13 = $_POST['option13'];
$option14 = $_POST['option14'];
$option15 = $_POST['option15'];
$option16 = $_POST['option16'];
$option17 = $_POST['option17'];
$option18 = $_POST['option18'];
$option19 = $_POST['option19'];
$option20 = $_POST['option20'];
$option21 = $_POST['option21'];
$option22 = $_POST['option22'];
$option23 = $_POST['option23'];
$option24 = $_POST['option24'];
$option25 = $_POST['option25'];
$option26 = $_POST['option26'];
$option27 = $_POST['option27'];
$option28 = $_POST['option28'];
$option29 = $_POST['option29'];
$option30 = $_POST['option30'];
$option31 = $_POST['option31'];
$option32 = $_POST['option32'];
$option33 = $_POST['option33'];
$option34 = $_POST['option34'];
$option35 = $_POST['option35'];
$option36 = $_POST['option36'];
$option37 = $_POST['option37'];
$option38 = $_POST['option38'];
$option39 = $_POST['option39'];
$option40 = $_POST['option40'];
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

	$yotei1 = $_POST['yotei1'];
	$yotei2 = $_POST['yotei2'];
	$yotei3 = $_POST['yotei3'];
	$yotei4 = $_POST['yotei4'];
	$yotei5 = $_POST['yotei5'];
	$yotei6 = $_POST['yotei6'];
	$yobi4 = $_POST['yobi4'];
	
	$start1 = $_POST['start1'];
	$start2 = $_POST['start2'];
	$start3 = $_POST['start3'];
	$start4 = $_POST['start4'];
	$start5 = $_POST['start5'];
	$start6 = $_POST['start6'];
	$yobi5 = $_POST['yobi5'];
	
	$end1 = $_POST['end1'];
	$end2 = $_POST['end2'];
	$end3 = $_POST['end3'];
	$end4 = $_POST['end4'];
	$end5 = $_POST['end5'];
	$end6 = $_POST['end6'];
	$yobi6 = $_POST['yobi6'];
	
#$yotei1 = $_POST['yotei1'];
#$start1 = $_POST['start1'];
#$end1 = $_POST['end1'];
#$yotei2 = $_POST['yotei2'];
#$start2 = $_POST['start2'];
#$end2 = $_POST['end2'];
#$yotei3 = $_POST['yotei3'];
#$start3 = $_POST['start3'];
#$end3 = $_POST['end3'];
#$yotei4 = $_POST['yotei4'];
#$start4 = $_POST['start4'];
#$end4 = $_POST['end4'];
#$yotei5 = $_POST['yotei5'];
#$start5 = $_POST['start5'];
#$end5 = $_POST['end5'];
#$yotei6 = $_POST['yotei6'];
#$start6 = $_POST['start6'];
#$end6 = $_POST['end6'];
$yobi1 = htmlspecialchars($_POST['yobi1'] , ENT_QUOTES);
$yobi2 = htmlspecialchars($_POST['yobi2'] , ENT_QUOTES);
$yobi3 = htmlspecialchars($_POST['yobi3'] , ENT_QUOTES);
#$yobi4 = $_POST['yobi4'];	//yotei7
#$yobi5 = $_POST['yobi5'];	//start7
#$yobi6 = $_POST['yobi6'];	//end7
$yobi7 = $_POST['yobi7'];	//表示期限日
$yobi8 = $_POST['yobi8'];	//登録日
$yobi9 = $_POST['yobi9'];	//新人チェック
$yobi10 = $_POST['yobi10'];	//オススメチェック
$edittime = $_POST['edittime'];

//文字コード変換
$name = mb_convert_encoding($name,'UTF-8','AUTO');
$name2 = mb_convert_encoding($name2,'UTF-8','AUTO');
$comment = mb_convert_encoding($comment,'UTF-8','AUTO');
$comment2 = mb_convert_encoding($comment2,'UTF-8','AUTO');
$profinfo1 = mb_convert_encoding($profinfo1,'UTF-8','AUTO');
$profinfo2 = mb_convert_encoding($profinfo2,'UTF-8','AUTO');
$profinfo3 = mb_convert_encoding($profinfo3,'UTF-8','AUTO');
$profinfo4 = mb_convert_encoding($profinfo4,'UTF-8','AUTO');
$profinfo5 = mb_convert_encoding($profinfo5,'UTF-8','AUTO');
$profinfo6 = mb_convert_encoding($profinfo6,'UTF-8','AUTO');
$profinfo7 = mb_convert_encoding($profinfo7,'UTF-8','AUTO');
$profinfo8 = mb_convert_encoding($profinfo8,'UTF-8','AUTO');
$profinfo9 = mb_convert_encoding($profinfo9,'UTF-8','AUTO');
$profinfo10 = mb_convert_encoding($profinfo10,'UTF-8','AUTO');
$yobi1 = mb_convert_encoding($yobi1,'UTF-8','AUTO');
$yobi2 = mb_convert_encoding($yobi2,'UTF-8','AUTO');
$yobi3 = mb_convert_encoding($yobi3,'UTF-8','AUTO');
#$yobi4 = mb_convert_encoding($yobi4,'UTF-8','AUTO');
#$yobi5 = mb_convert_encoding($yobi5,'UTF-8','AUTO');
#$yobi6 = mb_convert_encoding($yobi6,'UTF-8','AUTO');
$yobi7 = mb_convert_encoding($yobi7,'UTF-8','AUTO');
$yobi8 = mb_convert_encoding($yobi8,'UTF-8','AUTO');

//半角小文字に変換
$name2 = mb_convert_kana($name2,'a','utf-8');
$name2 = strtolower($name2);

//テキストを整形
$comment = mb_convert_kana($comment,'KaV','utf-8');
$comment2 = mb_convert_kana($comment2,'KaV','utf-8');
$profinfo1 = mb_convert_kana($profinfo1,'KaV','utf-8');
$profinfo2 = mb_convert_kana($profinfo2,'KaV','utf-8');
$profinfo3 = mb_convert_kana($profinfo3,'KaV','utf-8');
$profinfo4 = mb_convert_kana($profinfo4,'KaV','utf-8');
$profinfo5 = mb_convert_kana($profinfo5,'KaV','utf-8');
$profinfo6 = mb_convert_kana($profinfo6,'KaV','utf-8');
$profinfo7 = mb_convert_kana($profinfo7,'KaV','utf-8');
$profinfo8 = mb_convert_kana($profinfo8,'KaV','utf-8');
$profinfo9 = mb_convert_kana($profinfo9,'KaV','utf-8');
$profinfo10 = mb_convert_kana($profinfo10,'Ka','utf-8');
$yobi1 = mb_convert_kana($yobi1,'KaV','utf-8');
$yobi2 = mb_convert_kana($yobi2,'KaV','utf-8');
$yobi3 = mb_convert_kana($yobi3,'KaV','utf-8');
$yobi4 = mb_convert_kana($yobi4,'KaV','utf-8');
$yobi5 = mb_convert_kana($yobi5,'KaV','utf-8');
$yobi6 = mb_convert_kana($yobi6,'KaV','utf-8');
$yobi7 = mb_convert_kana($yobi7,'KaV','utf-8');
$yobi8 = mb_convert_kana($yobi8,'KaV','utf-8');
$yobi9 = mb_convert_kana($yobi9,'KaV','utf-8');
$yobi10 = mb_convert_kana($yobi10,'KaV','utf-8');
$comment = nl2br($comment); //改行コードの前に改行タグを入れる
$comment2 = nl2br($comment2); //改行コードの前に改行タグを入れる
$comment = str_replace("\r\n" , "" , $comment); //改行コードを削除
$comment2 = str_replace("\r\n" , "" , $comment2); //改行コードを削除
$age = str_replace("\r\n" , "" , $age); //改行コードを削除
$height = str_replace("\r\n" , "" , $height); //改行コードを削除
$weight = str_replace("\r\n" , "" , $weight); //改行コードを削除
$bust = str_replace("\r\n" , "" , $bust); //改行コードを削除
$cup = str_replace("\r\n" , "" , $cup); //改行コードを削除
$waist = str_replace("\r\n" , "" , $waist); //改行コードを削除
$hip = str_replace("\r\n" , "" , $hip); //改行コードを削除
$option1 = str_replace("\r\n" , "" , $option1); //改行コードを削除
$option2 = str_replace("\r\n" , "" , $option2); //改行コードを削除
$option3 = str_replace("\r\n" , "" , $option3); //改行コードを削除
$option4 = str_replace("\r\n" , "" , $option4); //改行コードを削除
$option5 = str_replace("\r\n" , "" , $option5); //改行コードを削除
$option6 = str_replace("\r\n" , "" , $option6); //改行コードを削除
$option7 = str_replace("\r\n" , "" , $option7); //改行コードを削除
$option8 = str_replace("\r\n" , "" , $option8); //改行コードを削除
$option9 = str_replace("\r\n" , "" , $option9); //改行コードを削除
$option10 = str_replace("\r\n" , "" , $option10); //改行コードを削除
$option11 = str_replace("\r\n" , "" , $option11); //改行コードを削除
$option12 = str_replace("\r\n" , "" , $option12); //改行コードを削除
$option13 = str_replace("\r\n" , "" , $option13); //改行コードを削除
$option14 = str_replace("\r\n" , "" , $option14); //改行コードを削除
$option15 = str_replace("\r\n" , "" , $option15); //改行コードを削除
$option16 = str_replace("\r\n" , "" , $option16); //改行コードを削除
$option17 = str_replace("\r\n" , "" , $option17); //改行コードを削除
$option18 = str_replace("\r\n" , "" , $option18); //改行コードを削除
$option19 = str_replace("\r\n" , "" , $option19); //改行コードを削除
$option20 = str_replace("\r\n" , "" , $option20); //改行コードを削除
$option21 = str_replace("\r\n" , "" , $option21); //改行コードを削除
$option22 = str_replace("\r\n" , "" , $option22); //改行コードを削除
$option23 = str_replace("\r\n" , "" , $option23); //改行コードを削除
$option24 = str_replace("\r\n" , "" , $option24); //改行コードを削除
$option25 = str_replace("\r\n" , "" , $option25); //改行コードを削除
$option26 = str_replace("\r\n" , "" , $option26); //改行コードを削除
$option27 = str_replace("\r\n" , "" , $option27); //改行コードを削除
$option28 = str_replace("\r\n" , "" , $option28); //改行コードを削除
$option29 = str_replace("\r\n" , "" , $option29); //改行コードを削除
$option30 = str_replace("\r\n" , "" , $option30); //改行コードを削除
$option31 = str_replace("\r\n" , "" , $option31); //改行コードを削除
$option32 = str_replace("\r\n" , "" , $option32); //改行コードを削除
$option33 = str_replace("\r\n" , "" , $option33); //改行コードを削除
$option34 = str_replace("\r\n" , "" , $option34); //改行コードを削除
$option35 = str_replace("\r\n" , "" , $option35); //改行コードを削除
$option36 = str_replace("\r\n" , "" , $option36); //改行コードを削除
$option37 = str_replace("\r\n" , "" , $option37); //改行コードを削除
$option38 = str_replace("\r\n" , "" , $option38); //改行コードを削除
$option39 = str_replace("\r\n" , "" , $option39); //改行コードを削除
$option40 = str_replace("\r\n" , "" , $option40); //改行コードを削除
$start1 = str_replace("\r\n" , "" , $start1); //改行コードを削除
$end1 = str_replace("\r\n" , "" , $end1); //改行コードを削除
$start2 = str_replace("\r\n" , "" , $start2); //改行コードを削除
$end2 = str_replace("\r\n" , "" , $end2); //改行コードを削除
$start3 = str_replace("\r\n" , "" , $start3); //改行コードを削除
$end3 = str_replace("\r\n" , "" , $end3); //改行コードを削除
$start4 = str_replace("\r\n" , "" , $start4); //改行コードを削除
$end4 = str_replace("\r\n" , "" , $end4); //改行コードを削除
$start5 = str_replace("\r\n" , "" , $start5); //改行コードを削除
$end5 = str_replace("\r\n" , "" , $end5); //改行コードを削除
$start6 = str_replace("\r\n" , "" , $start6); //改行コードを削除
$end6 = str_replace("\r\n" , "" , $end6); //改行コードを削除
$yobi5 = str_replace("\r\n" , "" , $yobi5); //改行コードを削除
$yobi6 = str_replace("\r\n" , "" , $yobi6); //改行コードを削除

//[,]を除去
$name = str_replace(',' , '' , $name);
$name2 = str_replace(',' , '' , $name2);
$comment = str_replace(',' , '' , $comment);
$profinfo1 = str_replace(',' , '' , $profinfo1);
$profinfo2 = str_replace(',' , '' , $profinfo2);
$profinfo3 = str_replace(',' , '' , $profinfo3);
$profinfo4 = str_replace(',' , '' , $profinfo4);
$profinfo5 = str_replace(',' , '' , $profinfo5);
$profinfo6 = str_replace(',' , '' , $profinfo6);
$profinfo7 = str_replace(',' , '' , $profinfo7);
$profinfo8 = str_replace(',' , '' , $profinfo8);
$profinfo9 = str_replace(',' , '' , $profinfo9);
$profinfo10 = str_replace(',' , '' , $profinfo10);
$photo1 = str_replace(',' , '' , $photo1);
$photo2 = str_replace(',' , '' , $photo2);
$photo3 = str_replace(',' , '' , $photo3);
$photo4 = str_replace(',' , '' , $photo4);
$photo5 = str_replace(',' , '' , $photo5);
$photo6 = str_replace(',' , '' , $photo6);
$photo7 = str_replace(',' , '' , $photo7);
$photo8 = str_replace(',' , '' , $photo8);
$photo9 = str_replace(',' , '' , $photo9);
$photo10 = str_replace(',' , '' , $photo10);
$yobi1 = str_replace(',' , '' , $yobi1);
$yobi2 = str_replace(',' , '' , $yobi2);
$yobi3 = str_replace(',' , '' , $yobi3);
//名前が未記入
if ($name2 == $empty) {
echo <<<GOLGO
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>登録確認</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		</head>
		<body>
		<div id="container">
		<h1>名前（アルファベット・小文字・半角）が未入力です！</h1>
		<p>名前（アルファベット・小文字・半角）が未入力です。管理用の名前となりますので登録時に必須です。この項目は登録後は編集できません。</p>
		<p><a href="#" onclick="history.back(); return false;">直前のページに戻る</a></p>
		</div>
		</body>
		</html>
GOLGO;
		exit();
}
if(preg_match('/[^0-9a-zA-Z]/',$name2)){
echo <<<GOLGO
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>登録確認</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		</head>
		<body>
		<div id="container">
		<h1>名前（アルファベット・小文字・半角）が半角英数字以外です！</h1>
		<p>名前（アルファベット・小文字・半角）が半角英数字以外です。管理用の名前となりますので半角英数字でご登録お願いします。</p>
		<p><a href="#" onclick="history.back(); return false;">直前のページに戻る</a></p>
		</div>
		</body>
		</html>
GOLGO;
		exit();
}
//NAME2重複チェック
$filename = 'data.csv';
$handle = fopen($filename , 'r');
$data =file($filename);
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	if($line[2] == $name2) {
echo <<<GOLGO
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>登録確認</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		</head>
		<body>
		<div id="container">
		<h1>既に[ $name2 ]は登録されています。</h1>
		<p>同じ名前ですでに登録済みです。管理用の名前となりますので重複は禁止です。<br />
		名前を変更するか末尾に「2｣をつける等してください。</p>
		<p><a href="#" onclick="history.back(); return false;">直前のページに戻る</a></p>
		</div>
		</body>
		</html>
GOLGO;
		exit();
	}		
}
fclose($handle);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登録確認</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">

<h1>登録確認</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">
<table width="100%">
  <tr>
    <th align="left">名前（表示用）</th>
    <td align="left"><?php echo $name; ?></td>
  </tr>
  <tr>
    <th align="left">名前（アルファベット・小文字・半角）</th>
    <td align="left"><?php echo $name2; ?>　<span class="col_red">※変更不可</span>
      <input name="name2" type="hidden" class="w_per50" value="<?php echo $name2; ?>" /></td>
    </tr>
  <tr>
    <th align="left">年齢</th>
    <td align="left"><?php echo $age; ?> 歳</td>
    </tr>
  <tr>
    <th align="left">誕生日</th>
    <td align="left"><?php echo $profinfo1; ?></td>
    </tr>
  <tr>
    <th align="left">血液型</th>
    <td align="left"><?php echo $profinfo2; ?></td>
    <?php
if($profinfo2=='--'){$b_type0=' selected="selected"';}
if($profinfo2=='A型'){$b_type1=' selected="selected"';}
if($profinfo2=='O型'){$b_type2=' selected="selected"';}
if($profinfo2=='B型'){$b_type3=' selected="selected"';}
if($profinfo2=='AB型'){$b_type4=' selected="selected"';}
?>
    </tr>
  <tr>
    <th align="left">出身地</th>
    <td align="left"><?php echo $profinfo3; ?></td>
    </tr>
  <tr>
    <th align="left">資格、特技</th>
    <td align="left"><?php echo $profinfo4; ?></td>
    </tr>
  <tr>
    <th align="left">好きな男性のタイプ</th>
    <td align="left"><?php echo $profinfo5; ?></td>
    </tr>
  <tr>
    <th align="left">好きな食べ物</th>
    <td align="left"><?php echo $profinfo7; ?></td>
    </tr>
  <tr>
    <th align="left">好きなお酒</th>
    <td align="left"><?php echo $profinfo8; ?></td>
    </tr>
  <tr>
    <th align="left">好きなブランド</th>
    <td align="left"><?php echo $profinfo9; ?></td>
    </tr>
  <tr>
    <th align="left">チャームポイント</th>
    <td align="left"><?php echo $profinfo10; ?></td>
    </tr>
  <tr>
    <th align="left">女の子から一言</th>
    <td align="left"><?php echo $comment; ?></td>
  </tr>
  <tr>
    <th align="left">ブログURL（アメブロ限定）</th>
    <td align="left">http://ameblo.jp/
      <?php echo $profinfo8; ?></td>
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
-->

<tr>
  <th colspan="2"><?php
//ファイル名の取り出し
$photo_name1 = $_FILES['photo1']['name'];
$photo_name2 = $_FILES['photo2']['name'];
$photo_name3 = $_FILES['photo3']['name'];
$photo_name4 = $_FILES['photo4']['name'];
$photo_name5 = $_FILES['photo5']['name'];
$photo_name6 = $_FILES['photo6']['name'];
$photo_name7 = $_FILES['photo7']['name'];
$photo_name8 = $_FILES['photo8']['name'];
$photo_name9 = $_FILES['photo9']['name'];
$photo_name10 = $_FILES['photo10']['name'];
//ファイルタイプの取り出し
$photo_type1 = $_FILES['photo1']['type'];
$photo_type2 = $_FILES['photo2']['type'];
$photo_type3 = $_FILES['photo3']['type'];
$photo_type4 = $_FILES['photo4']['type'];
$photo_type5 = $_FILES['photo5']['type'];
$photo_type6 = $_FILES['photo6']['type'];
$photo_type7 = $_FILES['photo7']['type'];
$photo_type8 = $_FILES['photo8']['type'];
$photo_type9 = $_FILES['photo9']['type'];
$photo_type10 = $_FILES['photo10']['type'];
//一時ファイル名の取り出し
$temp_name1 = $_FILES['photo1']['tmp_name'];
$temp_name2 = $_FILES['photo2']['tmp_name'];
$temp_name3 = $_FILES['photo3']['tmp_name'];
$temp_name4 = $_FILES['photo4']['tmp_name'];
$temp_name5 = $_FILES['photo5']['tmp_name'];
$temp_name6 = $_FILES['photo6']['tmp_name'];
$temp_name7 = $_FILES['photo7']['tmp_name'];
$temp_name8 = $_FILES['photo8']['tmp_name'];
$temp_name9 = $_FILES['photo9']['tmp_name'];
$temp_name10 = $_FILES['photo10']['tmp_name'];

//保存先のディレクトリ
$dir = 'photo/';
//拡張子
$jpeg = '.jpg';
//保存先のファイル名
	$upload_name1 = $dir . $name2 . '_1' . $jpeg;
	$upload_name2 = $dir . $name2 . '_2' . $jpeg;
	$upload_name3 = $dir . $name2 . '_3' . $jpeg;
	$upload_name4 = $dir . $name2 . '_4' . $jpeg;
	$upload_name5 = $dir . $name2 . '_5' . $jpeg;
	$upload_name6 = $dir . $name2 . '_6' . $jpeg;
	$upload_name7 = $dir . $name2 . '_7' . $jpeg;
	$upload_name8 = $dir . $name2 . '_8' . $jpeg;
	$upload_name9 = $dir . $name2 . '_9' . $jpeg;
	$upload_name10 = $dir . $name2 . '_10' . $jpeg;
	// m
	$upload_name1_m = $dir . $name2 . '_1_m' . $jpeg;
	$upload_name2_m = $dir . $name2 . '_2_m' . $jpeg;
	$upload_name3_m = $dir . $name2 . '_3_m' . $jpeg;
	$upload_name4_m = $dir . $name2 . '_4_m' . $jpeg;
	$upload_name5_m = $dir . $name2 . '_5_m' . $jpeg;
	$upload_name6_m = $dir . $name2 . '_6_m' . $jpeg;
	$upload_name7_m = $dir . $name2 . '_7_m' . $jpeg;
	$upload_name8_m = $dir . $name2 . '_8_m' . $jpeg;
	$upload_name9_m = $dir . $name2 . '_9_m' . $jpeg;
	$upload_name10_m = $dir . $name2 . '_10_m' . $jpeg;
	// l
	$upload_name1_l = $dir . $name2 . '_1_l' . $jpeg;
	$upload_name2_l = $dir . $name2 . '_2_l' . $jpeg;
	$upload_name3_l = $dir . $name2 . '_3_l' . $jpeg;
	$upload_name4_l = $dir . $name2 . '_4_l' . $jpeg;
	$upload_name5_l = $dir . $name2 . '_5_l' . $jpeg;
	$upload_name6_l = $dir . $name2 . '_6_l' . $jpeg;
	$upload_name7_l = $dir . $name2 . '_7_l' . $jpeg;
	$upload_name8_l = $dir . $name2 . '_8_l' . $jpeg;
	$upload_name9_l = $dir . $name2 . '_9_l' . $jpeg;
	$upload_name10_l = $dir . $name2 . '_10_l' . $jpeg;
	// t
	$upload_name1_t = $dir . $name2 . '_1_t' . $jpeg;
	$upload_name2_t = $dir . $name2 . '_2_t' . $jpeg;
	$upload_name3_t = $dir . $name2 . '_3_t' . $jpeg;
	$upload_name4_t = $dir . $name2 . '_4_t' . $jpeg;
	$upload_name5_t = $dir . $name2 . '_5_t' . $jpeg;
	$upload_name6_t = $dir . $name2 . '_6_t' . $jpeg;
	$upload_name7_t = $dir . $name2 . '_7_t' . $jpeg;
	$upload_name8_t = $dir . $name2 . '_8_t' . $jpeg;
	$upload_name9_t = $dir . $name2 . '_9_t' . $jpeg;
	$upload_name10_t = $dir . $name2 . '_10_t' . $jpeg;
	// s
	$upload_name1_s = $dir . $name2 . '_1_s' . $jpeg;
	$upload_name2_s = $dir . $name2 . '_2_s' . $jpeg;
	$upload_name3_s = $dir . $name2 . '_3_s' . $jpeg;
	$upload_name4_s = $dir . $name2 . '_4_s' . $jpeg;
	$upload_name5_s = $dir . $name2 . '_5_s' . $jpeg;
	$upload_name6_s = $dir . $name2 . '_6_s' . $jpeg;
	$upload_name7_s = $dir . $name2 . '_7_s' . $jpeg;
	$upload_name8_s = $dir . $name2 . '_8_s' . $jpeg;
	$upload_name9_s = $dir . $name2 . '_9_s' . $jpeg;
	$upload_name10_s = $dir . $name2 . '_10_s' . $jpeg;
	// p
	$upload_name1_p = $dir . $name2 . '_1_p' . $jpeg;
	$upload_name2_p = $dir . $name2 . '_2_p' . $jpeg;
	$upload_name3_p = $dir . $name2 . '_3_p' . $jpeg;
	$upload_name4_p = $dir . $name2 . '_4_p' . $jpeg;
	$upload_name5_p = $dir . $name2 . '_5_p' . $jpeg;
	$upload_name6_p = $dir . $name2 . '_6_p' . $jpeg;
	$upload_name7_p = $dir . $name2 . '_7_p' . $jpeg;
	$upload_name8_p = $dir . $name2 . '_8_p' . $jpeg;
	$upload_name9_p = $dir . $name2 . '_9_p' . $jpeg;
	$upload_name10_p = $dir . $name2 . '_10_p' . $jpeg;
	// b
	$upload_name1_b = $dir . $name2 . '_1_b' . $jpeg;
	$upload_name2_b = $dir . $name2 . '_2_b' . $jpeg;
	$upload_name3_b = $dir . $name2 . '_3_b' . $jpeg;
	$upload_name4_b = $dir . $name2 . '_4_b' . $jpeg;
	$upload_name5_b = $dir . $name2 . '_5_b' . $jpeg;
	$upload_name6_b = $dir . $name2 . '_6_b' . $jpeg;
	$upload_name7_b = $dir . $name2 . '_7_b' . $jpeg;
	$upload_name8_b = $dir . $name2 . '_8_b' . $jpeg;
	$upload_name9_b = $dir . $name2 . '_9_b' . $jpeg;
	$upload_name10_b = $dir . $name2 . '_10_b' . $jpeg;
	// g
	$upload_name1_g = $dir . $name2 . '_1_g' . $jpeg;
	$upload_name2_g = $dir . $name2 . '_2_g' . $jpeg;
	$upload_name3_g = $dir . $name2 . '_3_g' . $jpeg;
	$upload_name4_g = $dir . $name2 . '_4_g' . $jpeg;
	$upload_name5_g = $dir . $name2 . '_5_g' . $jpeg;
	$upload_name6_g = $dir . $name2 . '_6_g' . $jpeg;
	$upload_name7_g = $dir . $name2 . '_7_g' . $jpeg;
	$upload_name8_g = $dir . $name2 . '_8_g' . $jpeg;
	$upload_name9_g = $dir . $name2 . '_9_g' . $jpeg;
	$upload_name10_g = $dir . $name2 . '_10_g' . $jpeg;
	// z
	$upload_name1_z = $dir . $name2 . '_1_z' . $jpeg;
	$upload_name2_z = $dir . $name2 . '_2_z' . $jpeg;
	$upload_name3_z = $dir . $name2 . '_3_z' . $jpeg;
	$upload_name4_z = $dir . $name2 . '_4_z' . $jpeg;
	$upload_name5_z = $dir . $name2 . '_5_z' . $jpeg;
	$upload_name6_z = $dir . $name2 . '_6_z' . $jpeg;
	$upload_name7_z = $dir . $name2 . '_7_z' . $jpeg;
	$upload_name8_z = $dir . $name2 . '_8_z' . $jpeg;
	$upload_name9_z = $dir . $name2 . '_9_z' . $jpeg;
	$upload_name10_z = $dir . $name2 . '_10_z' . $jpeg;

//データが全部空の時
if ($photo_name1 == $empty && $photo_name2 == $empty && $photo_name3 == $empty && $photo_name4 == $empty && $photo_name5 == $empty && $photo_name6 == $empty && $photo_name7 == $empty && $photo_name8 == $empty && $photo_name9 == $empty && $photo_name10 == $empty && $delete1 == $empty && $delete2 == $empty && $delete3 == $empty && $delete4 == $empty && $delete5 == $empty && $delete6 == $empty && $delete7 == $empty && $delete8 == $empty && $delete9 == $empty && $delete10 == $empty) {
	echo '<p>写真登録ナシ</p>';
}

/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（1枚目）//
/////////////////////////////////////////////
if (($photo_type1 == 'image/jpeg') || ($photo_type1 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name1 , $upload_name1);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■1枚目<br /><a href="' . $upload_name1 . '" target="_blank"><img src="' . $upload_name1_t. '" alt="photo1" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name1);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真1]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		if($width>$height){
			echo "<p>一枚目は縦写真のみアップロード可能です。</p>\n";
		}else{

		//サムネイル画像の幅と高さを決める
		
			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);




		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name1);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_m.jpg')){
			unlink('./photo/'.$name2.'_1_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name1_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_l.jpg')){
			unlink('./photo/'.$name2.'_1_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name1_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_t.jpg')){
			unlink('./photo/'.$name2.'_1_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name1_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_s.jpg')){
			unlink('./photo/'.$name2.'_1_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name1_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_p.jpg')){
			unlink('./photo/'.$name2.'1_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name1_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_b.jpg')){
			unlink('./photo/'.$name2.'1_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name1_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_g.jpg')){
			unlink('./photo/'.$name2.'_1_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name1_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_z.jpg')){
			unlink('./photo/'.$name2.'_1_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name1_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
		
		}
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name1 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（2枚目）//
/////////////////////////////////////////////
if (($photo_type2 == 'image/jpeg') || ($photo_type2 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name2 , $upload_name2);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（2枚目）<br /><a href="' . $upload_name2 . '" target="_blank"><img src="' . $upload_name2_t. '" alt="photo2" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name2);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真2]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name2);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_m.jpg')){
			unlink('./photo/'.$name2.'_2_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name2_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_2_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_l.jpg')){
			unlink('./photo/'.$name2.'_2_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name2_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_t.jpg')){
			unlink('./photo/'.$name2.'_2_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name2_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_s.jpg')){
			unlink('./photo/'.$name2.'_2_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name2_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_p.jpg')){
			unlink('./photo/'.$name2.'_2_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name2_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_b.jpg')){
			unlink('./photo/'.$name2.'_2_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name2_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_g.jpg')){
			unlink('./photo/'.$name2.'_2_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name2_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_2_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_z.jpg')){
			unlink('./photo/'.$name2.'_2_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name2_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_2_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name2 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（3枚目）//
/////////////////////////////////////////////
if (($photo_type3 == 'image/jpeg') || ($photo_type3 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name3 , $upload_name3);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（3枚目）<br /><a href="' . $upload_name3 . '" target="_blank"><img src="' . $upload_name3_t. '" alt="photo3" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name3);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真3]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name3);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_m.jpg')){
			unlink('./photo/'.$name2.'_3_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name3_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_3_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_l.jpg')){
			unlink('./photo/'.$name2.'_3_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name3_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_t.jpg')){
			unlink('./photo/'.$name2.'_3_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name3_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_s.jpg')){
			unlink('./photo/'.$name2.'_3_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name3_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_p.jpg')){
			unlink('./photo/'.$name2.'_3_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name3_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_b.jpg')){
			unlink('./photo/'.$name2.'_3_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name3_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_g.jpg')){
			unlink('./photo/'.$name2.'_3_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name3_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_3_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_z.jpg')){
			unlink('./photo/'.$name2.'_3_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name3_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_3_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name3 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（4枚目）//
/////////////////////////////////////////////
if (($photo_type4 == 'image/jpeg') || ($photo_type4 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name4 , $upload_name4);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（4枚目）<br /><a href="' . $upload_name4 . '" target="_blank"><img src="' . $upload_name4_t. '" alt="photo4" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name4);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真4]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name4);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_m.jpg')){
			unlink('./photo/'.$name2.'_4_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name4_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_4_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_l.jpg')){
			unlink('./photo/'.$name2.'_4_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name4_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_t.jpg')){
			unlink('./photo/'.$name2.'_4_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name4_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_s.jpg')){
			unlink('./photo/'.$name2.'_4_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name4_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_p.jpg')){
			unlink('./photo/'.$name2.'_4_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name4_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_b.jpg')){
			unlink('./photo/'.$name2.'_4_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name4_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_g.jpg')){
			unlink('./photo/'.$name2.'_4_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name4_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_4_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'4_z.jpg')){
			unlink('./photo/'.$name2.'_4_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name4_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_4_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name4 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（5枚目）//
/////////////////////////////////////////////
if (($photo_type5 == 'image/jpeg') || ($photo_type5 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name5 , $upload_name5);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（5枚目）<br /><a href="' . $upload_name5 . '" target="_blank"><img src="' . $upload_name5_t. '" alt="photo5" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name5);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真5]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name5);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_m.jpg')){
			unlink('./photo/'.$name2.'_5_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name5_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_5_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_l.jpg')){
			unlink('./photo/'.$name2.'_5_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name5_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_t.jpg')){
			unlink('./photo/'.$name2.'_5_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name5_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_s.jpg')){
			unlink('./photo/'.$name2.'_5_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name5_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_p.jpg')){
			unlink('./photo/'.$name2.'_5_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name5_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_b.jpg')){
			unlink('./photo/'.$name2.'_5_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name5_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_g.jpg')){
			unlink('./photo/'.$name2.'_5_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name5_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_5_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_z.jpg')){
			unlink('./photo/'.$name2.'_5_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name5_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_5_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name5 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}



/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（6枚目）//
/////////////////////////////////////////////
if (($photo_type6 == 'image/jpeg') || ($photo_type6 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name6 , $upload_name6);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（6枚目）<br /><a href="' . $upload_name6 . '" target="_blank"><img src="' . $upload_name6_t. '" alt="photo6" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name6);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真6]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name6);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_m.jpg')){
			unlink('./photo/'.$name2.'_6_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name6_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_6_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_l.jpg')){
			unlink('./photo/'.$name2.'_6_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name6_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_t.jpg')){
			unlink('./photo/'.$name2.'_6_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name6_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_s.jpg')){
			unlink('./photo/'.$name2.'_6_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name6_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_p.jpg')){
			unlink('./photo/'.$name2.'_6_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name6_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_b.jpg')){
			unlink('./photo/'.$name2.'_6_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name6_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_g.jpg')){
			unlink('./photo/'.$name2.'_6_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name6_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_z.jpg')){
			unlink('./photo/'.$name2.'_6_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name6_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name6 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}

/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（7枚目）//
/////////////////////////////////////////////
if (($photo_type7 == 'image/jpeg') || ($photo_type7 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name7 , $upload_name7);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（7枚目）<br /><a href="' . $upload_name7 . '" target="_blank"><img src="' . $upload_name7_t. '" alt="photo7" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name7);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真7]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name7);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_m.jpg')){
			unlink('./photo/'.$name2.'_7_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name7_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_7_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_l.jpg')){
			unlink('./photo/'.$name2.'_7_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name7_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_t.jpg')){
			unlink('./photo/'.$name2.'_7_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name7_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_s.jpg')){
			unlink('./photo/'.$name2.'_7_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name7_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_p.jpg')){
			unlink('./photo/'.$name2.'_7_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name7_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_b.jpg')){
			unlink('./photo/'.$name2.'_7_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name7_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_g.jpg')){
			unlink('./photo/'.$name2.'_7_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name7_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_z.jpg')){
			unlink('./photo/'.$name2.'_7_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name7_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name7 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（8枚目）//
/////////////////////////////////////////////
if (($photo_type8 == 'image/jpeg') || ($photo_type8 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name8 , $upload_name8);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（8枚目）<br /><a href="' . $upload_name8 . '" target="_blank"><img src="' . $upload_name8_t. '" alt="photo8" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name8);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真8]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name8);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_m.jpg')){
			unlink('./photo/'.$name2.'_8_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name8_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_8_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_l.jpg')){
			unlink('./photo/'.$name2.'_8_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name8_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_t.jpg')){
			unlink('./photo/'.$name2.'_8_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name8_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_s.jpg')){
			unlink('./photo/'.$name2.'_8_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name8_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_p.jpg')){
			unlink('./photo/'.$name2.'_8_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name8_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_b.jpg')){
			unlink('./photo/'.$name2.'_8_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name8_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_g.jpg')){
			unlink('./photo/'.$name2.'_8_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name8_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_z.jpg')){
			unlink('./photo/'.$name2.'_8_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name8_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name8 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（9枚目）//
/////////////////////////////////////////////
if (($photo_type9 == 'image/jpeg') || ($photo_type9 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name9 , $upload_name9);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（9枚目）<br /><a href="' . $upload_name9 . '" target="_blank"><img src="' . $upload_name9_t. '" alt="photo9" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name9);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真9]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name9);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_m.jpg')){
			unlink('./photo/'.$name2.'_9_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name9_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_9_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_l.jpg')){
			unlink('./photo/'.$name2.'_9_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name9_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_t.jpg')){
			unlink('./photo/'.$name2.'_9_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name9_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_s.jpg')){
			unlink('./photo/'.$name2.'_9_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name9_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_p.jpg')){
			unlink('./photo/'.$name2.'_9_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name9_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_b.jpg')){
			unlink('./photo/'.$name2.'_9_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name9_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_g.jpg')){
			unlink('./photo/'.$name2.'_9_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name9_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_z.jpg')){
			unlink('./photo/'.$name2.'_9_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name9_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name9 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（10枚目）//
/////////////////////////////////////////////
if (($photo_type10 == 'image/jpeg') || ($photo_type10 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name10 , $upload_name10);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（10枚目）<br /><a href="' . $upload_name10 . '" target="_blank"><img src="' . $upload_name10_t. '" alt="photo10" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name10);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真10]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name10);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_m.jpg')){
			unlink('./photo/'.$name2.'_10_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name10_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_10_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_l.jpg')){
			unlink('./photo/'.$name2.'_10_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name10_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_t.jpg')){
			unlink('./photo/'.$name2.'_10_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name10_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_s.jpg')){
			unlink('./photo/'.$name2.'_10_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name10_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_p.jpg')){
			unlink('./photo/'.$name2.'_10_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name10_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_b.jpg')){
			unlink('./photo/'.$name2.'_10_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name10_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_g.jpg')){
			unlink('./photo/'.$name2.'_10_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name10_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_z.jpg')){
			unlink('./photo/'.$name2.'_10_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name10_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name10 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


?>
    
  <?php

//更新されたデータに差し替える
if ($photo_name1 != $empty) {$photo1 = $dir . $name2 . '_1';}
if ($photo_name2 != $empty) {$photo2 = $dir . $name2 . '_2';}
if ($photo_name3 != $empty) {$photo3 = $dir . $name2 . '_3';}
if ($photo_name4 != $empty) {$photo4 = $dir . $name2 . '_4';}
if ($photo_name5 != $empty) {$photo5 = $dir . $name2 . '_5';}
if ($photo_name6 != $empty) {$photo6 = $dir . $name2 . '_6';}
if ($photo_name7 != $empty) {$photo7 = $dir . $name2 . '_7';}
if ($photo_name8 != $empty) {$photo8 = $dir . $name2 . '_8';}
if ($photo_name9 != $empty) {$photo9 = $dir . $name2 . '_9';}
if ($photo_name10 != $empty) {$photo10 = $dir . $name2 . '_10';}

//削除写真のデータを空に
if($delete1=='delete'){$photo1='';}
if($delete2=='delete'){$photo2='';}
if($delete3=='delete'){$photo3='';}
if($delete4=='delete'){$photo4='';}
if($delete5=='delete'){$photo5='';}
if($delete6=='delete'){$photo6='';}
if($delete7=='delete'){$photo7='';}
if($delete8=='delete'){$photo8='';}
if($delete9=='delete'){$photo9='';}
if($delete10=='delete'){$photo10='';}

?></th>
</tr>

<tr>
  <th width="30%">登録日</th>
  <td width="70%"><?php echo $yobi8; ?><br /></td>
</tr>
<tr>
  <th align="left">前回編集日</th>
  <td align="left"><?php echo $edittime; ?></td>
</tr>
<tr>
  <th align="left">現在の出勤表示期限日</th>
  <td align="left"><?php echo $yobi7; ?></td>
</tr>
<!--
<tr>
  <th class="bg2">編集日</th>
  <td class="bg2"><?php echo $edittime; ?></td>
</tr>
<tr>
  <th class="bg2">現在の出勤表示期限日</th>
  <td class="bg2"><?php echo $yobi7; ?></td>
</tr>
-->

</table>

<p class="midashi1">出勤情報入力</p>

<table width="100%">
<tr>
<th class="th2"><?php echo $day1 . '(' . $week1 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day2 . '(' . $week2 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day3 . '(' . $week3 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day4 . '(' . $week4 . ')' ?>の出勤</th>
</tr>
<tr>
<td align="center" class="td2"><?php 
if($yotei1=='3'){echo "出勤";}
	elseif($yotei1=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
<td align="center" class="td2"><?php 
if($yotei2=='3'){echo "出勤";}
	elseif($yotei2=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
<td align="center" class="td2"><?php 
if($yotei3=='3'){echo "出勤";}
	elseif($yotei3=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
<td align="center" class="td2"><?php 
if($yotei4=='3'){echo "出勤";}
	elseif($yotei4=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
</tr>
<tr>
<th class="th2"><?php echo $day5 . '(' . $week5 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day6 . '(' . $week6 . ')' ?>の出勤</th>
<th class="th2"><?php echo $day7 . '(' . $week7 . ')' ?>の出勤</th>
<th class="th2">&nbsp;</th>
</tr>
<tr>
<td align="center" class="td2"><?php 
if($yotei5=='3'){echo "出勤";}
	elseif($yotei5=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
<td align="center" class="td2"><?php 
if($yotei6=='3'){echo "出勤";}
	elseif($yotei6=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
<td align="center" class="td2"><?php 
if($yobi4=='3'){echo "出勤";}
	elseif($yobi4=='2'){echo "お休み";}
	else{echo "お休み";}
 ?></td>
<td align="center" class="td2">&nbsp;</td>
</tr>
</table>
<form action="write.php" method="post">
<input type="hidden" name="name" value="<?php echo $name; ?>" />
<input type="hidden" name="name2" value="<?php echo $name2; ?>" />
<input type="hidden" name="age" value="<?php echo $age; ?>" />
<input type="hidden" name="height" value="<?php echo $height; ?>" />
<input type="hidden" name="weight" value="<?php echo $weight; ?>" />
<input type="hidden" name="bust" value="<?php echo $bust; ?>" />
<input type="hidden" name="cup" value="<?php echo $cup; ?>" />
<input type="hidden" name="waist" value="<?php echo $waist; ?>" />
<input type="hidden" name="hip" value="<?php echo $hip; ?>" />
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
<!-- 表示期限日 -->

<p class="text1"><span class="col_red">登録には時間がかかる場合があります。ボタンは一度だけ押してください。</span><br />
  <br />
</p>
<p align="center"><input type="submit" class="w_px100" value="登録" />　
<input type="button" class="w_px100" onclick="JavaScript:history.go(-1)" value="前のページに戻って修正" /></p>
</form>
</div><div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>
</body>
</html>