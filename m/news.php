<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';
$page=$_GET['page'];
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>最新ニュース｜群馬県館林市のガールズバー「WaiWai合衆国」モバイル版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のモバイル版 最新ニュースページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,モバイル版,最新ニュース">

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
    <font color="#FFFFFF" size="2">■NEWS　<font size="1">最新ニュース</font></font>
    </td>
  </tr>
  <tr>
    <td>
    <font size="-1">
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
	echo "<br />\n";
	echo "<table width=\"240\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	echo "<tr>\n";
	echo "<td>PAGE&nbsp;";
	if($page_all==1){
		echo'';
	}elseif($page_all>=2){
		for($i=0;$i<$page_all;$i++){
			$pnum=($i+1);
			echo "｜<a href=\"event.php?page=".$i."\">&nbsp;".$pnum."&nbsp;</a>";
		}
	}
	echo "</td>\n";
	echo "</tr>\n";
	echo "</table>\n";
	echo "";
}
?>
</font>
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
