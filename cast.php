<?php
//設定ファイル読み込み
require_once 'shift/conf.php';
//ファンクションファイル読み込み
require_once 'shift/parts/function.php';


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
  <p>｜<a href="index.php" title="群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」">トップページ</a> ＞＞ <strong>在籍スタッフ一覧</strong></p></div>
  <div id="hoka_main">
    <div id="widepage"><img src="img/castpage1.jpg" width="1024" height="128" /><div id="blog_area"><div id="top_blog"><table width="1024" border="0" cellspacing="0" cellpadding="0">

<?php
//登録日でソートして昇順に並べ替え
$filename = 'blog_data.csv';

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

//表示件数（上位～位）
$num=5;

//繰り返し変数
$k=0;

//更新日でソートされたブログリンクを表示
while(list($key,$line)=@each($blog_data)){
	if($k==$num){
		break;
	}	
	
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
		if($k==0){
			echo "<tr>\n";
		}
		if($blog_name==''){
			echo '';
		}else{
			echo "<td width=\"188\" align=\"center\" valign=\"top\">";
			echo "<div class=\"frame\"><a href=\"".$blog_link."\" target=\"_blank\"><img src=\"".$blog_photo."_p.jpg\" alt=\"".$blog_name."\" /></a></div>\n";
			echo "<div style=\"margin:0 auto; width:104px; text-align:center;\">";
			echo $blog_name."<br />\n";
			echo "<a href=\"".$blog_link."\" target=\"_blank\">".$blog_title."</a></div>\n";
			print "<div style=\"margin:0 auto; width:122px; text-align:left;\">".$blog_des."</div></td>\n";
				if($k==4){
					echo "</tr>\n\n";
				}
		}
	}
$k++;
}

?>

</table></div></div><img src="img/castpage2.jpg" width="1024" height="174" /><table width="1010" border="0" cellspacing="0" cellpadding="0" align="center">
    
<?php
$data = file('shift/data.csv');
$cnt = count($data);
//書込み0対策
if ($cnt == '0') {
	echo '';
}else{
//ソートして昇順に並べ替え
$filename = 'shift/data.csv';
//ファイルを開く
$file = fopen($filename,'r');
//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}
//ファイルを閉じる
fclose($file);

//ソートする
//usort($datacsv,'cmp1');

while(list($key,$line)=each($datacsv)){
include('shift/parts/basic_hensu.php');
include('shift/parts/schetime.php');

	//▽表示内容ここから
	$col++;
	if($col==1){
		echo "<tr>\n";
	}
			
	//TDタグ開始
	echo "<td align=\"center\" valign=\"top\">\n";
	
	//写真
	if($photo1==$empty){
		echo "<div class=\"frame\"><a href=\"prof.php?name2=".$name2."\"><img src=\"shift/photo/no_photo_z.jpg\" alt=\"".$name."\" /></a></div>\n";
	}else{
		echo "<div class=\"frame\"><a href=\"prof.php?name2=".$name2."\"><img src=\"shift/".$photo1."_z.jpg\" alt=\"".$name."\" /></a></div>\n";
	}
	echo "<table width=\"188\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\">\n";
	echo "<tr>\n";
	echo "<td width=\"188\">".$name."</td>\n";
	echo "<tr>\n";
	echo "<td width=\"188\" height=\"40\">";
	if($profinfo6==''){
		echo '';
	}else{
		echo "<a href=\"http://ameblo.jp/".$profinfo6."\" target=\"_blank\"><img src=\"img/list_blog.jpg\"/></a></td>\n";
	}
	echo "</tr></table>\n";
			
	//4列目ならTRタグ終了　$colをリセット
	if($col==4){
		echo "</tr>\n";
		echo "<tr>\n";
		echo "<td height=\"48\" colspan=\"4\">&nbsp;</td>\n";
		echo "</tr>\n";
		$col=0;
	}
	//△表示内容ここまで
}

//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(5-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}
}
//ソート関数の定義
//function cmp1($b,$a){
//return strcmp($a[97],$b[97]);}

?>
    </table>
    </td>
  </tr>
</table></div>
    
  </div>
  <div id="footer"><?php include ('php/sitemap.php'); ?>
</div>
</div>
</body>
</html>