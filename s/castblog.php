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
<title>スタッフブログ｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版 スタッフブログページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,スタッフブログ">
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
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <strong>スタッフブログ</strong></p>
</header>

<h2 class="heading">スタッフブログ　<span id="hd">Staff Blog</span></h2>
<div id="wrap">

<div id="castblog">
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
while(list($key,$line)=@each($blog_data)){
	
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
				
				echo "<ul class=\"diary_part\">\n";
				echo "<li class=\"diary_data\">\n";
				echo "<div class=\"diary_data_in\">\n";
				echo "<div class=\"diary_thum\">\n";
				//TDタグ開始
				//写真
				echo "<div class=\"frame\"><a href=\"".$blog_link."\"><img src=\"".$blog_photo."_t.jpg\" alt=\"".$blog_name."\" width=\"73px\" /></a></div></div>\n";
				echo "<div class=\"diary_shop\">\n";
				echo "<div class=\"diary_shop_in\">\n";
				echo "<p class=\"d_name_r\">".$blog_name."</p>\n";
				echo "</div></div>\n";
				echo "<div class=\"right_fukidashi\">\n";
				echo "<p class=\"d_title\">".$blog_title."</p>\n";
				echo "<p class=\"d_naiyou\">".$blog_des."</p>\n";
				echo "</div></div>\n";
				echo "</li></ul>\n";				
			$p++;
			}
		}else{
			$p++;
		} //ページリミット
	} //表示
} //while
//列の残りを埋める

?>
</div>
<!--ページリンクここから-->
<div id="castblog2">

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

</div>
<!--ページリンクここまで-->


<?php include ('php/menu.php'); ?>

</div>
<div id="footContent" class="clearfix">
  <p id="btnTop"><a href="#top">Page Top</a></p>
</div>
<hr>
<?php include ('php/shopdata.php'); ?>

</body>
</html>