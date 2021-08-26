#!/usr/local/bin/php
<?php
	//設定ファイル読み込み
	require_once '../shift/conf.php';
	include('../shift/parts/function.php');
	$page=$_GET['page'];
?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="CLUB華火，クラブ華火，キャバクラ，長野県，長野市，長野キャバ，キャバ，求人，キャバ求人,お酒,HANABI,花火">
<meta name="description" content="長野県長野市にあるキャバクラ、クラブ華火のオフィシャルホームページです。新着情報、出勤情報、随時更新しております。是非ご覧下さい。">
<title>CLUB 華火 HANABI 長野　キャストブログ</title>
</head>

<body bgcolor="#000000" background="img/bg.jpg" text="#FFFFFF" link="#B52F47" vlink="#FF0000"><!-- [FC2 Analyzer] http://analyzer.fc2.com/  -->
<script language="javascript" src="http://analyzer54.fc2.com/ana/processor.php?uid=1463954" type="text/javascript"></script>
<noscript><div align="right"><img src="http://analyzer54.fc2.com/ana/icon.php?uid=1463954&ref=&href=&wid=0&hei=0&col=0" /></div></noscript>
<!-- [FC2 Analyzer]  -->

<img src="img/logo.jpg" alt="" width="240" height="120" />
<br />
<br />
<table width="240" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#B52F47">■CAST BLOG</td>
  </tr>
</table>
<br />
<table width="240" border="0" cellspacing="0" cellpadding="0">

<?php
//ファイル名
$filename='../shift/data.csv';

//ロケール設定　←FGETCSVを使うならロケール設定が必要
setlocale(LC_ALL,'ja_JP');

//リードモード[r]で開く 開いたら後できちんと閉じる　fclose関数
$handle = fopen($filename,'r');

//ファイルから読み込んだ各行のデータを配列に格納。とりあえずブログリンク表示の際の名前のデータを取得するのに必要なだけ
$file=file($filename);

//ファイルを閉じる
fclose($handle);

//ファイル内の行数をカウント　file($filename)で配列に格納した行数を取得
$count=count($file);

//RSSフィードからブログの各データを取得　ループの中に入れると関数が再度呼び出されるのでいれちゃだめ
include('../pc/xml.php');

//表示用に使用
$cnt=0;

//$fileに格納されているデータを各行[,]で分割してRSSフィードurlを生成
for($i=0;$i<$count;$i++){
	$data=explode(',',$file[$i]);

	//ブログURL登録の有無を確認して、有ならブログリンク作成に必要なデータ処理する
	if($data[17]==''){
		echo '';
	}else{
		//表示用に使用
		$cnt++;
		
		//登録データから「名前」を取得
		$blog_name=$data[1];
		//登録データから「写真」のパスを作成
		if($data[62]==''){
			$blog_photo="../shift/photo/no_photo_s.jpg";
		}else{
			$blog_photo="../shift/".$data[62]."_s.jpg";
		}
		//登録データからRSSフィードURLを作成
		$blog_url="http://rssblog.ameba.jp/".$data[17]."/rss20.xml";

		
		//RSSフィードからブログの各データを取得
		$xml = file_get_contents($blog_url);
		$rssdata = XML_unserialize($xml);

		$blog_title=$rssdata['rss']['channel']['item'][0]['title'];
		$blog_link=$rssdata['rss']['channel']['item'][0]['link'];
		$blog_pub=$rssdata['rss']['channel']['item'][0]['pubDate'];
		$blog_des=$rssdata['rss']['channel']['item'][0]['description'];
		
		//ブログタイトルの先頭から5文字切り取り　※マルチバイト対応のsubstr()関数
		$blog_title=mb_substr($blog_title,0,5,'utf-8')."…";
		
		//ブログ本文からhtmlタグを除去　※参考→http://jp2.php.net/manual/ja/function.strip-tags.php
		$blog_des=strip_tags($blog_des);
		
		//ブログ本文の先頭30文字を切り取り　※マルチバイト対応のsubstr()関数
		$blog_des=mb_substr($blog_des,0,30,'utf-8')."…";
		
		//ソート用の値を生成
		
			//更新日時を分解
			$blog_date=explode(' ',$blog_pub);

			//英語表記の月を数字に変換
			if($blog_date[2]=='Jan'){$blog_date[2]='01';}
			elseif($blog_date[2]=='Feb'){$blog_date[2]='02';}
			elseif($blog_date[2]=='Mar'){$blog_date[2]='03';}
			elseif($blog_date[2]=='Apr'){$blog_date[2]='04';}
			elseif($blog_date[2]=='May'){$blog_date[2]='05';}
			elseif($blog_date[2]=='Jun'){$blog_date[2]='06';}
			elseif($blog_date[2]=='Jul'){$blog_date[2]='07';}
			elseif($blog_date[2]=='Aug'){$blog_date[2]='08';}
			elseif($blog_date[2]=='Sep'){$blog_date[2]='09';}
			elseif($blog_date[2]=='Oct'){$blog_date[2]='10';}
			elseif($blog_date[2]=='Nov'){$blog_date[2]='11';}
			elseif($blog_date[2]=='Dec'){$blog_date[2]='12';}
		
			//更新時間を：で分割
			$blog_time=explode(':',$blog_date[4]);
			
			//更新用の数値完成
			$blog_sort=$blog_date[3].$blog_date[2].$blog_date[1].$blog_time[0].$blog_time[1].$blog_time[2];
			
			//ブログ1件分の各データを配列に格納
			$line[$i]=array($blog_name,$blog_url,$blog_title,$blog_link,$blog_des,$blog_pub,$blog_sort,$blog_photo);
	}
}

//ブログ全件をひとつのデータに ※$cntと同じ回数
for($j=0;$j<=$cnt;$j++){
	if($j==0){
		$blog_data=array($line[$j]);
	}elseif($j>0){
		array_push($blog_data,$line[$j]);
	}
}

#	//メンテナンス用
#	echo $cnt;
#	echo $count."\n";

#	for($i=0;$i<$cnt;$i++){
#		print_r($line[$i]);
#		echo "<br />\n";
#		echo "<br />\n";
#	}

//ページ総数を算出
$cnt=$count;
$page_all=$cnt/$page_lmt;
$page_all=intval($page_all);
$page_all++;

$page2=$page*$page_lmt;
$page_lmt2=($page+1)*$page_lmt;

echo "<!-- △これより大きくて⇒".$page2."<br />";
echo "△これより小さい⇒".$page_lmt2."<br /> -->";

$p=0;

//ソート順を定義したソート関数を呼び出す
usort($blog_data,"cmp_blog");

//更新日でソートされたブログリンクを表示
while(list($key,$line)=each($blog_data)){
	
	//変数に代入
	$blog_name=$line[0];
	$blog_url=$line[1];
	$blog_title=$line[2];
	$blog_link=$line[3];
	$blog_des=$line[4];
	$blog_pub=$line[5];
	$blog_sort=$line[6];
	$blog_photo=$line[7];
	
	//表示
	if(preg_match("/^PR:/",$blog_title)){
		echo '';
	}else{
		if($p>=$page2 && $p<$page_lmt2){
			$col++;
			
			if($blog_name!=''){
				//TRタグ開始
				if($col==1){
					echo "<tr>\n";
				}
				//TDタグ開始
				echo "<td width=\"120\" align=\"center\" valign=\"top\">";
				//写真
				echo "<img src=\"".$blog_photo."\" alt=\"".$blog_name."\" /><br />\n";
			
				echo "<font size=\"1\"><a href=\"".$blog_link."\">".$blog_name."</a></font>\n";
				echo "</td>\n";
			
				//2列目ならTR終了
				if($col==2){
					echo "</tr>\n";
					echo "<tr>\n";
					echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
					echo "<td align=\"center\" valign=\"top\">&nbsp;</td>\n";
					echo "</tr>\n";
					$col=0;
				}
			$p++;
			}
		}else{
			$p++;
		} //ページリミット
	} //表示
} //while
//列の残りを埋める
if($col>0){
	echo "<td colspan=\"".(2-$col)."\">&nbsp;</td>\n";
	echo "</tr>\n";
}

//ソート関数の定義
function cmp_blog($b,$a){
return strcmp($a[6],$b[6]);}
?>










</table>
<br />
<table width="240" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td>
	
<?php
if($page_all==1){
	echo'';
}elseif($page_all>=2){
		if($page=='0'){
			echo "<a href=\"castblog.php?page=".($page+1)."\">NEXT→</a><br />\n";
		}elseif($page>='1'&&$page<($page_all-1)){
			echo "<a href=\"castblog.php?page=".($page-1)."\">←BACK</a>｜<a href=\"castblog.php?page=".($page+1)."\">NEXT→</a><br />\n";
		}elseif($page==($page_all-1)){
			echo "<a href=\"castblog.php?page=".($page-1)."\">←BACK</a><br />\n";
		}
	echo "PAGE\n";
	for($i=0;$i<$page_all;$i++){
		$pnum=($i+1);
		echo "｜<a href=\"castblog.php?page=".$i."\">&nbsp;".$pnum."&nbsp;</a>";
	}
	echo "<br />\n";
}
?>
	
	</td>
  </tr>
</table>
<br />
<table width="240" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#B52F47">■MENU</td>
  </tr>
</table>
<br />
<font size="1">■<a href="index.html">HOME</a><br />
■<a href="event.php?page=0">本日のイベント</a><br />
■<a href="schedule.php?sche=0">出勤情報</a><br />
■<a href="../sche6/sche6.cgi">月間イベントスケジュール</a><br />
■<a href="cast.php?page=0">キャスト一覧</a><br />
■<a href="floor.html">店舗情報</a><br />
■<a href="http://cabalips.com/moba-l/entry.php?id=118">メールマガジン</a><br />
■<a href="recruit.html">求人情報</a><br />
■<a href="staff.html">スタッフブログ</a><br />
■<a href="k_link.html">グループ店紹介</a><br />
■<a href="link.html">LINK</a></font><br />
<br />
<table width="240" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#B52F47">&nbsp;</td>
  </tr>
</table>
<br />
<font size="-4">長野県長野市鶴賀上千歳町1167 スカイビル1F,2F<br />
<br />
TEL <a href="tel:0262375963">026-237-5963</a></font><br />
<br />
<table width="240" border="1" cellspacing="0" cellpadding="0">
  <tr>
    <td bgcolor="#B52F47"><font size="-7"><br />
      copyright (c) 2010 hanabi. All Rights Reserved.<br />
      <br />
    </font></td>
  </tr>
</table>
</body>
</html>
