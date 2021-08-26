<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>館林 ガールズバー｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版 公式ホームページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版">

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">

<link rel="stylesheet" href="css/reset.css">
<link rel="stylesheet" href="css/base.css">

<script type="text/javascript" src="_shared/js/smoothScroll.js"></script>

<meta name="format-detection" content="telephone=no">
<link rel="apple-touch-icon-precomposed" href="iphone.png">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script src="js/jquery.flexslider.js"></script>
<link rel="stylesheet" href="css/flexslider.css" type="text/css">
<script type="text/javascript" charset="utf-8">
    $(function(){
      SyntaxHighlighter.all();
    });
    $(window).load(function(){
      $('.flexslider').flexslider({
		slideshow: "true",
        animation: "slide",
		slideshowSpeed: 2000,
		animationLoop: "true",
        start: function(slider){
          $('body').removeClass('loading');
        }
      });
    });
  </script>

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
</header>
<div id="wrap">
<section>
<div class="flexslider">
<ul class="slides">
<li>
<img src="img/top_banner1.jpg" width="600" height="400">
</li>
<li>
<img src="img/top_banner2.jpg" width="600" height="400">
</li>
</ul>
</div>
</section>

<section>
 <div align="center">
 <a href="schedule.php?sche=0"><img src="img/schedule.jpg" width="280"></a>
 </div>
</section>

<?php include ('php/menu.php'); ?>

<hr>

</div>
<div id="footContent" class="clearfix">
  <p id="btnTop"><a href="#top">Page Top</a></p>

</div>
<footer>
<?php include ('php/shopdata.php'); ?>
</footer>


</body>
</html>