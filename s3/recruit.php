<?php
//設定ファイル読み込み
require_once '../shift/conf.php';
//ファンクションファイル読み込み
require_once '../shift/parts/function.php';
?><!doctype html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>求人情報｜群馬県館林市のガールズバー「WaiWai合衆国」スマホ版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のスマホ版 求人情報ページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,スマホ版,求人情報">
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
  <p><a href="index.php" title="館林 ガールズバー「WaiWai合衆国」">ホーム</a> >> <strong>求人情報</strong></p>
</header>

<h2 class="heading">求人情報　<span id="hd">Recruit</span></h2>
<div id="wrap">

<section>
  <aside>
  <div id="rec1">体験時給</div>
  <p>
  18歳以上/高校生不可/未経験者大歓迎<br />
  群馬県高崎市鞘町24-3
  </p>
  </aside>
</section>
<section class="button">
  <div align="center">
    <a href="tel:08008004635" class="btn2">フリーダイヤルでお問合せ</a>
  </div>
</section>
<section class="button">
  <div align="center">
    <a href="tel:08046111526" class="btn2">携帯電話でお問合せ</a>
  </div>
</section>
<section class="button">
  <div align="center">
    <a href="mailto:ranmaru@e-nomiya.com" class="btn2">メールでお問合せ</a>
  </div>
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