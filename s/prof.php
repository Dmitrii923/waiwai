<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//GETデータ受け取り
$name2 = $_GET['name2'];

//データを読み込み
$data = file('../shift/data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	if ($line[2] == $name2) {
		include('../shift/parts/basic_hensu.php');
		include('../shift/parts/schetime.php');
	}
}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title><?php echo $name; ?>プロフィール｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版<?php echo $name; ?>プロフィールページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,プロフィール">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">

<script type="text/javascript" src="_shared/js/smoothScroll.js"></script>

<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="iphone.png">
 <!-- Syntax Highlighter -->
	<link href="css/shCore.css" rel="stylesheet" type="text/css" />
  <link href="css/shThemeDefault.css" rel="stylesheet" type="text/css" />
  <!-- Demo CSS -->
	<link rel="stylesheet" href="css/demo.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="../flexslider.css" type="text/css" media="screen" />

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
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <a href="cast.php" title="館林 ガールズバー「WaiWai合衆国」スタッフ一覧">スタッフ一覧</a> >> <strong><?php echo $name; ?>プロフィール</strong></p>
</header>

<h2 class="heading"><?php echo $name; ?>　age.(<?php echo $age; ?>)　<span id="hd">Prof</span></h2>
<div id="wrap">

<p class="headding2">一言<br /><?php echo $comment; ?></p>

 <div id="butto"><div class="flexslider"><ul class="slides">
<?php
//プロフィールメイン写真
if($photo1==$empty){
	echo "<li><img src=\"../shift/photo/no_photo.jpg\" alt=\"".$name."\"  /></li>\n";
}else{
	echo "<li><img src=\"../shift/".$photo1.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo2==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo2.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo3==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo3.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo4==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo4.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo5==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo5.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo6==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo6.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo7==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo7.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo8==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo8.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo9==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo9.".jpg\" alt=\"".$name."\" /></li>\n";
}
if($photo10==$empty){
	echo "";
}else{
	echo "<li><img src=\"../shift/".$photo10.".jpg\" alt=\"".$name."\" /></li>\n";
}
?>
</ul>
 
<script type="text/javascript" charset="utf-8">  $(window).load(function() {    $('.flexslider').flexslider();  });</script></div>
 <section class="profbox">
<table width="100%">
  <tr>
    <th class="t_top" width="40%">誕生日</th>
    <td class="t_line01" width="60%"><?php echo $profinfo1; ?></td>
    </tr>
  <tr>
    <th class="t_top">血液型</th>
    <td class="t_line01"><?php echo $profinfo2; ?></td>
    </tr>
  <tr>
    <th class="t_top">出身地</th>
    <td class="t_line01"><?php echo $profinfo3; ?></td>
    </tr>
  <tr>
    <th class="t_top">資格・特技</th>
    <td class="t_line01"><?php echo $profinfo4; ?></td>
    </tr>
  <tr>
    <th class="t_top">好きな男性のタイプ</th>
    <td class="t_line01"><?php echo $profinfo5; ?></td>
    </tr>
  <tr>
    <th class="t_top">好きな食べ物</th>
    <td class="t_line01"><?php echo $profinfo7; ?></td>
    </tr>
  <tr>
    <th class="t_top">好きなお酒</th>
    <td class="t_line01"><?php echo $profinfo8; ?></td>
    </tr>
  <tr>
    <th class="t_top">好きなブランド</th>
    <td class="t_line01"><?php echo $profinfo9; ?></td>
    </tr>
  <tr>
    <th class="t_top">チャームポイント</td>
    <td class="t_line01"><?php echo $profinfo10; ?></td>
    </tr>
</table>
</section>
</div>
<?php include ('php/menu.php'); ?>

</div>
<div id="footContent" class="clearfix">
  <p id="btnTop"><a href="#top">Page Top</a></p>
</div>
<hr>
<?php include ('php/shopdata.php'); ?>

<!-- jQuery -->
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
  
  <!-- FlexSlider -->
  <script defer src="../jquery.flexslider.js"></script>
  
  <script type="text/javascript">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
        animation: "slide",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>


  <!-- Syntax Highlighter -->
  <script type="text/javascript" src="js/shCore.js"></script>
  <script type="text/javascript" src="js/shBrushXml.js"></script>
  <script type="text/javascript" src="js/shBrushJScript.js"></script>
  
  <!-- Optional FlexSlider Additions -->
  <script src="js/jquery.easing.js"></script>
  <script src="js/jquery.mousewheel.js"></script>
  <script defer src="js/demo.js"></script>

</body>
</html>