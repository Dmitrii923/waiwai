<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	require_once 'parts/function.php';
	
	$id = $_POST['id'];
	$name2 = $_POST['name2'];
	
	//CSVから該当データを取り出して変数に代入
	$data = file('data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	
	if($line[2] == $name2) {
		include('parts/basic_hensu.php');
		include('parts/starttime_conversion2.php');	/* 出勤開始時間を変換 */
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ログイン完了</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<?php
	
	//ログイン確認
	if ($_SESSION['login'] == 'OK') {
		//ログイン成功の場合
		echo '<h1>ログイン中です。</h1>';
	} else {
		//ログイン失敗の場合
		echo '<p><a href="index.php">ログインしてください。</a></p>';
	}

?>
<div id="container">


<?php
$data = file('data.csv');
$cnt = count($data);

echo "<p class=\"align_right\">⇒現在登録人数 " . $cnt . " 件<p>\n";


$data = file('data.csv');
	$cnt = count($data);
	if ($cnt == '0') {
		echo '<p>※まだキャストの登録がありません。</p>';
	}
?>
<div id="leftarea">
<ul id="navi">
 <?php include ('parts/menu5.php'); ?></ul>
 <div id="pick1"><h1>最新ニュース</h1>
<div id="top_news"><div id="top_news2"><?php
$data = file('bbs/bbs.csv');
$cnt = count($data);
//書込み0対策
if ($cnt == '0') {
	echo '<p>※まだ書込みがありません。</p>';
}else{


//登録日でソートして昇順に並べ替え
$filename = 'bbs/bbs.csv';

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
echo $line[1]."<br /><br />\n";
echo "<strong>".$line[2]."</strong><br />\n";

if($line[4]==$empty){
	echo '';
}else{
	echo "<a href=\"bbs/".$line[4]."_bbs".$line[5]."\" target=\"_blank\"><img src=\"bbs/".$line[4]."_bbss".$line[5]."\" /></a><br /><br />\n";
}
echo $line[3]."\n";

//改行タグを改行コードへ
$bbscont = str_replace("<br />" , "\r\n" , $line[3]);

echo "<hr />\n";
//△表示内容ここまで
}

}	//書込み0対策ケツ

//ソート関数の定義(登録日）
function cmp($b,$a){
return strcmp($a[0],$b[0]);
}
?></div>
</div></div></div>
<div id="rightarea">
<div id="hp_view">
  <div id="sche_kanritop">
<?php
$data = file('data.csv');
$cnt = count($data);
if ($cnt != '0') {
echo "<h1>本日の出勤</h1>\n";
echo "<table width=\"660\" border=\"0\" align=\"center\" cellpadding=\"0\" cellspacing=\"0\">\n";

//出勤時間でソートして昇順に並べ替え
$filename = 'data.csv';
//ファイルを開く
$file = fopen($filename,'r');
//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}
//ファイルを閉じる
fclose($file);

$col=0;

while(list($key,$line)=@each($datacsv)){
include('parts/basic_hensu.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<1){
		echo "";
	}else{
		if ($yotei1 == '3') {
			//列の加算
			$col++;
			
			//先頭ならばTRタグ開始
			if($col==1){echo "<tr>\n";}
			
			//TDタグ開始
			echo "<td width=\"220\"  align=\"center\" valign=\"top\">";
			
			//写真を表示
			if($photo1==''){
				echo "<a href=\"prof.php?name2=".$name2."\">\n";
				echo "<img src=\"photo/no_photo_z.jpg\" alt=\"".$name."\" width=\"176\" height=\"264\"/></a><br />";
			}else{
				echo "<a href=\"prof.php?name2=".$name2."\">\n";
				echo "<img src=\"".$photo1."_z.jpg\" alt=\"".$name."\" width=\"176\" height=\"264\" /></a><br />";
			}
			echo $name."<br />";
			echo "</td>\n";
			
			//3列目ならTRタグ終了　列位置を0に戻す
			if($col==3){
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//体験キャストの人数
$c = file('taiken/taiken.csv');
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
		echo "<td width=\"220\" align=\"center\" valign=\"top\">";
		
		//写真
		echo "<img src=\"taiken/taiken_s.jpg\" alt=\"体験".$tcol."\" width=\"176\" height=\"264\" /><br />\n";
		echo "体験入店".$tcol."<br /></td>\n";
			
		//3列目ならTRタグ終了　$colをリセット
		if($col==3){
			echo "</tr>\n";
			$col=0;
		}
		$tcol++;
		
	}
		
//列の残りを埋める
	if($col>0){
		echo "<td colspan=\"".(3-$col)."\">&nbsp;</td>\n";
		echo "</tr>\n";
	}
	
}
echo "</table>\n";
}

?>
<!-- ここまでPHP -->
</div>
      
</div>
</div><div id="under_line"></div></div>
<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>

</body>
</html>
