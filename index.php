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
<title>館林 ガールズバー｜群馬県館林市のガールズバー「WaiWai合衆国」</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」の公式ホームページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,">

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />     

<!-- Start WOWSlider.com HEAD section -->
<link rel="stylesheet" type="text/css" href="engine1/style.css" />
<script type="text/javascript" src="engine1/jquery.js"></script>
<!-- End WOWSlider.com HEAD section -->

</head>
<body>

<div id="header_bg">
  <h1>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h1>
  <div id="header"><img src="img/logo.png" width="500" height="175" /></div>
</div>
<div id="button"><a href="index.php"><img src="img/b1.jpg" onmouseover="this .src='img/b1_mo.jpg'"onmouseout="this .src='img/b1.jpg'" width="140" height="48" /></a><a href="event.php?id=<?php print $now_year; ?><?php print $now_month; ?>"><img src="img/b2.jpg" onmouseover="this .src='img/b2_mo.jpg'"onmouseout="this .src='img/b2.jpg'" width="125" height="48" /></a><a href="schedule.php?sche=0"><img src="img/b3.jpg" onmouseover="this .src='img/b3_mo.jpg'"onmouseout="this .src='img/b3.jpg'" width="124" height="48" /></a><a href="cast.php"><img src="img/b4.jpg" onmouseover="this .src='img/b4_mo.jpg'"onmouseout="this .src='img/b4.jpg'" width="124" height="48" /></a><a href="menu.php"><img src="img/b5.jpg" onmouseover="this .src='img/b5_mo.jpg'"onmouseout="this .src='img/b5.jpg'" width="122" height="48" /></a><a href="shop.php"><img src="img/b6.jpg" onmouseover="this .src='img/b6_mo.jpg'"onmouseout="this .src='img/b6.jpg'" width="124" height="48" /></a><a href="recruit.php"><img src="img/b7.jpg" onmouseover="this .src='img/b7_mo.jpg'"onmouseout="this .src='img/b7.jpg'" width="123" height="48" /></a><a href="http://www.e-nomiya.com/" target="_blank"><img src="img/b8.jpg" onmouseover="this .src='img/b8_mo.jpg'"onmouseout="this .src='img/b8.jpg'" width="143" height="48" /></a></div>
<div id="top">
	<!-- Start WOWSlider.com BODY section -->
	<div id="wowslider-container1">
	<div class="ws_images"><ul>
<li><img src="data1/images/top1.jpg" alt="館林 ガールズバー「WaiWai合衆国」" id="wows1_0"/></li>
<li><a href="recruit.php"><img src="data1/images/top2.jpg" alt="館林 ガールズバー「WaiWai合衆国」求人" id="wows1_1"/></a></li>
</ul></div>
<div class="ws_bullets"><div>
<a href="#" title="top1"><img src="data1/tooltips/top1.jpg" alt="館林 ガールズバー「WaiWai合衆国」"/>1</a>
<a href="#" title="top2"><img src="data1/tooltips/top2.jpg" alt="館林 ガールズバー「WaiWai合衆国」求人"/>2</a>
</div></div>
<!-- Generated by WOWSlider.com v3.4 -->
	<div class="ws_shadow"></div>
	</div>
	<script type="text/javascript" src="engine1/wowslider.js"></script>
	<script type="text/javascript" src="engine1/script.js"></script>
	<!-- End WOWSlider.com BODY section -->
</div>
<div id="main_bg">
  <div id="blog_bar"><img src="img/top_blog.png" width="1024" height="151" /></div>
  <div id="blog_area"><div id="top_blog"><table width="1024" border="0" cellspacing="0" cellpadding="0">

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

</table></div></div>
  <div id="top_blog_button"><a href="cast.php"><img src="img/top_blog_button.jpg" width="207" height="36" /></a></div>
  <div id="top2"><table width="1024" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="287" height="538" align="left" valign="top" background="img/top_news_bg.jpg"><div id="top_news">
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
?></div></td>
    <td width="279" align="left" valign="top" background="img/top_tw_bg.jpg">&nbsp;</td>
    <td width="458" align="left" valign="top" background="img/top_fb_bg.jpg">
    <div id="top_fb">
    <iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fpages%2F%25E7%25BE%25A4%25E9%25A6%25AC%25E7%259C%258C%25E9%25A4%25A8%25E6%259E%2597%25E5%25B8%2582%25E3%2581%25AE%25E3%2582%25AC%25E3%2583%25BC%25E3%2583%25AB%25E3%2582%25BA%25E3%2583%2590%25E3%2583%25BCwaiwai%25E5%2590%2588%25E8%25A1%2586%25E5%259B%25BD%2F197312117121005&amp;width=410&amp;height=380&amp;colorscheme=light&amp;show_faces=false&amp;header=false&amp;stream=true&amp;show_border=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:410px; height:380px;" allowTransparency="true"></iframe>
    </div>
    </td>
  </tr>
</table>
</div>
  <div id="top_sche_bar"> <img src="img/top_sche.png" width="1024" height="151" /></div><div id="top_sche">
	
	<table width="1001" border="0" cellspacing="0" cellpadding="0" >

<?php
//出勤時間でソートして昇順に並べ替え
$filename = 'shift/data.csv';
//ファイルを開く
$file = fopen($filename,'r');
//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}

//件数をカウント
$count=count($filename);

//ファイルを閉じる
fclose($file);

//ソート順を定義したソート関数を呼び出す
//@usort($datacsv,"cmp_sche");

//列の位置
$col=0;

while(list($key,$line)=@each($datacsv)){
include('shift/parts/basic_hensu.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<1){
		echo "";
	}else{
		if ($yotei1 == '3' || $yotei1 == '4') {
			//列の加算
			$col++;
			
			//先頭ならばTRタグ開始
			if($col==1){echo "<tr>\n";}
			
			//TDタグ開始
			echo "<td width=\"143\" height=\"200\" align=\"center\" valign=\"top\">";
			
			//写真を表示
			if($photo1==''){
				echo "<div class=\"frame\"><a href=\"prof.php?name2=".$name2."\">\n";
				echo "<img src=\"shift/photo/no_photo_p.jpg\" alt=\"".$name."\" /></a></div>";
			}else{
				echo "<div class=\"frame\"><a href=\"prof.php?name2=".$name2."\">\n";
				echo "<img src=\"shift/".$photo1."_p.jpg\" alt=\"".$name."\" /></a></div>";
			}
			echo $name."<br />";
			echo "</td>\n";
			
			//4列目ならTRタグ終了　列位置を0に戻す
			if($col==7){
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//体験キャストの人数
$c = file('shift/taiken/taiken.csv');
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
		echo "<td width=\"143\" height=\"200\" align=\"center\" valign=\"top\">";
		
		//写真
		echo "<div class=\"frame\"><img src=\"shift/taiken/taiken_pc.jpg\" alt=\"体験".$tcol."\" /><div>\n";
		echo "体験入店".$tcol."<br /></td>\n";
			
		//5列目ならTRタグ終了　$colをリセット
		if($col==7){
			echo "</tr>\n";
			$col=0;
		}
		$tcol++;
		
	}
		
//列の残りを埋める
	if($col>0){
		echo "<td colspan=\"".(7-$col)."\">&nbsp;</td>\n";
		echo "</tr>\n";
	}
	
}

//ソート関数の定義
//function cmp_sche($b,$a){
//return strcmp($a[97],$b[97]);}
?>

    </table>
  </div><div id="top_sche_button"><a href="schedule.php?sche=0"><img src="img/top_sche_button.jpg" width="207" height="36" /></a></div>
  <div id="top_banner_area"><a href="cast.php"><img src="img/top_banner1.jpg" onmouseover="this .src='img/top_banner1_mo.jpg'"onmouseout="this .src='img/top_banner1.jpg'" width="344" height="127" /></a><img src="img/top_banner2.jpg" onmouseover="this .src='img/top_banner2_mo.jpg'"onmouseout="this .src='img/top_banner2.jpg'" width="335" height="127" /><a href="mail.php"><img src="img/top_banner3.jpg" onmouseover="this .src='img/top_banner3_mo.jpg'"onmouseout="this .src='img/top_banner3.jpg'" width="345" height="127" /></a><a href="s/"><img src="img/top_banner4.jpg" onmouseover="this .src='img/top_banner4_mo.jpg'"onmouseout="this .src='img/top_banner4.jpg'" width="344" height="130" /></a><a href="m/"><img src="img/top_banner5.jpg" onmouseover="this .src='img/top_banner5_mo.jpg'"onmouseout="this .src='img/top_banner5.jpg'" width="335" height="130" /></a><a href="http://www.e-nomiya.com/" target="_blank"><img src="img/top_banner6.jpg" onmouseover="this .src='img/top_banner6_mo.jpg'"onmouseout="this .src='img/top_banner6.jpg'" width="345" height="130" /></a></div>
  <div id="footer"> <a href="index.php">ホーム</a> ｜ <a href="news.php">ニュース</a> ｜ <a href="event.php?id=<?php print $now_year; ?><?php print $now_month; ?>">月間イベント</a> ｜ <a href="schedule.php?sche=0">出勤情報</a> ｜ <a href="cast.php">在籍スタッフ一覧 </a>｜ <a href="shop.php">店舗情報</a> ｜ <a href="main.php">メルマガ</a> ｜ <a href="recruit.php">求人情報</a> ｜ ブログ ｜ <a href="s/">スマートフォン版</a> ｜ <a href="s/">モバイル版</a> ｜ <a href="http://www.e-nomiya.com/" target="_blank">イイのみや.com</a><br />copyright(c)2013 e-nomiya. All Rights Reserved.
  </div>
</div>
</body>
</html>