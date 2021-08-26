<?php
	//設定ファイル読み込み
	require_once '../shift/conf.php';
	include('../shift/parts/function.php');
	$page=$_GET['page'];
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>スタッフ一覧｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版 スタッフ一覧ページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,スタッフ一覧">
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
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <strong>スタッフ一覧</strong></p>
</header>

<h2 class="heading">スタッフ情報　<span id="hd">Staff</span></h2>
<div id="wrap">

  <div id="cast_list"><ul class="list">
  <?php
//ソートして昇順に並べ替え
$filename = '../shift/data.csv';
//ファイルを開く
$file = fopen($filename,'r');
//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}
//ファイルを閉じる
fclose($file);

//ページ総数を算出
$cnt=count($datacsv);
$page_all=$cnt/$page_lmt;
if(is_float($page_all)){
	$page_all=intval($page_all);
	$page_all++;
}
echo "<!-- page_all⇒".$page_all." -->\n";

$page2=$page*$page_lmt;
$page_lmt2=($page+1)*$page_lmt;

echo "<!-- △これより大きくて⇒".$page2."<br />";
echo "△これより小さい⇒".$page_lmt2."<br /> -->";

$p=0;

//ソートする
//@usort($datacsv,'cmp1');

while(list($key,$line)=@each($datacsv)){
include('../shift/parts/basic_hensu.php');
include('../shift/parts/schetime.php');

	//▽表示内容ここから
		if($p>=$page2 && $p<$page_lmt2){
			$col++;
			
			
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
//ソート関数の定義
//function cmp1($b,$a){
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
