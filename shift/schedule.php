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
<title>出勤一覧</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- Add jQuery library -->
	<script type="text/javascript" src="../lib/jquery-1.9.0.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="../lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="../source/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="../source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="../source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */
			 $('.fancybox').fancybox();
		
		});
		
	</script> 	
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
    
    </head>

<body>

<div id="container">

<h1>出勤一覧</h1>

<?php
$data = file('data.csv');
$cnt = count($data);

echo "<p class=\"align_right\">⇒現在登録人数 " . $cnt . " 人<p>\n";
echo "<ul id=\"menu\">\n";
include ('parts/menu2.php');
echo "</ul>\n";
echo "<div id=\"under_line\"></div>\n";
$data = file('data.csv');
	$cnt = count($data);
	if ($cnt == '0') {
		echo '<hr /><p>※まだ登録がありません。</p>';
		echo '</div>';
		include ('parts/copyright.php');
		echo '</body>';
		echo '</html>';
		exit();
	}
?>
<br />
<br />
<a href="taiken/taiken.php"><img src="img/taiken_button.jpg" width="300" height="67" /></a><br />
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
<?php

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



//ソート順を定義したソート関数を呼び出す
//usort($datacsv,'cmp');

while(list($key,$line)=each($datacsv)){
include('parts/basic_hensu.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//▽表示内容ここから

echo "<tr><td width=\"100\">";
	if($photo1 == $empty){
	echo "<img src=\"photo/no_photo_p.jpg\" alt=\"".$name."\" />\n";
}else{
	echo "<img src=\"".$photo1."_p.jpg\" alt=\"".$name."\" width=\"104\" height=\"156\" />\n";
}
echo "<br/>\n";
echo "<br/>".$name."(".$age.") <br/>\n";
echo "</td><td>\n";
echo <<<GOLGO
<table width="100%">
<tr>
<th class="th2">$day1($week1)</th>
<th class="th2">$day2($week2)</th>
<th class="th2">$day3($week3)</th>
<th class="th2">$day4($week4)</th>
<th class="th2">$day5($week5)</th>
<th class="th2">$day6($week6)</th>
<th class="th2">$day7($week7)</th>
</tr>
<tr>
<td align="center">
GOLGO;
$getdays=getDays($tdy_8dig,$yobi7);

if($getdays<1){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yotei1 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yotei1 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
	echo "</td><td align=\"center\">\n";

if($getdays<2){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yotei2 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yotei2 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
	echo "</td><td align=\"center\">\n";
if($getdays<3){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yotei3 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yotei3 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
	echo "</td><td align=\"center\">\n";

if($getdays<4){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yotei4 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yotei4 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
	echo "</td><td align=\"center\">\n";

if($getdays<5){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yotei5 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yotei5 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
	echo "</td><td align=\"center\">\n";

if($getdays<6){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yotei6 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yotei6 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
	echo "</td><td align=\"center\">\n";

if($getdays<7){
echo "<div id=\"yasumi\">お休み</div>";
}else{
if ($yobi4 == '2') {
echo "<div id=\"yasumi\">お休み</div>";
} elseif ($yobi4 == '3') {
echo "<div id=\"syukkin\">出勤</div>";
} else {
echo "<div id=\"yasumi\">お休み</div>";
}
}
echo "</td></tr>\n";

echo "<tr><td colspan=\"7\">\n";
echo "<ul id=\"aj\"><li>\n";
echo "<a class=\"fancybox fancybox.ajax\" href=\"edit2.php?name2=".$name2."\">出勤情報を編集</a></li></ul>\n";
echo "</td></tr></table>\n";
echo "</td></tr>\n";
}
//ソート関数の定義(登録日）
//function cmp($a,$b){
//return strcmp($a[0],$b[0]);
//}
?>
</table>

<div id="under_line"></div>
<br />
<a href="taiken/taiken.php"><img src="img/taiken_button.jpg" width="300" height="67" /></a>
<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>
</div>
<script type="text/javascript">
var _gaq = _gaq || [];
_gaq.push(['_setAccount', 'UA-4586959-2']);
_gaq.push(['_trackPageview']);
(function() {
var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
})();
</script>
</body>
</html>