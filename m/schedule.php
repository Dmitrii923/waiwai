<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';

$sche = $_GET['sche'];
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>出勤情報｜群馬県館林市のガールズバー「WaiWai合衆国」モバイル版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のモバイル版 出勤情報ページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,モバイル版,出勤情報">

</head>

<body bgcolor="#010080" text="#ffffff" link="#e70014" vlink="#990000">
<table width="240" border="1" bordercolor="#010080" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">
    <img src="img/logo.jpg" width="240" height="56" alt="館林 ガールズバー「WaiWai合衆国」" /><br />
    </td>
  <tr>
  <tr>
    <td bgcolor="#010080" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#df0000" colspan="2">
    <font color="#FFFFFF" size="2">■SCHEDULE　<font size="1">出勤情報</font></font><br />
    </td>
  </tr>
  <tr>
    <td colspan="2">
    <div align="center">
    <font size="1">
    <a href="schedule.php?sche=0">本日の出勤</a>｜<a href="schedule.php?sche=1">明日の出勤</a>｜<a href="schedule.php?sche=2">明後日の出勤</a>
    </font>
    </div>
<?php
//出勤の日付
echo "<div align=\"center\"><font size=\"-3\">";
if($sche=='0'){echo "<p>".$day1."(".$week1.")の出勤情報</p>\n";}
if($sche=='1'){echo "<p>".$day2."(".$week2.")の出勤情報</p>\n";}
if($sche=='2'){echo "<p>".$day3."(".$week3.")の出勤情報</p>\n";}
if($sche=='3'){echo "<p>".$day4."(".$week4.")の出勤情報</p>\n";}
if($sche=='4'){echo "<p>".$day5."(".$week5.")の出勤情報</p>\n";}
if($sche=='5'){echo "<p>".$day6."(".$week6.")の出勤情報</p>\n";}
if($sche=='6'){echo "<p>".$day7."(".$week7.")の出勤情報</p>\n";}
echo "</div></font>";
?>

	</td>
  </tr>
  <tr>
    <td>
<?php
//出勤時間でソートして昇順に並べ替え
$filename = '../shift/data.csv';
//ファイルを開く
$file = fopen($filename,'r');
//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}
//ファイルを閉じる
fclose($file);

//テーブル繰り返し変数
$col=0;

if($sche=='0'){

//ソートする
//@usort($datacsv,"cmp");

while(list($key,$line)=@each($datacsv)){
include('../shift/parts/basic_hensu.php');
include('../shift/parts/schetime.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<1){
		echo "";
	}else{
		if ($yotei1 == '3' || $yotei1 == '4') {
			$col++;
			
			//TRタグ開始
			if($col==1){
				echo "<tr>\n";
			}
			//TDタグ開始
			echo "<td width=\"120\" align=\"center\" valign=\"top\">";
			//写真登録の有無
			if($photo1==$empty){
				echo "<img src=\"../shift/photo/no_photo_s.jpg\" alt=\"".$name."\" /><br />\n";
			}else{
				echo "<img src=\"../shift/".$photo1."_s.jpg\" alt=\"".$name."\" /><br />\n";
			}
			echo "<font size=\"1\"><a href=\"prof.php?name2=".$name2."\">".$name."</a></font><br />\n";
			if($profinfo6==''){
				echo '';
			}else{
				echo "<font size=\"1\"><a href=\"http://ameblo.jp/".$profinfo6."\">BLOG</a></font>\n";
			}
			echo "</td>\n";
			
			//2列目ならTR終了
			if($col==2){
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
				echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//体験キャストの人数
	$c = file('../shift/taiken/taiken.csv');
	$d = explode(',',$c[0]);
	$d[0] = str_replace("\r\n" , "" , $d[0]);
	$d[0] = intval($d[0]);
	$d[1] = str_replace("\r\n" , "" , $d[1]);
	$d[1] = intval($d[1]);

	//体験キャストの表示
	$tcol=1;

	if ($d[0]!=0 && $d[1]==$tdy){
		while($tcol<=$d[0]){
			$col++;
			if($col==1){
				echo "<tr>\n";
			}
			
			//TDタグ開始
			echo "<td width=\"120\" align=\"center\" valign=\"top\">\n";
		
			//写真
			echo "<img src=\"../shift/taiken/taiken_mobile.jpg\" alt=\"体験".$tcol."\" /><br />\n";
			echo "<font size=\"1\">体験入店".$tcol."</font><br /></td>\n";
			
			//5列目ならTRタグ終了　$colをリセット
			if($col==2){
				echo "</tr>\n";
				$col=0;
			}
			$tcol++;
			
		}

		//列の残りを埋める
		if($col>0){
			echo "<td colspan=\"".(2-$col)."\">&nbsp;</td>\n";
			echo "</tr>\n";
		}
	}
} //sche終わり


if($sche=='1'){

//ソートする
//usort($datacsv,"cmp");

while(list($key,$line)=each($datacsv)){
include('../shift/parts/basic_hensu.php');
include('../shift/parts/schetime.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<2){
		echo "";
	}else{
		if ($yotei2 == '3' || $yotei2 == '4') {
						$col++;
			
			//TRタグ開始
			if($col==1){
				echo "<tr>\n";
			}
			//TDタグ開始
			echo "<td width=\"120\" align=\"center\" valign=\"top\">";
			//写真登録の有無
			if($photo1==$empty){
				echo "<img src=\"../shift/photo/no_photo_s.jpg\" alt=\"".$name."\" /><br />\n";
			}else{
				echo "<img src=\"../shift/".$photo1."_s.jpg\" alt=\"".$name."\" /><br />\n";
			}
			echo "<font size=\"1\"><a href=\"prof.php?name2=".$name2."\">".$name."</a></font><br />\n";
			if($profinfo6==''){
				echo '';
			}else{
				echo "<font size=\"1\"><a href=\"http://ameblo.jp/".$profinfo6."\">BLOG</a></font>\n";
			}
			echo "</td>\n";
			
			//2列目ならTR終了
			if($col==2){
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
				echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(2-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}
} //sche終わり


if($sche=='2'){

//ソートする
//usort($datacsv,"cmp");

while(list($key,$line)=each($datacsv)){
include('../shift/parts/basic_hensu.php');
include('../shift/parts/schetime.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<3){
		echo "";
	}else{
		if ($yotei3 == '3' || $yotei3 == '4') {
			$col++;
			
			//TRタグ開始
			if($col==1){
				echo "<tr>\n";
			}
			//TDタグ開始
			echo "<td width=\"120\" align=\"center\" valign=\"top\">";
			//写真登録の有無
			if($photo1==$empty){
				echo "<img src=\"../shift/photo/no_photo_s.jpg\" alt=\"".$name."\" /><br />\n";
			}else{
				echo "<img src=\"../shift/".$photo1."_s.jpg\" alt=\"".$name."\" /><br />\n";
			}
			echo "<font size=\"1\"><a href=\"prof.php?name2=".$name2."\">".$name."</a></font><br />\n";
			if($profinfo6==''){
				echo '';
			}else{
				echo "<font size=\"1\"><a href=\"http://ameblo.jp/".$profinfo6."\">BLOG</a></font>\n";
			}
			echo "</td>\n";
			
			//2列目ならTR終了
			if($col==2){
				echo "</tr>\n";
				echo "<tr>\n";
				echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
				echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(2-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}
} //sche終わり


//ソート関数の定義
//function cmp($b,$a){
//return strcmp($a[97],$b[97]);}
?>
    </td>
  </tr>
  <tr>
    <td bgcolor="#010080" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td bgcolor="#df0000" colspan="2">
    <font color="#FFFFFF" size="2">■MENU</font>
    </td>
  </tr>
  <tr>
    <td colspan="2">
    <br />
	<?php include ('php/menum.php'); ?><br />
    <br />
    </td>
  </tr>
  <tr>
    <td bgcolor="#df0000" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
    <br />
	<?php include ('php/data.php'); ?><br />
    <br />
    </td>
  </tr>
  <tr>
    <td bgcolor="#df0000" align="center" colspan="2">
    <font color="#ffffff" size="1">
    <br />
    copyright (c) 2013 e-nomiya. <br />
    All Rights Reserved.</font><br />
    <br />
    </td>
  </tr>
</table>

</body>
</html>
