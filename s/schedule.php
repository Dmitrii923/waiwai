<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';

$sche = $_GET['sche'];
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>出勤情報｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版 出勤情報ページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,出勤情報">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">

<script type="text/javascript" src="_shared/js/smoothScroll.js"></script>

<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="iphone.png">

</head>
<body>
<header id="top">
  <img src="img/top.jpg" width="100%" alt="館林 ガールズバー「WaiWai合衆国」"><br />
        <section>
          <div align="center">
            <button type="button" onClick="location.href='index.php'" class="css3button2" style="width:90px;height:90px"><img src="img/home.png"><br />ホーム</button>
            <button type="button" onClick="location.href='tel:0276'" class="css3button2" style="width:90px;height:90px"><img src="img/tel.png"><br />電話</button>
            <button type="button" onClick="location.href='schedule.php?sche=0'" class="css3button2" style="width:90px;height:90px"><img src="img/schedule.png"><br />出勤情報</button>
            </div>
        </section>
  <h1>館林 ガールズバー「WaiWai合衆国」</h1>
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <strong>出勤情報</strong></p>
</header>

<h2 class="heading">出勤情報　<span id="hd">Today's Cast</span></h2>
<div id="wrap">
<section>
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
  <div align="center">
  <a href="schedule.php?sche=0">本日の出勤</a>｜<a href="schedule.php?sche=1">明日の出勤</a>｜<a href="schedule.php?sche=2">明後日の出勤</a>
  </div>    
</section>

  <div id="cast_list">
    <ul class="list">
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
			
			echo "<li class=\"list\">\n";
			//写真登録の有無
			if($photo1==$empty){
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"../shift/photo/no_photo.jpg\" class=\"list_thum\" alt=\"".$name."\" /><br />\n";
			}else{
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"../shift/".$photo1.".jpg\" class=\"list_thum\" alt=\"".$name."\" /><br />\n";
			}
			echo "".$name."</a>\n";
			echo "</li>\n";
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
			
			echo "<li class=\"list\">\n";
		
			//写真
			echo "<img src=\"../shift/taiken/taiken_s.jpg\" class=\"list_thum\" alt=\"体験".$tcol."\" /><br />\n";
			echo "体験入店".$tcol."<br />\n";
			echo "</li>\n";
			
			$tcol++;
			
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
									
									
			echo "<li class=\"list\">\n";
			//写真登録の有無
			if($photo1==$empty){
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"../shift/photo/no_photo.jpg\" class=\"list_thum\" alt=\"".$name."\" /><br />\n";
			}else{
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"../shift/".$photo1.".jpg\" class=\"list_thum\" alt=\"".$name."\" /><br />\n";
			}
			echo "".$name."</a>\n";
			echo "</li>\n";
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
			
			echo "<li class=\"list\">\n";
		
			//写真
			echo "<img src=\"../shift/taiken/taiken_s.jpg\" class=\"list_thum\" alt=\"体験".$tcol."\" /><br />\n";
			echo "体験入店".$tcol."<br />\n";
			echo "</li>\n";
			
			$tcol++;
			
		}
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
			
			echo "<li class=\"list\">\n";
			//写真登録の有無
			if($photo1==$empty){
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"../shift/photo/no_photo.jpg\" class=\"list_thum\" alt=\"".$name."\" /><br />\n";
			}else{
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"../shift/".$photo1.".jpg\" class=\"list_thum\" alt=\"".$name."\" /><br />\n";
			}
			echo "".$name."</a>\n";
			echo "</li>\n";
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
			
			echo "<li class=\"list\">\n";
		
			//写真
			echo "<img src=\"../shift/taiken/taiken_s.jpg\" class=\"list_thum\" alt=\"体験".$tcol."\" /><br />\n";
			echo "体験入店".$tcol."<br />\n";
			echo "</li>\n";
			
			$tcol++;
			
		}
	}
} //sche終わり



//ソート関数の定義
//function cmp($b,$a){
//return strcmp($a[97],$b[97]);}
?>  
    </ul>
  </div>


<?php include ('php/menu.php'); ?>

</div>
<div id="footContent" class="clearfix">
  <p id="btnTop"><a href="#top">Page Top</a></p>
</div>
<hr>
<?php include ('php/shopdata.php'); ?>

</body>
</html>