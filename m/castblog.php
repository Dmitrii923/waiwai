<?php
	//設定ファイル読み込み
	require_once '../shift/conf.php';
	include('../shift/parts/function.php');
	$page=$_GET['page'];
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>スタッフブログ｜群馬県館林市のガールズバー「WaiWai合衆国」モバイル版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のモバイル版 スタッフブログページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,モバイル版,スタッフブログ">

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
    <font color="#FFFFFF" size="2">■BLOG　<font size="1">スタッフブログ更新情報</font></font>
    </td>
  </tr>
  <tr>
    <td>
<br />
<?php
//登録日でソートして昇順に並べ替え
$filename = '../blog_data.csv';

//ロケール設定
setlocale(LC_ALL,'ja_JP.utf-8');

//ファイルを開く
$file = fopen($filename,'r');

//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$blog_data[]=$arry;
}

//ファイルを閉じる
fclose($file);

//ページ総数を算出
$cnt=count($blog_data);
$page_all=$cnt/$page_lmt;
$page_all=intval($page_all);
$page_all++;

$page2=$page*$page_lmt;
$page_lmt2=($page+1)*$page_lmt;

echo "<!-- △これより大きくて⇒".$page2."<br />";
echo "△これより小さい⇒".$page_lmt2."<br /> -->";

$p=0;

//更新日でソートされたブログリンクを表示
while(list($key,$line)=each($blog_data)){
	
	//変数に代入
	$blog_name=$line[0];
	$blog_url=$line[1];
	$blog_title=$line[2];
	$blog_link=$line[3];
	$blog_des=$line[4];
	$blog_pub=$line[5];
	$blog_sort=$line[6];
	$blog_photo=$line[7];
	
	//表示
	if(preg_match("/^PR:/",$blog_title)){
		echo '';
	}else{
		if($p>=$page2 && $p<$page_lmt2){
			$col++;
			
			if($blog_name!=''){
				//TRタグ開始
				if($col==1){
					echo "<tr>\n";
				}
				//TDタグ開始
				echo "<td width=\"120\" align=\"center\" valign=\"top\">";
				//写真
				echo "<img src=\"".$blog_photo."_s.jpg\" alt=\"".$blog_name."\" /><br />\n";
			
				echo "<font size=\"1\"><a href=\"".$blog_link."\">".$blog_name."</a></font>\n";
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
			}
		}else{
			$p++;
		} //ページリミット
	} //表示
} //while
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(2-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}
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
			echo "<a href=\"castblog.php?page=".($page+1)."\">NEXT→</a><br />\n";
		}elseif($page>='1'&&$page<($page_all-1)){
			echo "<a href=\"castblog.php?page=".($page-1)."\">←BACK</a>｜<a href=\"castblog.php?page=".($page+1)."\">NEXT→</a><br />\n";
		}elseif($page==($page_all-1)){
			echo "<a href=\"castblog.php?page=".($page-1)."\">←BACK</a><br />\n";
		}
	echo "PAGE\n";
	for($i=0;$i<$page_all;$i++){
		$pnum=($i+1);
		echo "｜<a href=\"castblog.php?page=".$i."\">&nbsp;".$pnum."&nbsp;</a>";
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
