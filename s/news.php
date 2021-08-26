<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';
$page=$_GET['page'];
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>最新ニュース｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版 最新ニュースページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,最新ニュース">
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
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <strong>最新ニュース</strong></p>
</header>

<h2 class="heading">最新ニュース　<span id="hd">News</span></h2>
<div id="wrap">

<section>
  <aside>
  <div id="news">
  <?php
$data = file('../shift/bbs/bbs.csv');
$cnt = count($data);
//書込み0対策
if ($cnt == '0') {
	echo '<p>※まだ書込みがありません。</p>';
}else{


//登録日でソートして昇順に並べ替え
$filename = '../shift/bbs/bbs.csv';

//ファイルを開く
$file = fopen($filename,'r');

//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$bbscsv[]=$arry;
}

//ファイルを閉じる
fclose($file);

//ページ総数を算出
$page_all=$cnt/$page_lmt_bbs;
$page_all=intval($page_all);
$page_all++;

$page2=$page*$page_lmt_bbs;
$page_lmt2=($page+1)*$page_lmt_bbs;

echo "<!-- △これより大きくて⇒".$page2."<br />";
echo "△これより小さい⇒".$page_lmt2."<br /> -->";

$p=0;

//ソート順を定義したソート関数を呼び出す
usort($bbscsv,'cmp');

while(list($key,$line)=each($bbscsv)){

//▽表示内容ここから
if($p>=$page2 && $p<$page_lmt2){
	echo $line[1]."<br />".$line[2]."<br />\n";

	if($line[4]==$empty){
		echo '';
	}else{
		echo "<a href=\"../shift/bbs/".$line[4]."_bbs".$line[5]."\" target=\"_blank\"><img class=\"bbs_ph\" src=\"../shift/bbs/".$line[4]."_bbss".$line[5]."\" border=\"0\" /></a><br />\n";
	}
	echo $line[3]."\n";

	//改行タグを改行コードへ
	$bbscont = str_replace("<br />" , "\r\n" , $line[3]);

	echo "<hr size=\"1\" />\n";
	$p++;
}else{
	$p++;
}
//△表示内容ここまで
}

}	//書込み0対策ケツ

//ソート関数の定義(登録日）
function cmp($b,$a){
return strcmp($a[0],$b[0]);
}
?>
<?php
//複数ページリンクを作成

if($cnt>$page_lmt_bbs){
	echo "<p>PAGE&nbsp;";
	if($page_all==1){
		echo'';
	}elseif($page_all>=2){
		for($i=0;$i<$page_all;$i++){
			$pnum=($i+1);
			echo "｜<a href=\"news.php?page=".$i."\">&nbsp;".$pnum."&nbsp;</a>";
		}
	}
	echo "</p>\n";
	echo "";
}
?>
  </div>
  </aside>
</section>


<?php include ('php/menu.php'); ?>

</div>
<div id="footContent" class="clearfix">
  <p id="btnTop"><a href="#top">Page Top</a></p>
</div>
<hr>
<?php include ('php/shopdata.php'); ?>


</body>
</html>
