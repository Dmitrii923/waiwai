<?php
//セッションの復元
session_start();
//ログインチェック
require_once '../login_check.php';
//設定ファイル読み込み
require_once '../conf.php';

//フォームからデータ受け取り
$id = $_POST['id'];
$wdate = htmlspecialchars($_POST['wdate'],ENT_QUOTES);
$bbstitle = htmlspecialchars($_POST['bbstitle'],ENT_QUOTES);
$input = htmlspecialchars($_POST['input'],ENT_QUOTES);
$photo1 = htmlspecialchars($_POST['photo1'],ENT_QUOTES);
$jpeg = htmlspecialchars($_POST['jpeg'],ENT_QUOTES);

//データを整形
$wdate = mb_convert_kana($wdate,'KaV','utf-8');
$bbstitle =mb_convert_kana($bbstitle,'KaV','utf-8');
$input = mb_convert_kana($input,'KaV','utf-8');
//[,]を除去
$wdate = str_replace(',' , '' , $wdate);
$bbstitle = str_replace(',' , '' , $bbstitle);
$input = str_replace(',' , '' , $input);
//追加
$input = str_replace('\\' , '' , $input);
//改行コードの前に改行タグを入れる
$input = nl2br($input);
//改行コードを削除
$input = str_replace("\r\n" , "" , $input);

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>書き込み登録確認</title>
<link href="../css/style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">

<h1>登録確認</h1>
<?php
if($bbstitle == $empty || $input == $empty){
	echo "<ul id=\"menu\">\n";
include ('../parts/menu3.php');
echo "</ul>\n";
echo "<div id=\"under_line\"></div>\n";
	echo "<p>※題名・書込み内容のどちらか、もしくは両方が未入力です。</p>\n";
	echo "<form action=\"index.php\" method=\"post\">\n";
	echo "<input type=\"hidden\" name=\"wdate\" value=\"" . $wdate . "\" />\n";
	echo "<input type=\"hidden\" name=\"bbstitle\" value=\"" . $bbstitle . "\" />\n";
	echo "<input type=\"hidden\" name=\"input\" value=\"" . $input . "\" />\n";
	echo "<p><input type=\"submit\" value=\"入力画面へ戻る\" class=\"w_px100\" /></p>\n";
	echo "</form>\n";
	echo "<hr />\n";
}else{
//ファイル名の取り出し
$photo_name1 = $_FILES['photo1']['name'];

//ファイルタイプの取り出し
$photo_type1 = $_FILES['photo1']['type'];

//一時ファイル名の取り出し
$temp_name1 = $_FILES['photo1']['tmp_name'];


//保存先のディレクトリ
$dir = 'photo/';

//拡張子
if($photo_type1=='image/jpeg'||$photo_type1=='image/pjpeg'){
	$jpeg = '.jpg';
}elseif($photo_type1=='image/gif'){
	$jpeg = '.gif';
}
//保存先のファイル名
	$upload_name1 = $dir . $id . '1' . $jpeg;

	//_bbs
	$upload_name1_bbs = $dir . $id . '1_bbs' . $jpeg;
	//_bbss
	$upload_name1_bbss = $dir . $id . '1_bbss' . $jpeg;
	//_bbsm
	$upload_name1_bbsm = $dir . $id . '1_bbsm' . $jpeg;

//データが全部空の時
if ($photo_name1 == $empty && $delete1 == $empty) {
	echo '<p>なにも変更されていません。</p><p>■<a href="index.php">一覧に戻ってやり直してください。</a></p>';
}

/////////////////////////////////////////////
//画像をアップロードする（1枚目）//
/////////////////////////////////////////////
if (($photo_type1 == 'image/jpeg') || ($photo_type1 == 'image/pjpeg') || ($photo_type1 == 'image/gif')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name1 , $upload_name1);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功<br /><a href="' . $upload_name1 . '" target="_blank"><img src="' . $upload_name1_bbss. '" alt="photo1" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name1);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width > '600') {
			echo '<p>[写真1]は横幅600px以下ではありません。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める

			// _bbsの幅と高さ
			$width_bbs = $photo_bbs;
			$height_bbs = round($width_bbs*$height/$width);
			
			// _bbssの幅と高さ
			$width_bbss = $photo_bbss;
			$height_bbss = round($width_bbss*$height/$width);
			
			// _bbsmの幅と高さ
			$width_bbsm = $photo_bbsm;
			$height_bbsm = round($width_bbsm*$height/$width);

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name1);

		//サムネイルの大きさの画像を新規作成
		$image_bbs = imagecreatetruecolor($width_bbs , $height_bbs);
		$image_bbss = imagecreatetruecolor($width_bbss , $height_bbss);
		$image_bbsm = imagecreatetruecolor($width_bbsm , $height_bbsm);

		//アップロードされた画像からサムネイル画像を作成
		$result_bbs = imagecopyresampled($image_bbs , $image , 0,0, 0,0, $width_bbs , $height_bbs , $width , $height);
		$result_bbss = imagecopyresampled($image_bbss , $image , 0,0, 0,0, $width_bbss , $height_bbss , $width , $height);
		$result_bbsm = imagecopyresampled($image_bbsm , $image , 0,0, 0,0, $width_bbsm , $height_bbsm , $width , $height);
		
		echo "<td>\n";
		
		if ($result_bbs) {
			//古い画像を削除
			if(file_exists('./photo/'.$id.'1_bbs.jpg')){
			unlink('./photo/'.$id.'1_bbs.jpg');
			}
			if(file_exists('./photo/'.$id.'1_bbs.gif')){
			unlink('./photo/'.$id.'1_bbs.gif');
			}
			//サムネイル画像の保存 _bbs
			if (imagejpeg($image_bbs , $upload_name1_bbs , $quality)) {
				echo '<p>->サムネイル画像保存(_bbs)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if($result_bbss) {
			//古い画像を削除
			if(file_exists('./photo/'.$id.'1_bbss.jpg')){
			unlink('./photo/'.$id.'1_bbss.jpg');
			}
			if(file_exists('./photo/'.$id.'1_bbss.gif')){
			unlink('./photo/'.$id.'1_bbss.gif');
			}
			//サムネイル画像の保存 _bbss
			if (imagejpeg($image_bbss , $upload_name1_bbss , $quality)) {
				echo '<p>->サムネイル画像保存(_bbss)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if($result_bbsm) {
			//古い画像を削除
			if(file_exists('./photo/'.$id.'1_bbsm.jpg')){
			unlink('./photo/'.$id.'1_bbsm.jpg');
			}
			if(file_exists('./photo/'.$id.'1_bbsm.gif')){
			unlink('./photo/'.$id.'1_bbsm.gif');
			}
			//サムネイル画像の保存 _bbss
			if (imagejpeg($image_bbsm , $upload_name1_bbsm , $quality)) {
				echo '<p>->サムネイル画像保存(_bbsm)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_bbs);
		imagedestroy($image_bbss);
		imagedestroy($image_bbsm);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name1 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式またはGIF形式の画像をアップロードしてください。</p>';
}

//CSVから該当データを取り出して変数に代入
$data = file('bbs.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	
	if($line[0] == $id) {

		//変数に代入
		$id=$line[0];
		$bbsdate=$line[1];
		$title=$line[2];
		$cont=$line[3];
		$photo1=$line[4];
	}
}

//更新されたデータに差し替える
if ($photo_name1 != $empty) {$photo1 = $dir . $id . '1';}

//削除写真のデータを空に
if($delete1=='delete'){$photo1='';}

//書込みデータを結合
$line = array($id,$bbsdate,$title,$cont,$photo1,$jpeg,$blank);
$line = implode(',' , $line);

//改行コード追加
$line = $line . "\n";

//配列入れ替え
$data = file('bbs.csv');
for($i=0;$i<sizeof($data);$i++) {
$lines = explode(',' , $data[$i]);
if ($lines[0] == $id) {
	array_splice($data , $i , 1 , $line);
	}
}

//CSVファイルへ書き込み
$handle = fopen('bbs.csv' , 'w');
flock($handle , LOCK_EX);
foreach($data as $item)fputs($handle , $item);
fclose($handle);

//写真を削除
if($delete1=='delete'){
	if(file_exists('./photo/'.$id.'1.jpg')){
		unlink('./photo/'.$id.'1.jpg');
	}
	if(file_exists('./photo/'.$id.'1.gif')){
		unlink('./photo/'.$id.'1.gif');
	}
	
	if(file_exists('./photo/'.$id.'1_bbs.jpg')){
		unlink('./photo/'.$id.'1_bbs.jpg');
	}
	if(file_exists('./photo/'.$id.'1_bbs.gif')){
		unlink('./photo/'.$id.'1_bbs.gif');
	}
	
	if(file_exists('./photo/'.$id.'1_bbss.jpg')){
			unlink('./photo/'.$id.'1_bbss.jpg');
	}
	if(file_exists('./photo/'.$id.'1_bbss.gif')){
		unlink('./photo/'.$id.'1_bbss.gif');
	}
	
	if(file_exists('./photo/'.$id.'1_bbsm.jpg')){
			unlink('./photo/'.$id.'1_bbsm.jpg');
	}
	if(file_exists('./photo/'.$id.'1_bbsm.gif')){
		unlink('./photo/'.$id.'1_bbsm.gif');
	}

	echo "<p>".$name."写真削除しました。</p>\n";
}
echo <<<GOLGO
<table width="100%">
<tr>
<th>日付</th>
<td>$wdate</td>
</tr>
<tr>
<th>タイトル</th>
<td>$bbstitle</td>
</tr>
<tr>
<th>書き込み内容</th>
<td>$input</td>
</tr>
</table>
<form action="write.php" method="post">
<p>上記内容でよければ「書込み」ボタンを押してください。</p>
<input type="hidden" name="id" value="$id" />
<input type="hidden" name="wdate" value="$wdate" />
<input type="hidden" name="bbstitle" value="$bbstitle" />
<input type="hidden" name="input" value="$input" />
<input type="hidden" name="photo1" value="$photo1" />
<input type="hidden" name="jpeg" value="$jpeg" />
<p><input type="submit" value="書込み" class="w_px100" /></p>
</form>
GOLGO;
}
?>

<div id="footer">
<div id="menu"><p><?php include ('../parts/menu4.php'); ?></p>
</div>
<?php include ('../parts/copyright.php'); ?>
</div></div>
</body>
</html>
