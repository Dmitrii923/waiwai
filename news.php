<?php
//設定ファイル読み込み
require_once 'shift/conf.php';
//ファンクションファイル読み込み
require_once 'shift/parts/function.php';
//改ページ用
$page=$_GET['page'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />     

</head>

<body>

<div id="header_bg2">
  <h1>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h1>
  <div id="header"><img src="img/logo2.png" width="1024" height="98" /></div>
</div>
<div id="button"><?php include ('php/menu.php'); ?></div>
<div id="main_bg2">
  <div id="blackarea"></div>
  <div id="pagenavi"><h2>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h2>
  <p></p>
  <p>｜<a href="index.php" title="群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」">トップページ</a> ＞＞ <strong>最新ニュース</strong></p></div>
  <div id="hoka_main">
    <div id="left"><?php include ('php/left.php'); ?></div>
    <div id="right"><img src="img/newspage.jpg" width="790" height="129" /><div id="newspage">
      <?php
$data = file('shift/bbs/bbs.csv');
$cnt = count($data);
//書込み0対策
if ($cnt == '0') {
	echo '<p>※まだ書込みがありません。</p>';
}else{


//登録日でソートして昇順に並べ替え
$filename = 'shift/bbs/bbs.csv';

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
		echo "<a href=\"shift/bbs/".$line[4]."_bbs".$line[5]."\" target=\"_blank\"><img class=\"bbs_ph\" src=\"shift/bbs/".$line[4]."_bbss".$line[5]."\" border=\"0\" /></a><br />\n";
	}
	echo $line[3]."\n";

	//改行タグを改行コードへ
	$bbscont = str_replace("<br />" , "\r\n" , $line[3]);

	echo "<div id=\"newsline\"></div>\n";
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
  </div></div>
    <div id="clear"></div>
  </div>
  <div id="footer"><?php include ('php/sitemap.php'); ?>
</div>
</div>
</body>
</html>