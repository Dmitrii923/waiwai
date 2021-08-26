<?php
//セッションの復元
session_start();
//ログインチェック
require_once '../login_check.php';
//設定ファイル読み込み
require_once '../conf.php';
//ファンクションファイル読み込み
require_once '../parts/function.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>掲示板</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div id="container">

<h1>ニュース一覧</h1>
<div id="news_disp">

<?php
$data = file('bbs.csv');
$cnt = count($data);
echo "<ul id=\"menu\">\n";
include ('../parts/menu3.php');
echo "</ul>\n";
echo "<div id=\"under_line\"></div>\n";
echo "<p class=\"align_right\">⇒現在書き込み登録数" . $cnt . "件<p>\n";

include ('bbsmenu.php');

	$cnt = count($data);
	if ($cnt == '0') {
		echo '<hr /><p>※まだ登録がありません。</p>';
		echo '</div>';
		include ('../parts/copyright.php');
		echo '</body>';
		echo '</html>';
		exit();
	}

//登録日でソートして昇順に並べ替え
$filename = 'bbs.csv';

//ファイルを開く
$file = fopen($filename,'r');

//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$bbscsv[]=$arry;
}

//ファイルを閉じる
fclose($file);

//ソート順を定義したソート関数を呼び出す
usort($bbscsv,'cmp');

while(list($key,$line)=each($bbscsv)){

//▽表示内容ここから
echo "<div class=\"w90per mgnLeft20\">\n";
echo "<p class=\"align_right\">書込み番号：".$line[0]."</p>\n";
echo "<p class=\"txt_bold\">".$line[1]."</p>\n";
echo "<p class=\"txt_bold\">".$line[2]."</p>\n";
if($line[4]==$empty){
	echo '';
}else{
	echo "<a href=\"".$line[4].$line[5]."\" target=\"_blank\"><img src=\"".$line[4]."_bbss".$line[5]."\" /></a>\n";
}
echo "<p>".$line[3]."</p>\n";

//改行タグを改行コードへ
$input = str_replace("<br />" , "\r\n" , $line[3]);

//編集・削除画面へ
echo "<form action=\"bbsedit.php\" method=\"get\">\n";
echo "<input type=\"hidden\" name=\"id\" value=\"".$line[0]."\" />\n";
echo "<p><input class=\"w_px90\" type=\"submit\" value=\"記事編集・削除\" /></p>\n";
echo "</form>\n";

//写真登録画面へ
echo "<form action=\"reg_photo.php\" method=\"post\">\n";
echo "<input type=\"hidden\" name=\"id\" value=\"".$line[0]."\" />\n";
echo "<input type=\"hidden\" name=\"title\" value=\"".$line[2]."\" />\n";
echo "<input type=\"hidden\" name=\"photo1\" value=\"".$line[4]."\" />\n";
echo "<p><input class=\"w_px90\" type=\"submit\" value=\"写真追加・変更・削除\" /></p>\n";
echo "</form>\n";

echo "</div>\n";
echo "<hr />\n";
//△表示内容ここまで

}

//ソート関数の定義(登録日）
function cmp($b,$a){
return strcmp($a[0],$b[0]);
}

?>
<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>
