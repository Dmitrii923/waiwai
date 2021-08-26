<?php
//設定ファイル読み込み
require_once 'shift/conf.php';
//ファンクションファイル読み込み
require_once 'shift/parts/function.php';
$sche = $_GET['sche'];

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />     

</head>

<body>

<div id="header_bg2">
  <h1>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h1>
  <div id="header"><img src="img/logo2.png" width="1024" height="98" /></div>
</div>
<div id="button"><?php include ('php/menu.php'); ?></div>
<div id="main_bg2">
  <div id="blackarea"></div>
  <div id="pagenavi"><h2>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h2>
  <p></p>
  <p>｜<a href="index.php" title="群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」">トップページ</a> ＞＞ <strong>出勤情報</strong></p></div>
  <div id="hoka_main">
    <div id="left"><?php include ('php/left.php'); ?></div>
    <div id="right"><img src="img/schepage.jpg" width="790" height="129" /><div align="center" style="margin-top:30px;">
<form action="schedule.php" method="get" class="mgn10">
<select name="sche">
<option value="0" <?php if($sche=='0'){echo 'selected="selected"';} ?>><?php echo $day1."(".$week1.")"; ?></option>
<option value="1" <?php if($sche=='1'){echo 'selected="selected"';} ?>><?php echo $day2."(".$week2.")"; ?></option>
<option value="2" <?php if($sche=='2'){echo 'selected="selected"';} ?>><?php echo $day3."(".$week3.")"; ?></option>
</select>
<input type="submit" value="出勤情報を見る" />
</form>



 <table width="750" border="0" cellspacing="0" cellpadding="0">
<?php
//出勤時間でソートして昇順に並べ替え
$filename = 'shift/data.csv';
//ファイルを開く
$file = fopen($filename,'r');
//データを二次元配列に格納
while($arry=fgetcsv_reg($file)){
	$datacsv[]=$arry;
}
//ファイルを閉じる
fclose($file);

//出勤の日付
if($sche=='0'){echo "<p class=\"schedule_date\">".$day1."(".$week1.")の出勤情報</p>\n";}
if($sche=='1'){echo "<p class=\"schedule_date\">".$day2."(".$week2.")の出勤情報</p>\n";}
if($sche=='2'){echo "<p class=\"schedule_date\">".$day3."(".$week3.")の出勤情報</p>\n";}
if($sche=='3'){echo "<p class=\"schedule_date\">".$day4."(".$week4.")の出勤情報</p>\n";}
if($sche=='4'){echo "<p class=\"schedule_date\">".$day5."(".$week5.")の出勤情報</p>\n";}
if($sche=='5'){echo "<p class=\"schedule_date\">".$day6."(".$week6.")の出勤情報</p>\n";}
if($sche=='6'){echo "<p class=\"schedule_date\">".$day7."(".$week7.")の出勤情報</p>\n";}
echo "<p class=\"clear\"></p>\n";

if($sche=='0'){
//ソート順を定義したソート関数を呼び出す
if($week1 == '月'){$cmp1 = 'cmp_mon';}
elseif($week1 == '火'){$cmp1 = 'cmp_tue';}
elseif($week1 == '水'){$cmp1 = 'cmp_wed';}
elseif($week1 == '木'){$cmp1 = 'cmp_thu';}
elseif($week1 == '金'){$cmp1 = 'cmp_fri';}
elseif($week1 == '土'){$cmp1 = 'cmp_sat';}
elseif($week1 == '日'){$cmp1 = 'cmp_sun';}
//ソートする
//@usort($datacsv,"cmp");

//列の位置
$col=0;

while(list($key,$line)=@each($datacsv)){
include('shift/parts/basic_hensu.php');
include('shift/parts/schetime.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<1){
		echo "";
	}else{
		if ($yotei1 == '3' || $yotei1 == '4') {
		$col++;
			if($col==1){
				echo "<tr>\n";
			}
			
			//TDタグ開始
			echo "<td width=\"150\" height=\"200\" align=\"center\" valign=\"top\">\n";
			
			//写真
			if($photo1==$empty){
				echo "<div class=\"frame\"><a href=\"prof.php?name2=".$name2."\"><img src=\"shift/photo/no_photo_p.jpg\" alt=\"".$name."\" /></a></div>\n";
			}else{
				echo "<div class=\"frame\"><a href=\"prof.php?name2=".$name2."\"><img src=\"shift/".$photo1."_p.jpg\" alt=\"".$name."\" /></a></div>\n";
			}
			echo $name."<br /></td>\n";
			
			//5列目ならTRタグ終了　$colをリセット
			if($col==5){
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
			echo "<td width=\"20%\" height=\"200\" align=\"center\" valign=\"top\">\n";
		
			//写真
			echo "<div class=\"frame\"><img src=\"shift/taiken/taiken_pc.jpg\" alt=\"体験".$tcol."\" /></div>\n";
			echo "体験入店".$tcol."<br /></td>\n";
			
			//5列目ならTRタグ終了　$colをリセット
			if($col==5){
				echo "</tr>\n";
				$col=0;
			}
			$tcol++;
			
		}
		
		//列の残りを埋める
		if($tcol>0){
			echo "<td colspan=\"".(5-$tcol)."\">&nbsp;</td>\n";
			echo "</tr>\n";
		}
		
	}
} //sche終わり


if($sche=='1'){
//ソート順を定義したソート関数を呼び出す
if($week2 == '月'){$cmp1 = 'cmp_mon';}
elseif($week2 == '火'){$cmp1 = 'cmp_tue';}
elseif($week2 == '水'){$cmp1 = 'cmp_wed';}
elseif($week2 == '木'){$cmp1 = 'cmp_thu';}
elseif($week2 == '金'){$cmp1 = 'cmp_fri';}
elseif($week2 == '土'){$cmp1 = 'cmp_sat';}
elseif($week2 == '日'){$cmp1 = 'cmp_sun';}
//ソートする
//usort($datacsv,"cmp");

while(list($key,$line)=each($datacsv)){
include('shift/parts/basic_hensu.php');
include('shift/parts/schetime.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<2){
		echo "";
	}else{
		if ($yotei2 == '3' || $yotei2 == '4') {
					$col++;
			if($col==1){
				echo "<tr>\n";
			}
			
			//TDタグ開始
			echo "<td width=\"150\" height=\"200\" align=\"center\" valign=\"top\">\n";
			
			//写真
			if($photo1==$empty){
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"shift/photo/no_photo_p.jpg\" alt=\"".$name."\" /></a><br />\n";
			}else{
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"shift/".$photo1."_p.jpg\" alt=\"".$name."\" /></a><br />\n";
			}
			echo $name."<br /></td>\n";
			
			//5列目ならTRタグ終了　$colをリセット
			if($col==5){
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(5-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}
} //sche終わり


if($sche=='2'){
//ソート順を定義したソート関数を呼び出す
if($week3 == '月'){$cmp1 = 'cmp_mon';}
elseif($week3 == '火'){$cmp1 = 'cmp_tue';}
elseif($week3 == '水'){$cmp1 = 'cmp_wed';}
elseif($week3 == '木'){$cmp1 = 'cmp_thu';}
elseif($week3 == '金'){$cmp1 = 'cmp_fri';}
elseif($week3 == '土'){$cmp1 = 'cmp_sat';}
elseif($week3 == '日'){$cmp1 = 'cmp_sun';}
//ソートする
//usort($datacsv,"cmp");

while(list($key,$line)=each($datacsv)){
include('shift/parts/basic_hensu.php');
include('shift/parts/schetime.php');

//出勤データの有効・無効
$getdays=getDays($tdy_8dig,$yobi7);

//本日の出勤
	//▽表示内容ここから
	if($getdays<3){
		echo "";
	}else{
		if ($yotei3 == '3' || $yotei3 == '4') {
					$col++;
			if($col==1){
				echo "<tr>\n";
			}
			
			//TDタグ開始
			echo "<td width=\"150\" height=\"200\" align=\"center\" valign=\"top\">\n";
			
			//写真
			if($photo1==$empty){
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"shift/photo/no_photo_p.jpg\" alt=\"".$name."\" /></a><br />\n";
			}else{
				echo "<a href=\"prof.php?name2=".$name2."\"><img src=\"shift/".$photo1."_p.jpg\" alt=\"".$name."\" /></a><br />\n";
			}
			echo $name."<br /></td>\n";
			
			//5列目ならTRタグ終了　$colをリセット
			if($col==5){
				echo "</tr>\n";
				$col=0;
			}
		}
	}
	//△表示内容ここまで

}
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(5-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}
} //sche終わり




//ソート関数の定義
//function cmp($b,$a){
//return strcmp($a[97],$b[97]);}
?>

</table></div></div>
    <div id="clear"></div>
  </div>
  <div id="footer"><?php include ('php/sitemap.php'); ?>
</div>
</div>
</body>
</html>