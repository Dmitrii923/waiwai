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
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $name; ?>｜群馬県館林市のガールズバー「WaiWai合衆国」モバイル版</title>
<meta name="description" content="群馬県館林市のガールズバー「WaiWai合衆国」のモバイル版<?php echo $name; ?>プロフィールページです。群馬県館林市で遊ぶ・飲む・働くならガールズバー「WaiWai合衆国」で決まり!!">
<meta name="keywords" content="群馬県,館林市,ガールズバー,WaiWai合衆国,モバイル版,<?php echo $name; ?>">
<style type="text/css">
.name {	font-size: large;
}
</style>

</head>

<body bgcolor="#010080" text="#ffffff" link="#e70014" vlink="#990000">
<table width="240" border="1" bordercolor="#010080" cellspacing="0" cellpadding="0">
  <tr>
    <td colspan="2">
    <img src="img/logo.jpg" width="240" height="56" alt="館林 ガールズバー「WaiWai合衆国」" /><br />
    </td>
  <tr>
  <tr>
    <td bgcolor="#010080" colspan="2">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="2">
<?php
//プロフィールメイン写真
if($photo1==$empty){
	echo "<img src=\"../shift/photo/no_photo_m.jpg\" alt=\"".$name."\" />\n";
}else{
	echo "<img src=\"../shift/".$photo1."_m.jpg\" alt=\"".$name."\" />\n";
}
?><br />
<br />
PHOTO　<br />
<?php
if($photo1!=''){
	echo "<a href=\"../shift/".$photo1."_m.jpg\">1</a>\n";
}
if($photo2!=''){
	echo "｜<a href=\"../shift/".$photo2."_m.jpg\">2</a>\n";
}
if($photo3!=''){
	echo "｜<a href=\"../shift/".$photo3."_m.jpg\">3</a>\n";
}
if($photo4!=''){
	echo "｜<a href=\"../shift/".$photo4."_m.jpg\">4</a>\n";
}
if($photo5!=''){
	echo "｜<a href=\"../shift/".$photo5."_m.jpg\">5</a>\n";
}
if($photo6!=''){
	echo "｜<a href=\"../shift/".$photo6."_m.jpg\">6</a>\n";
}
if($photo7!=''){
	echo "｜<a href=\"../shift/".$photo7."_m.jpg\">7</a>\n";
}
if($photo8!=''){
	echo "｜<a href=\"../shift/".$photo8."_m.jpg\">8</a>\n";
}
if($photo9!=''){
	echo "｜<a href=\"../shift/".$photo9."_m.jpg\">9</a>\n";
}
if($photo10!=''){
	echo "｜<a href=\"../shift/".$photo10."_m.jpg\">10</a>\n";
}
?>
<br />
<br />
    </td>
  </tr>
  <tr>
    <td colspan="2" align="center">
    <br />
	<?php echo $name; ?><span class="name">(<?php echo $age; ?>)</span><br />
    <br />
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td width="110">
    <font size="1">
    <br />
    誕生日<br />
    <br />
    </font>
    </td>
    <td width="124">
    <font size="1">
	<?php echo $profinfo1; ?>
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    血液型<br />
    <br />    
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo2; ?>
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    出身地<br />      
    <br />    
    </font>
    </td>
    <td>
    <font size="1">
    <br />
	<?php echo $profinfo3; ?><br />
    <br />
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    資格、特技<br />
    <br />    
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo4; ?>
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    好きな男性のタイプ<br />
    <br />
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo5; ?>
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    好きな食べ物<br />
    <br />
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo7; ?>
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    好きなお酒<br />
    <br />
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo8; ?>
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    好きなブランド<br />
    <br />
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo9; ?><br />
    </font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    チャームポイント<br />
    <br />    
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $profinfo10; ?></font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    <br />
    一言<br />
    <br />    
    </font>
    </td>
    <td>
    <font size="1">
	<?php echo $comment; ?></font>
    </td>
  </tr>
  <tr bgcolor="#D77F80">
    <td>
    <font size="1">
    ブログ
    </font>
    </td>
    <td>
    <br />
<?php if($profinfo6==''){
			echo '準備中';
		}else{
			echo "<font size=\"1\"><a href=\"http://ameblo.jp/".$profinfo6."\">BLOG</a></font>\n";
		}; ?><br /><br />
    </td>
  </tr>
  <tr>
    <td colspan="2">
    <font size="1">
    <br />
    <a href="cast.php?page=0">CAST一覧に戻る</a><br />
    <br />
    </font>
    </td>
  </tr>
  <tr>
    <td bgcolor="#df0000" align="center" colspan="2">
    <font color="#ffffff" size="1">
    <br />
    copyright (c) 2013 e-nomiya. <br />
    All Rights Reserved.</font><br />
    <br />
    </td>
  </tr>
</table>

</body>
</html>
