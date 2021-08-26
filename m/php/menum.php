<?php
echo <<<GOLGO
<font size="1">
■<a href="index.php" title="館林 ガールズバー「WaiWai合衆国」｜ホーム">ホーム</a><br />
■<a href="schedule.php?sche=0" title="館林 ガールズバー「WaiWai合衆国」｜出勤情報">出勤情報</a><br />
■<a href="cast.php?page=0" title="館林 ガールズバー「WaiWai合衆国」｜キャスト一覧">スタッフ一覧</a><br />
■<a href="news.php?page=0" title="館林 ガールズバー「WaiWai合衆国」｜最新ニュース">最新ニュース</a><br />
■<a href="event.php?id=$now_year$now_month" title="館林 ガールズバー「WaiWai合衆国」｜月間イベント">月間イベント</a><br />
■<a href="menu.php" title="館林 ガールズバー「WaiWai合衆国」｜メニュー">メニュー</a><br />
■<a href="shop.php" title="館林 ガールズバー「WaiWai合衆国」｜店舗情報">店舗情報</a><br />
■<a href="mail.php" title="館林 ガールズバー「WaiWai合衆国」｜メールマガジン">メールマガジン</a><br />
■<a href="index.php" title="館林 ガールズバー「WaiWai合衆国」｜ツイッター">ツイッター</a><br />
■<a href="https://www.facebook.com/pages/%E7%BE%A4%E9%A6%AC%E7%9C%8C%E9%A4%A8%E6%9E%97%E5%B8%82%E3%81%AE%E3%82%AC%E3%83%BC%E3%83%AB%E3%82%BA%E3%83%90%E3%83%BCwaiwai%E5%90%88%E8%A1%86%E5%9B%BD/197312117121005" title="館林 ガールズバー「WaiWai合衆国」｜フェイスブック">フェイスブック</a><br />
■<a href="castblog.php" title="館林 ガールズバー「WaiWai合衆国」｜ブログ">ブログ</a><br />
■<a href="recruit.php" title="館林 ガールズバー「WaiWai合衆国」｜求人情報">求人情報</a><br />
■<a href="http://www.e-nomiya.com/" title="イイ飲み屋.com">イイ飲み屋.com</a><br />
■<a href="link.php" title="館林 ガールズバー「WaiWai合衆国」｜リンク">リンク</a><br />
</font>
GOLGO;
#echo "<form action=\"../../sche6/sche6.cgi\" method=\"POST\">\n";
#echo "<input type=\"hidden\" name=\"mode\" value=\"admin\">\n";
#echo "<input type=\"hidden\" name=\"pass\" value=\"".$_SESSION['pass']."\">\n";
#echo "<input style=\"background:url(img/fff5x5.gif); color:#0099FF;\" type=\"submit\" value=\"■月間スケジュール管理\"></form>\n";
echo "</div>\n";
?>