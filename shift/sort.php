<?php
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
	}
}

//フォームからの生データ
$order = htmlspecialchars($_POST['order'] , ENT_QUOTES);
$id = htmlspecialchars($_POST['id'] , ENT_QUOTES);
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

//曜日で入れ替え
if($week1 == '月'){
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
	
}elseif($week1 == '火'){
	$yotei1 = $_POST['yobi4'];
	$yotei2 = $_POST['yotei1'];
	$yotei3 = $_POST['yotei2'];
	$yotei4 = $_POST['yotei3'];
	$yotei5 = $_POST['yotei4'];
	$yotei6 = $_POST['yotei5'];
	$yobi4 = $_POST['yotei6'];
	
	$start1 = $_POST['yobi5'];
	$start2 = $_POST['start1'];
	$start3 = $_POST['start2'];
	$start4 = $_POST['start3'];
	$start5 = $_POST['start4'];
	$start6 = $_POST['start5'];
	$yobi5 = $_POST['start6'];
	
	$end1 = $_POST['yobi6'];
	$end2 = $_POST['end1'];
	$end3 = $_POST['end2'];
	$end4 = $_POST['end3'];
	$end5 = $_POST['end4'];
	$end6 = $_POST['end5'];
	$yobi6 = $_POST['end6'];
	
}elseif($week1 == '水'){
	$yotei1 = $_POST['yotei6'];
	$yotei2 = $_POST['yobi4'];
	$yotei3 = $_POST['yotei1'];
	$yotei4 = $_POST['yotei2'];
	$yotei5 = $_POST['yotei3'];
	$yotei6 = $_POST['yotei4'];
	$yobi4 = $_POST['yotei5'];
	
	$start1 = $_POST['start6'];
	$start2 = $_POST['yobi5'];
	$start3 = $_POST['start1'];
	$start4 = $_POST['start2'];
	$start5 = $_POST['start3'];
	$start6 = $_POST['start4'];
	$yobi5 = $_POST['start5'];
	
	$end1 = $_POST['end6'];
	$end2 = $_POST['yobi6'];
	$end3 = $_POST['end1'];
	$end4 = $_POST['end2'];
	$end5 = $_POST['end3'];
	$end6 = $_POST['end4'];
	$yobi6 = $_POST['end5'];
	
}elseif($week1 == '木'){
	$yotei1 = $_POST['yotei5'];
	$yotei2 = $_POST['yotei6'];
	$yotei3 = $_POST['yobi4'];
	$yotei4 = $_POST['yotei1'];
	$yotei5 = $_POST['yotei2'];
	$yotei6 = $_POST['yotei3'];
	$yobi4 = $_POST['yotei4'];
	
	$start1 = $_POST['start5'];
	$start2 = $_POST['start6'];
	$start3 = $_POST['yobi5'];
	$start4 = $_POST['start1'];
	$start5 = $_POST['start2'];
	$start6 = $_POST['start3'];
	$yobi5 = $_POST['start4'];
	
	$end1 = $_POST['end5'];
	$end2 = $_POST['end6'];
	$end3 = $_POST['yobi6'];
	$end4 = $_POST['end1'];
	$end5 = $_POST['end2'];
	$end6 = $_POST['end3'];
	$yobi6 = $_POST['end4'];
}elseif($week1 == '金'){
	$yotei1 = $_POST['yotei4'];
	$yotei2 = $_POST['yotei5'];
	$yotei3 = $_POST['yotei6'];
	$yotei4 = $_POST['yobi4'];
	$yotei5 = $_POST['yotei1'];
	$yotei6 = $_POST['yotei2'];
	$yobi4 = $_POST['yotei3'];
	
	$start1 = $_POST['start4'];
	$start2 = $_POST['start5'];
	$start3 = $_POST['start6'];
	$start4 = $_POST['yobi5'];
	$start5 = $_POST['start1'];
	$start6 = $_POST['start2'];
	$yobi5 = $_POST['start3'];
	
	$end1 = $_POST['end4'];
	$end2 = $_POST['end5'];
	$end3 = $_POST['end6'];
	$end4 = $_POST['yobi6'];
	$end5 = $_POST['end1'];
	$end6 = $_POST['end2'];
	$yobi6 = $_POST['end3'];
	
}elseif($week1 == '土'){
	$yotei1 = $_POST['yotei3'];
	$yotei2 = $_POST['yotei4'];
	$yotei3 = $_POST['yotei5'];
	$yotei4 = $_POST['yotei6'];
	$yotei5 = $_POST['yobi4'];
	$yotei6 = $_POST['yotei1'];
	$yobi4 = $_POST['yotei2'];
	
	$start1 = $_POST['start3'];
	$start2 = $_POST['start4'];
	$start3 = $_POST['start5'];
	$start4 = $_POST['start6'];
	$start5 = $_POST['yobi5'];
	$start6 = $_POST['start1'];
	$yobi5 = $_POST['start2'];
	
	$end1 = $_POST['end3'];
	$end2 = $_POST['end4'];
	$end3 = $_POST['end5'];
	$end4 = $_POST['end6'];
	$end5 = $_POST['yobi6'];
	$end6 = $_POST['end1'];
	$yobi6 = $_POST['end2'];
	
}elseif($week1 == '日'){
	$yotei1 = $_POST['yotei2'];
	$yotei2 = $_POST['yotei3'];
	$yotei3 = $_POST['yotei4'];
	$yotei4 = $_POST['yotei5'];
	$yotei5 = $_POST['yotei6'];
	$yotei6 = $_POST['yobi4'];
	$yobi4 = $_POST['yotei1'];
	
	$start1 = $_POST['start2'];
	$start2 = $_POST['start3'];
	$start3 = $_POST['start4'];
	$start4 = $_POST['start5'];
	$start5 = $_POST['start6'];
	$start6 = $_POST['yobi5'];
	$yobi5 = $_POST['start1'];
	
	$end1 = $_POST['end2'];
	$end2 = $_POST['end3'];
	$end3 = $_POST['end4'];
	$end4 = $_POST['end5'];
	$end5 = $_POST['end6'];
	$end6 = $_POST['yobi6'];
	$yobi6 = $_POST['end1'];
}

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
$comment2 = str_replace(',' , '' , $comment2);
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
$yobi1 = str_replace(',' , '' , $yobi1);
$yobi2 = str_replace(',' , '' , $yobi2);
$yobi3 = str_replace(',' , '' , $yobi3);

//スペースを除去
$name2 = str_replace(' ' , '' , $name2);
$name2 = str_replace('　' , '' , $name2);

//<=>を,に変換
$order = str_replace('<=>' , ',' , $order);

//登録日でソートして昇順に並べ替え
$filename = 'data.csv';

//ロケール設定
setlocale(LC_ALL,'ja_JP.utf-8');

//ファイルを開く
$file = fopen($filename,'r');

//関数の定義ファイルを読み込み
include('parts/function.php');

//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}

//ファイルを閉じる
fclose($file);

include("order_write.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="refresh" content="0;URL=list.php">
<title>出勤管理</title>
</head>

<body>
</body>
</html>