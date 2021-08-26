<?php
echo <<<GOLGO
<section>
  <div align="center">
    <button type="button" onclick="location.href='cast.php'" class="css3button" style="width:70px;height:70px"><img src="img/cast.png" width="45" height="41"><br />スタッフ</button>
    <button type="button" onclick="location.href='news.php'" class="css3button" style="width:70px;height:70px"><img src="img/news.png" width="45" height="41"><br />ニュース</button>
    <button type="button" onclick="location.href='event.php?id=$now_year$now_month'" class="css3button" style="width:70px;height:70px"><img src="img/event.png" width="45" height="41"><br />イベント</button>
    <button type="button" onclick="location.href='menu.php'" class="css3button" style="width:70px;height:70px"><img src="img/menu.png" width="45" height="41"><br />メニュー</button>
  </div>
</section>
<section>
  <div align="center">
    <button type="button" onclick="location.href='shop.php'" class="css3button" style="width:70px;height:70px"><img src="img/shop.png" width="45" height="41"><br />店舗情報</button> 
    <button type="button" onclick="location.href='mail.php'" class="css3button" style="width:70px;height:70px"><img src="img/mail.png" width="45" height="41"><br />メルマガ</button>
    <button type="button" onclick="location.href='index.php'" class="css3button" style="width:70px;height:70px"><img src="img/twitter.png" width="45" height="41"><br />つぶやき</button>
    <button type="button" onclick="location.href='https://www.facebook.com/pages/%E7%BE%A4%E9%A6%AC%E7%9C%8C%E9%A4%A8%E6%9E%97%E5%B8%82%E3%81%AE%E3%82%AC%E3%83%BC%E3%83%AB%E3%82%BA%E3%83%90%E3%83%BCwaiwai%E5%90%88%E8%A1%86%E5%9B%BD/197312117121005'" class="css3button" style="width:70px;height:70px"><img src="img/facebook.png" width="45" height="41"><br />ＦＢ</button>
  </div>
</section>
<section>
  <div align="center">
    <button type="button" onclick="location.href='castblog.php'" class="css3button" style="width:70px;height:70px"><img src="img/ameba.png" width="45" height="41"><br />ブログ</button>
    <button type="button" onclick="location.href='recruit.php'" class="css3button" style="width:70px;height:70px"><img src="img/rec.png" width="45" height="41"><br />求人情報</button>
    <button type="button" onclick="location.href='http://www.e-nomiya.com/'" class="css3button" style="width:70px;height:70px"><img src="img/iinomiya.png" width="45" height="41"><br />イイのみや</button>
    <button type="button" onclick="location.href='link.php'" class="css3button" style="width:70px;height:70px"><img src="img/link.png" width="45" height="41"><br />リンク</button>
  </div>
</section>
GOLGO;
?>