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
<title>スタッフ一覧｜群馬県館林市のガールズバー「WaiWai合衆国」モバイル版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のモバイル版 スタッフ一覧ページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,モバイル版,スタッフ一覧">

</head>

<body bgcolor="#010080" text="#ffffff" link="#e70014" vlink="#990000">
<table width="240" border="0" cellspacing="0" cellpadding="0">
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
    <font color="#FFFFFF" size="2">■STAFF　<font size="1">スタッフリスト</font></font>
    </td>
  </tr>
  <tr>
    <td><br />
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
$page_all=intval($page_all);
$page_all++;

$page2=$page*$page_lmt;
$page_lmt2=($page+1)*$page_lmt;

echo "<!-- △これより大きくて⇒".$page2."<br />";
echo "△これより小さい⇒".$page_lmt2."<br /> -->";

$p=0;

//ソートする
//usort($datacsv,'cmp1');

while(list($key,$line)=each($datacsv)){
include('../shift/parts/basic_hensu.php');
include('../shift/parts/schetime.php');

	//▽表示内容ここから
		if($p>=$page2 && $p<$page_lmt2){
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
			$p++;
		}else{
			$p++;
		}
}
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(2-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}

//ソート関数の定義
//function cmp1($b,$a){
//return strcmp($a[97],$b[97]);}

?>
    </td>
  </tr>
  <tr>
    <td>
	
<?php
if($page_all==1){
	echo'';
}elseif($page_all>=2){
		if($page=='0'){
			echo "<a href=\"cast.php?page=".($page+1)."\">NEXT→</a><br />\n";
		}elseif($page>='1'&&$page<($page_all-1)){
			echo "<a href=\"cast.php?page=".($page-1)."\">←BACK</a>｜<a href=\"cast.php?page=".($page+1)."\">NEXT→</a><br />\n";
		}elseif($page==($page_all-1)){
			echo "<a href=\"cast.php?page=".($page-1)."\">←BACK</a><br />\n";
		}
	echo "PAGE\n";
	for($i=0;$i<$page_all;$i++){
		$pnum=($i+1);
		echo "｜<a href=\"cast.php?page=".$i."\">&nbsp;".$pnum."&nbsp;</a>";
	}
	echo "<br />\n";
}
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
