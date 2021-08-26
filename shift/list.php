<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$id = $_POST['id'];
	$name2 = $_POST['name2'];
	
	//CSVから該当データを取り出して変数に代入
	$data = file('data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	
	if($line[2] == $name2) {
		include('parts/basic_hensu.php');
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>登録一覧</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="sortable/css/style.css" rel="stylesheet" type="text/css" media="all" />
<script type="text/javascript" src="sortable/js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="sortable/js/jquery-ui-1.8.21.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.ui.touch-punch.js"></script>
<style type="text/css">

#order_list {
	cursor: move
}

.hover {
	background: #808080;
}
</style>
</head>

<body>

<div id="container">

<h1>登録一覧</h1>

<?php
$data = file('data.csv');
$cnt = count($data);

echo "<p class=\"align_right\">⇒現在登録人数 " . $cnt . " 人<p>\n";
echo "<ul id=\"menu\">\n";
include ('parts/menu2.php');
echo "</ul>\n";
echo "<div id=\"under_line\"></div>\n";
$data = file('data.csv');
	$cnt = count($data);
	if ($cnt == '0') {
		echo '<hr /><p>※まだ登録がありません。</p>';
		echo '</div>';
		include ('parts/copyright.php');
		echo '</body>';
		echo '</html>';
		exit();
	}
?>
<p style="font-size:14px; color: #F00;">女の子の順番を変える場合ドラッグで位置を変え、下の『並び順を決定』ボタンをクリックして下さい。</p>
<script type="text/javascript">
jQuery.noConflict();

jQuery(function($) {
	$("#order_list").sortable({ 
		items: "li" ,
		hoverClass: "hover" ,
		stop : function(){
			var data=[];
			$("li","#order_list").each(function(i,v){
				data.push(v.id);
			});
			$('#order').val(data.toString());
		},
		update : function(){
			$('#submit').removeAttr('disabled');
		}
	});
});
</script>

<ul id="order_list">
<?php

//登録日でソートして昇順に並べ替え
$filename = 'data.csv';

//ロケール設定
setlocale(LC_ALL,'ja_JP.utf-8');

//ファイルを開く
$file = fopen($filename,'r');

//関数の定義ファイルを読み込み
include('parts/function.php');

//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}

//ファイルを閉じる
fclose($file);


//ソート順を定義したソート関数を呼び出す
//usort($datacsv,'cmp');

while(list($key,$line)=each($datacsv)){
include('parts/basic_hensu.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//▽表示内容ここから

echo '<li id="' ."$name2".'">';
$line = implode(',' , $line);
$line = $line . "\n";

	if($photo1 == $empty){
	echo "<img src=\"photo/no_photo_p.jpg\" alt=\"".$name."\" />\n";
}else{
	echo "<img src=\"".$photo1."_p.jpg\" alt=\"".$name."\" width=\"104\" height=\"156\" />\n";
}
echo "<br/>\n";
echo "<br/>".$name."(".$age.") <br/>\n";

//写真登録・編集削除画面へ
echo <<<GOLGO
<table width="100%" align="center">
  <tr>
    <th  width="50%">
<form action="reg_photo.php" method="post">
<input type="hidden" name="name" value="$name" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input class="w_px80" type="submit" value="写真追加・変更" /></form></th>
<th>
<form action="$php_edit" method="post">
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="id" value="$id" />
<input class="w_px80" type="submit" value="編集・削除" /></form></th></tr>
</table>
<form action="reg_photo2.php" method="post">
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="name2" value="$name2" />
<input type="hidden" name="sort_button" value="0" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="photo2" value="$photo2" />
<input type="hidden" name="photo3" value="$photo3" />
<input type="hidden" name="photo4" value="$photo4" />
<input type="hidden" name="photo5" value="$photo5" />
<input type="hidden" name="photo6" value="$photo6" />
<input type="hidden" name="photo7" value="$photo7" />
<input type="hidden" name="photo8" value="$photo8" />
<input type="hidden" name="photo9" value="$photo9" />
<input type="hidden" name="photo10" value="$photo10" />
<input class="w_px80" type="submit" value="写真並び替え" /></form>
GOLGO;

//△表示内容ここまで
echo "</li>\n";

}
?>
</ul>

<div id="under_line"></div>
<form action="sort.php" method="post">
<input type="hidden" name="order" id="order" size=10 readonly>
<br />
<input name="submit" type="submit"	disabled="disabled" class="w_px100" id="submit" value="並び順を決定" />

</form>
<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>
</div>
</body>
</html>