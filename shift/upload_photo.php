<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$name2 = $_POST['name2'];

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>写真登録・変更</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<?php
//写真削除チェック
$delete1=$_POST['delete1'];
$delete2=$_POST['delete2'];
$delete3=$_POST['delete3'];
$delete4=$_POST['delete4'];
$delete5=$_POST['delete5'];
$delete6=$_POST['delete6'];
$delete7=$_POST['delete7'];
$delete8=$_POST['delete8'];
$delete9=$_POST['delete9'];
$delete10=$_POST['delete10'];
?>

<div id="container">

<h1>写真のアップロード</h1>

<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>

<?php
//ファイル名の取り出し
$photo_name1 = $_FILES['photo1']['name'];
$photo_name2 = $_FILES['photo2']['name'];
$photo_name3 = $_FILES['photo3']['name'];
$photo_name4 = $_FILES['photo4']['name'];
$photo_name5 = $_FILES['photo5']['name'];
$photo_name6 = $_FILES['photo6']['name'];
$photo_name7 = $_FILES['photo7']['name'];
$photo_name8 = $_FILES['photo8']['name'];
$photo_name9 = $_FILES['photo9']['name'];
$photo_name10 = $_FILES['photo10']['name'];
//ファイルタイプの取り出し
$photo_type1 = $_FILES['photo1']['type'];
$photo_type2 = $_FILES['photo2']['type'];
$photo_type3 = $_FILES['photo3']['type'];
$photo_type4 = $_FILES['photo4']['type'];
$photo_type5 = $_FILES['photo5']['type'];
$photo_type6 = $_FILES['photo6']['type'];
$photo_type7 = $_FILES['photo7']['type'];
$photo_type8 = $_FILES['photo8']['type'];
$photo_type9 = $_FILES['photo9']['type'];
$photo_type10 = $_FILES['photo10']['type'];
//一時ファイル名の取り出し
$temp_name1 = $_FILES['photo1']['tmp_name'];
$temp_name2 = $_FILES['photo2']['tmp_name'];
$temp_name3 = $_FILES['photo3']['tmp_name'];
$temp_name4 = $_FILES['photo4']['tmp_name'];
$temp_name5 = $_FILES['photo5']['tmp_name'];
$temp_name6 = $_FILES['photo6']['tmp_name'];
$temp_name7 = $_FILES['photo7']['tmp_name'];
$temp_name8 = $_FILES['photo8']['tmp_name'];
$temp_name9 = $_FILES['photo9']['tmp_name'];
$temp_name10 = $_FILES['photo10']['tmp_name'];

//保存先のディレクトリ
$dir = 'photo/';
//拡張子
$jpeg = '.jpg';
//保存先のファイル名
	$upload_name1 = $dir . $name2 . '_1' . $jpeg;
	$upload_name2 = $dir . $name2 . '_2' . $jpeg;
	$upload_name3 = $dir . $name2 . '_3' . $jpeg;
	$upload_name4 = $dir . $name2 . '_4' . $jpeg;
	$upload_name5 = $dir . $name2 . '_5' . $jpeg;
	$upload_name6 = $dir . $name2 . '_6' . $jpeg;
	$upload_name7 = $dir . $name2 . '_7' . $jpeg;
	$upload_name8 = $dir . $name2 . '_8' . $jpeg;
	$upload_name9 = $dir . $name2 . '_9' . $jpeg;
	$upload_name10 = $dir . $name2 . '_10' . $jpeg;
	// m
	$upload_name1_m = $dir . $name2 . '_1_m' . $jpeg;
	$upload_name2_m = $dir . $name2 . '_2_m' . $jpeg;
	$upload_name3_m = $dir . $name2 . '_3_m' . $jpeg;
	$upload_name4_m = $dir . $name2 . '_4_m' . $jpeg;
	$upload_name5_m = $dir . $name2 . '_5_m' . $jpeg;
	$upload_name6_m = $dir . $name2 . '_6_m' . $jpeg;
	$upload_name7_m = $dir . $name2 . '_7_m' . $jpeg;
	$upload_name8_m = $dir . $name2 . '_8_m' . $jpeg;
	$upload_name9_m = $dir . $name2 . '_9_m' . $jpeg;
	$upload_name10_m = $dir . $name2 . '_10_m' . $jpeg;
	// l
	$upload_name1_l = $dir . $name2 . '_1_l' . $jpeg;
	$upload_name2_l = $dir . $name2 . '_2_l' . $jpeg;
	$upload_name3_l = $dir . $name2 . '_3_l' . $jpeg;
	$upload_name4_l = $dir . $name2 . '_4_l' . $jpeg;
	$upload_name5_l = $dir . $name2 . '_5_l' . $jpeg;
	$upload_name6_l = $dir . $name2 . '_6_l' . $jpeg;
	$upload_name7_l = $dir . $name2 . '_7_l' . $jpeg;
	$upload_name8_l = $dir . $name2 . '_8_l' . $jpeg;
	$upload_name9_l = $dir . $name2 . '_9_l' . $jpeg;
	$upload_name10_l = $dir . $name2 . '_10_l' . $jpeg;
	// t
	$upload_name1_t = $dir . $name2 . '_1_t' . $jpeg;
	$upload_name2_t = $dir . $name2 . '_2_t' . $jpeg;
	$upload_name3_t = $dir . $name2 . '_3_t' . $jpeg;
	$upload_name4_t = $dir . $name2 . '_4_t' . $jpeg;
	$upload_name5_t = $dir . $name2 . '_5_t' . $jpeg;
	$upload_name6_t = $dir . $name2 . '_6_t' . $jpeg;
	$upload_name7_t = $dir . $name2 . '_7_t' . $jpeg;
	$upload_name8_t = $dir . $name2 . '_8_t' . $jpeg;
	$upload_name9_t = $dir . $name2 . '_9_t' . $jpeg;
	$upload_name10_t = $dir . $name2 . '_10_t' . $jpeg;
	// s
	$upload_name1_s = $dir . $name2 . '_1_s' . $jpeg;
	$upload_name2_s = $dir . $name2 . '_2_s' . $jpeg;
	$upload_name3_s = $dir . $name2 . '_3_s' . $jpeg;
	$upload_name4_s = $dir . $name2 . '_4_s' . $jpeg;
	$upload_name5_s = $dir . $name2 . '_5_s' . $jpeg;
	$upload_name6_s = $dir . $name2 . '_6_s' . $jpeg;
	$upload_name7_s = $dir . $name2 . '_7_s' . $jpeg;
	$upload_name8_s = $dir . $name2 . '_8_s' . $jpeg;
	$upload_name9_s = $dir . $name2 . '_9_s' . $jpeg;
	$upload_name10_s = $dir . $name2 . '_10_s' . $jpeg;
	// p
	$upload_name1_p = $dir . $name2 . '_1_p' . $jpeg;
	$upload_name2_p = $dir . $name2 . '_2_p' . $jpeg;
	$upload_name3_p = $dir . $name2 . '_3_p' . $jpeg;
	$upload_name4_p = $dir . $name2 . '_4_p' . $jpeg;
	$upload_name5_p = $dir . $name2 . '_5_p' . $jpeg;
	$upload_name6_p = $dir . $name2 . '_6_p' . $jpeg;
	$upload_name7_p = $dir . $name2 . '_7_p' . $jpeg;
	$upload_name8_p = $dir . $name2 . '_8_p' . $jpeg;
	$upload_name9_p = $dir . $name2 . '_9_p' . $jpeg;
	$upload_name10_p = $dir . $name2 . '_10_p' . $jpeg;
	// b
	$upload_name1_b = $dir . $name2 . '_1_b' . $jpeg;
	$upload_name2_b = $dir . $name2 . '_2_b' . $jpeg;
	$upload_name3_b = $dir . $name2 . '_3_b' . $jpeg;
	$upload_name4_b = $dir . $name2 . '_4_b' . $jpeg;
	$upload_name5_b = $dir . $name2 . '_5_b' . $jpeg;
	$upload_name6_b = $dir . $name2 . '_6_b' . $jpeg;
	$upload_name7_b = $dir . $name2 . '_7_b' . $jpeg;
	$upload_name8_b = $dir . $name2 . '_8_b' . $jpeg;
	$upload_name9_b = $dir . $name2 . '_9_b' . $jpeg;
	$upload_name10_b = $dir . $name2 . '_10_b' . $jpeg;
	// g
	$upload_name1_g = $dir . $name2 . '_1_g' . $jpeg;
	$upload_name2_g = $dir . $name2 . '_2_g' . $jpeg;
	$upload_name3_g = $dir . $name2 . '_3_g' . $jpeg;
	$upload_name4_g = $dir . $name2 . '_4_g' . $jpeg;
	$upload_name5_g = $dir . $name2 . '_5_g' . $jpeg;
	$upload_name6_g = $dir . $name2 . '_6_g' . $jpeg;
	$upload_name7_g = $dir . $name2 . '_7_g' . $jpeg;
	$upload_name8_g = $dir . $name2 . '_8_g' . $jpeg;
	$upload_name9_g = $dir . $name2 . '_9_g' . $jpeg;
	$upload_name10_g = $dir . $name2 . '_10_g' . $jpeg;
	// z
	$upload_name1_z = $dir . $name2 . '_1_z' . $jpeg;
	$upload_name2_z = $dir . $name2 . '_2_z' . $jpeg;
	$upload_name3_z = $dir . $name2 . '_3_z' . $jpeg;
	$upload_name4_z = $dir . $name2 . '_4_z' . $jpeg;
	$upload_name5_z = $dir . $name2 . '_5_z' . $jpeg;
	$upload_name6_z = $dir . $name2 . '_6_z' . $jpeg;
	$upload_name7_z = $dir . $name2 . '_7_z' . $jpeg;
	$upload_name8_z = $dir . $name2 . '_8_z' . $jpeg;
	$upload_name9_z = $dir . $name2 . '_9_z' . $jpeg;
	$upload_name10_z = $dir . $name2 . '_10_z' . $jpeg;

//データが全部空の時
if ($photo_name1 == $empty && $photo_name2 == $empty && $photo_name3 == $empty && $photo_name4 == $empty && $photo_name5 == $empty && $photo_name6 == $empty && $photo_name7 == $empty && $photo_name8 == $empty && $photo_name9 == $empty && $photo_name10 == $empty && $delete1 == $empty && $delete2 == $empty && $delete3 == $empty && $delete4 == $empty && $delete5 == $empty && $delete6 == $empty && $delete7 == $empty && $delete8 == $empty && $delete9 == $empty && $delete10 == $empty) {
	echo '<p>なにも変更されていません。</p><p>■<a href="list.php">一覧に戻ってやり直してください。</a></p>';
}

/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（1枚目）//
/////////////////////////////////////////////
if (($photo_type1 == 'image/jpeg') || ($photo_type1 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name1 , $upload_name1);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■1枚目<br /><a href="' . $upload_name1 . '" target="_blank"><img src="' . $upload_name1_t. '" alt="photo1" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name1);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真1]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		if($width>$height){
			echo "<p>一枚目は縦写真のみアップロード可能です。</p>\n";
		}else{

		//サムネイル画像の幅と高さを決める
		
			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);




		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name1);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_m.jpg')){
			unlink('./photo/'.$name2.'_1_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name1_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_l.jpg')){
			unlink('./photo/'.$name2.'_1_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name1_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_t.jpg')){
			unlink('./photo/'.$name2.'_1_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name1_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_s.jpg')){
			unlink('./photo/'.$name2.'_1_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name1_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_p.jpg')){
			unlink('./photo/'.$name2.'1_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name1_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_b.jpg')){
			unlink('./photo/'.$name2.'1_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name1_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_g.jpg')){
			unlink('./photo/'.$name2.'_1_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name1_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_1_z.jpg')){
			unlink('./photo/'.$name2.'_1_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name1_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
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
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
		
		}
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name1 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（2枚目）//
/////////////////////////////////////////////
if (($photo_type2 == 'image/jpeg') || ($photo_type2 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name2 , $upload_name2);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（2枚目）<br /><a href="' . $upload_name2 . '" target="_blank"><img src="' . $upload_name2_t. '" alt="photo2" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name2);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真2]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name2);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_m.jpg')){
			unlink('./photo/'.$name2.'_2_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name2_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_2_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_l.jpg')){
			unlink('./photo/'.$name2.'_2_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name2_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_t.jpg')){
			unlink('./photo/'.$name2.'_2_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name2_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_s.jpg')){
			unlink('./photo/'.$name2.'_2_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name2_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_p.jpg')){
			unlink('./photo/'.$name2.'_2_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name2_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_b.jpg')){
			unlink('./photo/'.$name2.'_2_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name2_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_g.jpg')){
			unlink('./photo/'.$name2.'_2_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name2_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_2_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_2_z.jpg')){
			unlink('./photo/'.$name2.'_2_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name2_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_2_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name2 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（3枚目）//
/////////////////////////////////////////////
if (($photo_type3 == 'image/jpeg') || ($photo_type3 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name3 , $upload_name3);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（3枚目）<br /><a href="' . $upload_name3 . '" target="_blank"><img src="' . $upload_name3_t. '" alt="photo3" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name3);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真3]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name3);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_m.jpg')){
			unlink('./photo/'.$name2.'_3_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name3_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_3_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_l.jpg')){
			unlink('./photo/'.$name2.'_3_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name3_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_t.jpg')){
			unlink('./photo/'.$name2.'_3_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name3_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_s.jpg')){
			unlink('./photo/'.$name2.'_3_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name3_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_p.jpg')){
			unlink('./photo/'.$name2.'_3_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name3_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_b.jpg')){
			unlink('./photo/'.$name2.'_3_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name3_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_g.jpg')){
			unlink('./photo/'.$name2.'_3_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name3_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_3_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_3_z.jpg')){
			unlink('./photo/'.$name2.'_3_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name3_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_3_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name3 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（4枚目）//
/////////////////////////////////////////////
if (($photo_type4 == 'image/jpeg') || ($photo_type4 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name4 , $upload_name4);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（4枚目）<br /><a href="' . $upload_name4 . '" target="_blank"><img src="' . $upload_name4_t. '" alt="photo4" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name4);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真4]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name4);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_m.jpg')){
			unlink('./photo/'.$name2.'_4_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name4_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_4_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_l.jpg')){
			unlink('./photo/'.$name2.'_4_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name4_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_t.jpg')){
			unlink('./photo/'.$name2.'_4_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name4_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_s.jpg')){
			unlink('./photo/'.$name2.'_4_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name4_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_p.jpg')){
			unlink('./photo/'.$name2.'_4_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name4_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_b.jpg')){
			unlink('./photo/'.$name2.'_4_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name4_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_4_g.jpg')){
			unlink('./photo/'.$name2.'_4_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name4_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_4_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'4_z.jpg')){
			unlink('./photo/'.$name2.'_4_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name4_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_4_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name4 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（5枚目）//
/////////////////////////////////////////////
if (($photo_type5 == 'image/jpeg') || ($photo_type5 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name5 , $upload_name5);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（5枚目）<br /><a href="' . $upload_name5 . '" target="_blank"><img src="' . $upload_name5_t. '" alt="photo5" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name5);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '400') {
			echo '<p>[写真5]は横幅400px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name5);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_m.jpg')){
			unlink('./photo/'.$name2.'_5_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name5_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_5_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_l.jpg')){
			unlink('./photo/'.$name2.'_5_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name5_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_t.jpg')){
			unlink('./photo/'.$name2.'_5_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name5_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_s.jpg')){
			unlink('./photo/'.$name2.'_5_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name5_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_p.jpg')){
			unlink('./photo/'.$name2.'_5_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name5_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_b.jpg')){
			unlink('./photo/'.$name2.'_5_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name5_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_g.jpg')){
			unlink('./photo/'.$name2.'_5_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name5_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_5_g.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_5_z.jpg')){
			unlink('./photo/'.$name2.'_5_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name5_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_5_z.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		echo "</td>\n";
		echo "</tr></table>\n";
	
		//画像の破棄
		imagedestroy($image);
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name5 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}



/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（6枚目）//
/////////////////////////////////////////////
if (($photo_type6 == 'image/jpeg') || ($photo_type6 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name6 , $upload_name6);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（6枚目）<br /><a href="' . $upload_name6 . '" target="_blank"><img src="' . $upload_name6_t. '" alt="photo6" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name6);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真6]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name6);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_m.jpg')){
			unlink('./photo/'.$name2.'_6_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name6_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_6_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_l.jpg')){
			unlink('./photo/'.$name2.'_6_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name6_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_t.jpg')){
			unlink('./photo/'.$name2.'_6_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name6_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_s.jpg')){
			unlink('./photo/'.$name2.'_6_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name6_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_p.jpg')){
			unlink('./photo/'.$name2.'_6_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name6_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_b.jpg')){
			unlink('./photo/'.$name2.'_6_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name6_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_g.jpg')){
			unlink('./photo/'.$name2.'_6_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name6_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_6_z.jpg')){
			unlink('./photo/'.$name2.'_6_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name6_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
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
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name6 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}

/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（7枚目）//
/////////////////////////////////////////////
if (($photo_type7 == 'image/jpeg') || ($photo_type7 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name7 , $upload_name7);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（7枚目）<br /><a href="' . $upload_name7 . '" target="_blank"><img src="' . $upload_name7_t. '" alt="photo7" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name7);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真7]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name7);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_m.jpg')){
			unlink('./photo/'.$name2.'_7_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name7_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_7_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_l.jpg')){
			unlink('./photo/'.$name2.'_7_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name7_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_t.jpg')){
			unlink('./photo/'.$name2.'_7_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name7_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_s.jpg')){
			unlink('./photo/'.$name2.'_7_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name7_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_p.jpg')){
			unlink('./photo/'.$name2.'_7_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name7_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_b.jpg')){
			unlink('./photo/'.$name2.'_7_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name7_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_g.jpg')){
			unlink('./photo/'.$name2.'_7_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name7_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_7_z.jpg')){
			unlink('./photo/'.$name2.'_7_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name7_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
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
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name7 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（8枚目）//
/////////////////////////////////////////////
if (($photo_type8 == 'image/jpeg') || ($photo_type8 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name8 , $upload_name8);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（8枚目）<br /><a href="' . $upload_name8 . '" target="_blank"><img src="' . $upload_name8_t. '" alt="photo8" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name8);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真8]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name8);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_m.jpg')){
			unlink('./photo/'.$name2.'_8_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name8_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_8_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_l.jpg')){
			unlink('./photo/'.$name2.'_8_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name8_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_t.jpg')){
			unlink('./photo/'.$name2.'_8_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name8_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_s.jpg')){
			unlink('./photo/'.$name2.'_8_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name8_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_p.jpg')){
			unlink('./photo/'.$name2.'_8_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name8_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_b.jpg')){
			unlink('./photo/'.$name2.'_8_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name8_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_g.jpg')){
			unlink('./photo/'.$name2.'_8_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name8_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_8_z.jpg')){
			unlink('./photo/'.$name2.'_8_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name8_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
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
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name8 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（9枚目）//
/////////////////////////////////////////////
if (($photo_type9 == 'image/jpeg') || ($photo_type9 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name9 , $upload_name9);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（9枚目）<br /><a href="' . $upload_name9 . '" target="_blank"><img src="' . $upload_name9_t. '" alt="photo9" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name9);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真9]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name9);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_m.jpg')){
			unlink('./photo/'.$name2.'_9_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name9_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_9_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_l.jpg')){
			unlink('./photo/'.$name2.'_9_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name9_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_t.jpg')){
			unlink('./photo/'.$name2.'_9_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name9_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_s.jpg')){
			unlink('./photo/'.$name2.'_9_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name9_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_p.jpg')){
			unlink('./photo/'.$name2.'_9_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name9_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_b.jpg')){
			unlink('./photo/'.$name2.'_9_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name9_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_g.jpg')){
			unlink('./photo/'.$name2.'_9_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name9_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_9_z.jpg')){
			unlink('./photo/'.$name2.'_9_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name9_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
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
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name9 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


/////////////////////////////////////////////
//JPEG形式の画像をアップロードする（10枚目）//
/////////////////////////////////////////////
if (($photo_type10 == 'image/jpeg') || ($photo_type10 == 'image/pjpeg')) {
	//アップロード（移動）
	$result = move_uploaded_file($temp_name10 , $upload_name10);
	
	if ($result) {
		echo "<table class=\"border1\"><tr>\n";
		
		//アップロードの成功
		echo '<td class="w_px200"><p>■アップロードの成功（10枚目）<br /><a href="' . $upload_name10 . '" target="_blank"><img src="' . $upload_name10_t. '" alt="photo10" /></a></p></td>';
		
		//アップロードされた画像情報を取り出す
		$image_size = getimagesize($upload_name10);
		//アップロードされた画像の幅と高さを取り出す
		$width = $image_size[0];
		$height = $image_size[1];
		
		if ($width < '600') {
			echo '<p>[写真10]は横幅600px未満です。サイズ確認後最アップロードしてください！</p>';
		}
		
		//サムネイル画像の幅と高さを決める
		
		if($width>$height){
		
			// _mの幅と高さ
			$height_m = $photo_m;
			$width_m = round($height_m*$width/$height);
			
			// _lの幅と高さ
			$height_l = $photo_l;
			$width_l = round($height_l*$width/$height);
			
			// _tの幅と高さ
			$height_t = $photo_t;
			$width_t = round($height_t*$width/$height);
			
			// _sの幅と高さ
			$height_s = $photo_s;
			$width_s = round($height_s*$width/$height);
			
			// _pの幅と高さ
			$height_p = $photo_p;
			$width_p = round($height_p*$width/$height);
			
			// _bの幅と高さ
			$height_b = $photo_b;
			$width_b = round($height_b*$width/$height);
			
			// _gの幅と高さ
			$height_g = $photo_g;
			$width_g = round($height_g*$width/$height);
			
			// _zの幅と高さ
			$height_z = $photo_z;
			$width_z = round($height_z*$width/$height);
			
		}elseif($width<=$height){

			// _mの幅と高さ
			$width_m = $photo_m;
			$height_m = round($width_m*$height/$width);

			// _lの幅と高さ
			$width_l = $photo_l;
			$height_l = round($width_l*$height/$width);

			// _tの幅と高さ
			$width_t = $photo_t;
			$height_t = round($width_t*$height/$width);

			// _sの幅と高さ
			$width_s = $photo_s;
			$height_s = round($width_s*$height/$width);
			
			// _pの幅と高さ
			$width_p = $photo_p;
			$height_p = round($width_p*$height/$width);
			
			// _bの幅と高さ
			$width_b = $photo_b;
			$height_b = round($width_b*$height/$width);
			
			// _gの幅と高さ
			$width_g = $photo_g;
			$height_g = round($width_g*$height/$width);
			
			// _zの幅と高さ
			$width_z = $photo_z;
			$height_z = round($width_z*$height/$width);
		}

		//アップロードされた画像を取り出す
		$image = imagecreatefromjpeg($upload_name10);

		//サムネイルの大きさの画像を新規作成
		$image_m = imagecreatetruecolor($width_m , $height_m);
		$image_l = imagecreatetruecolor($width_l , $height_l);
		$image_t = imagecreatetruecolor($width_t , $height_t);
		$image_s = imagecreatetruecolor($width_s , $height_s);
		$image_p = imagecreatetruecolor($width_p , $height_p);
		$image_b = imagecreatetruecolor($width_b , $height_b);
		$image_g = imagecreatetruecolor($width_g , $height_g);
		$image_z = imagecreatetruecolor($width_z , $height_z);

		//アップロードされた画像からサムネイル画像を作成
		$result_m = imagecopyresampled($image_m , $image , 0,0, 0,0, $width_m , $height_m , $width , $height);
		$result_l = imagecopyresampled($image_l , $image , 0,0, 0,0, $width_l , $height_l , $width , $height);
		$result_t = imagecopyresampled($image_t , $image , 0,0, 0,0, $width_t , $height_t , $width , $height);
		$result_s = imagecopyresampled($image_s , $image , 0,0, 0,0, $width_s , $height_s , $width , $height);
		$result_p = imagecopyresampled($image_p , $image , 0,0, 0,0, $width_p , $height_p , $width , $height);
		$result_b = imagecopyresampled($image_b , $image , 0,0, 0,0, $width_b , $height_b , $width , $height);
		$result_g = imagecopyresampled($image_g , $image , 0,0, 0,0, $width_g , $height_g , $width , $height);
		$result_z = imagecopyresampled($image_z , $image , 0,0, 0,0, $width_z , $height_z , $width , $height);
		
		echo "<td>\n";
		
		if ($result_m) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_m.jpg')){
			unlink('./photo/'.$name2.'_10_m.jpg');
			}
			//サムネイル画像の保存 _m
			if (imagejpeg($image_m , $upload_name10_m , $quality)) {
				echo '<p>->サムネイル画像保存(_m)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		//横写真の時は携帯表示用に画像を90度回転
		$img_name = './photo/'.$name2.'_10_m.jpg';
		$rotate_img=getimagesize($img_name);
		$rotate_img_w=$rotate_img[0];
		$rotate_img_h=$rotate_img[1];
		
		if($rotate_img_w>$rotate_img_h){
			$source = imagecreatefromjpeg($img_name);
			$degrees = 90;
			$rotate = imagerotate($source,$degrees, 0);
			imagejpeg($rotate,$img_name,$quality);
		}
		
		if($result_l) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_l.jpg')){
			unlink('./photo/'.$name2.'_10_l.jpg');
			}
			//サムネイル画像の保存 _l
			if (imagejpeg($image_l , $upload_name10_l , $quality)) {
				echo '<p>->サムネイル画像保存(_l)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_t) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_t.jpg')){
			unlink('./photo/'.$name2.'_10_t.jpg');
			}
			//サムネイル画像の保存 _t
			if (imagejpeg($image_t , $upload_name10_t , $quality)) {
				echo '<p>->サムネイル画像保存(_t)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_s) {

			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_s.jpg')){
			unlink('./photo/'.$name2.'_10_s.jpg');
			}
			//サムネイル画像の保存 _s
			if (imagejpeg($image_s , $upload_name10_s , $quality)) {
				echo '<p>->サムネイル画像保存(_s)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_p) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_p.jpg')){
			unlink('./photo/'.$name2.'_10_p.jpg');
			}
			//サムネイル画像の保存 _p
			if (imagejpeg($image_p , $upload_name10_p , $quality)) {
				echo '<p>->サムネイル画像保存(_p)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_b) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_b.jpg')){
			unlink('./photo/'.$name2.'_10_b.jpg');
			}
			//サムネイル画像の保存 _b
			if (imagejpeg($image_b , $upload_name10_b , $quality)) {
				echo '<p>->サムネイル画像保存(_b)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_g) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_g.jpg')){
			unlink('./photo/'.$name2.'_10_g.jpg');
			}
			//サムネイル画像の保存 _g
			if (imagejpeg($image_g , $upload_name10_g , $quality)) {
				echo '<p>->サムネイル画像保存(_g)</p>';
			} else {
				echo '<p>->サムネイル画像保存失敗</p>';
			}
		} else {
			echo '<p>->サムネイル画像作成失敗</p>';
		}
		
		if ($result_z) {
			//古い画像を削除
			if(file_exists('./photo/'.$name2.'_10_z.jpg')){
			unlink('./photo/'.$name2.'_10_z.jpg');
			}
			//サムネイル画像の保存 _z
			if (imagejpeg($image_z , $upload_name10_z , $quality)) {
				echo '<p>->サムネイル画像保存(_z)</p>';
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
		imagedestroy($image_m);
		imagedestroy($image_l);
		imagedestroy($image_t);
		imagedestroy($image_s);
		imagedestroy($image_p);
		imagedestroy($image_b);
		imagedestroy($image_g);
		imagedestroy($image_z);
	
	} else {
		echo '<p>->アップロード失敗</p>';
	}
} elseif ($photo_name10 == $empty) {
	echo '';
} else {
	echo '<p>■JPEG形式の画像をアップロードしてください。</p>';
}


?>

<?php
//CSVから該当データを取り出して変数に代入
$data = file('data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	
	if($line[2] == $name2) {
		include('parts/basic_hensu_straight.php');
	}
}

//更新されたデータに差し替える
if ($photo_name1 != $empty) {$photo1 = $dir . $name2 . '_1';}
if ($photo_name2 != $empty) {$photo2 = $dir . $name2 . '_2';}
if ($photo_name3 != $empty) {$photo3 = $dir . $name2 . '_3';}
if ($photo_name4 != $empty) {$photo4 = $dir . $name2 . '_4';}
if ($photo_name5 != $empty) {$photo5 = $dir . $name2 . '_5';}
if ($photo_name6 != $empty) {$photo6 = $dir . $name2 . '_6';}
if ($photo_name7 != $empty) {$photo7 = $dir . $name2 . '_7';}
if ($photo_name8 != $empty) {$photo8 = $dir . $name2 . '_8';}
if ($photo_name9 != $empty) {$photo9 = $dir . $name2 . '_9';}
if ($photo_name10 != $empty) {$photo10 = $dir . $name2 . '_10';}

//削除写真のデータを空に
if($delete1=='delete'){$photo1='';}
if($delete2=='delete'){$photo2='';}
if($delete3=='delete'){$photo3='';}
if($delete4=='delete'){$photo4='';}
if($delete5=='delete'){$photo5='';}
if($delete6=='delete'){$photo6='';}
if($delete7=='delete'){$photo7='';}
if($delete8=='delete'){$photo8='';}
if($delete9=='delete'){$photo9='';}
if($delete10=='delete'){$photo10='';}

//書込みデータを結合
$line = array($id,$name,$name2,$age,$height,$weight,$bust,$cup,$waist,$hip,$comment,$comment2,$profinfo1,$profinfo2,$profinfo3,$profinfo4,$profinfo5,$profinfo6,$profinfo7,$profinfo8,$profinfo9,$profinfo10,$option1,$option2,$option3,$option4,$option5,$option6,$option7,$option8,$option9,$option10,$option11,$option12,$option13,$option14,$option15,$option16,$option17,$option18,$option19,$option20,$option21,$option22,$option23,$option24,$option25,$option26,$option27,$option28,$option29,$option30,$option31,$option32,$option33,$option34,$option35,$option36,$option37,$option38,$option39,$option40,$photo1,$photo2,$photo3,$photo4,$photo5,$photo6,$photo7,$photo8,$photo9,$photo10,$yotei1,$start1,$end1,$yotei2,$start2,$end2,$yotei3,$start3,$end3,$yotei4,$start4,$end4,$yotei5,$start5,$end5,$yotei6,$start6,$end6,$yobi1,$yobi2,$yobi3,$yobi4,$yobi5,$yobi6,$yobi7,$yobi8,$yobi9,$yobi10,$edittime);
$line = implode(',' , $line);

//CSVファイルから直接読み込んだデータなので、再書込みの時に行末に[\n]は不要
#	$line = $line . "\n";

//配列入れ替え
$data = file('data.csv');
for($i=0;$i<sizeof($data);$i++) {
$lines = explode(',' , $data[$i]);
if ($lines[2] == $name2) {
	array_splice($data , $i , 1 , $line);
	}
}

//CSVファイルへ書き込み
$handle = fopen('data.csv' , 'w');
flock($handle , LOCK_EX);
foreach($data as $item)fputs($handle , $item);
fclose($handle);

//写真を削除
if($delete1=='delete'){
	unlink('./photo/'.$name2.'_1.jpg');
	unlink('./photo/'.$name2.'_1_m.jpg');
	unlink('./photo/'.$name2.'_1_l.jpg');
	unlink('./photo/'.$name2.'_1_t.jpg');
	unlink('./photo/'.$name2.'_1_s.jpg');
	unlink('./photo/'.$name2.'_1_p.jpg');
	unlink('./photo/'.$name2.'_1_b.jpg');
	unlink('./photo/'.$name2.'_1_g.jpg');
	unlink('./photo/'.$name2.'_1_z.jpg');
	echo "<p>".$name."写真1枚目を削除しました。</p>\n";
}
if($delete2=='delete'){
	unlink('./photo/'.$name2.'_2.jpg');
	unlink('./photo/'.$name2.'_2_m.jpg');
	unlink('./photo/'.$name2.'_2_l.jpg');
	unlink('./photo/'.$name2.'_2_t.jpg');
	unlink('./photo/'.$name2.'_2_s.jpg');
	unlink('./photo/'.$name2.'_2_p.jpg');
	unlink('./photo/'.$name2.'_2_b.jpg');
	unlink('./photo/'.$name2.'_2_g.jpg');
	unlink('./photo/'.$name2.'_2_z.jpg');
	echo "<p>".$name."写真2枚目を削除しました。</p>\n";
}
if($delete3=='delete'){
	unlink('./photo/'.$name2.'_3.jpg');
	unlink('./photo/'.$name2.'_3_m.jpg');
	unlink('./photo/'.$name2.'_3_l.jpg');
	unlink('./photo/'.$name2.'_3_t.jpg');
	unlink('./photo/'.$name2.'_3_s.jpg');
	unlink('./photo/'.$name2.'_3_p.jpg');
	unlink('./photo/'.$name2.'_3_b.jpg');
	unlink('./photo/'.$name2.'_3_g.jpg');
	unlink('./photo/'.$name2.'_3_z.jpg');
	echo "<p>".$name."写真3枚目を削除しました。</p>\n";
}
if($delete4=='delete'){
	unlink('./photo/'.$name2.'_4.jpg');
	unlink('./photo/'.$name2.'_4_m.jpg');
	unlink('./photo/'.$name2.'_4_l.jpg');
	unlink('./photo/'.$name2.'_4_t.jpg');
	unlink('./photo/'.$name2.'_4_s.jpg');
	unlink('./photo/'.$name2.'_4_p.jpg');
	unlink('./photo/'.$name2.'_4_b.jpg');
	unlink('./photo/'.$name2.'_4_g.jpg');
	unlink('./photo/'.$name2.'_4_z.jpg');
	echo "<p>".$name."写真4枚目を削除しました。</p>\n";
}
if($delete5=='delete'){
	unlink('./photo/'.$name2.'_5.jpg');
	unlink('./photo/'.$name2.'_5_m.jpg');
	unlink('./photo/'.$name2.'_5_l.jpg');
	unlink('./photo/'.$name2.'_5_t.jpg');
	unlink('./photo/'.$name2.'_5_s.jpg');
	unlink('./photo/'.$name2.'_5_p.jpg');
	unlink('./photo/'.$name2.'_5_b.jpg');
	unlink('./photo/'.$name2.'_5_g.jpg');
	unlink('./photo/'.$name2.'_5_z.jpg');
	echo "<p>".$name."写真5枚目を削除しました。</p>\n";
}
if($delete6=='delete'){
	unlink('./photo/'.$name2.'_6.jpg');
	unlink('./photo/'.$name2.'_6_m.jpg');
	unlink('./photo/'.$name2.'_6_l.jpg');
	unlink('./photo/'.$name2.'_6_t.jpg');
	unlink('./photo/'.$name2.'_6_s.jpg');
	unlink('./photo/'.$name2.'_6_p.jpg');
	unlink('./photo/'.$name2.'_6_b.jpg');
	unlink('./photo/'.$name2.'_6_g.jpg');
	unlink('./photo/'.$name2.'_6_z.jpg');
	echo "<p>".$name."写真6枚目を削除しました。</p>\n";
}
if($delete7=='delete'){
	unlink('./photo/'.$name2.'_7.jpg');
	unlink('./photo/'.$name2.'_7_m.jpg');
	unlink('./photo/'.$name2.'_7_l.jpg');
	unlink('./photo/'.$name2.'_7_t.jpg');
	unlink('./photo/'.$name2.'_7_s.jpg');
	unlink('./photo/'.$name2.'_7_p.jpg');
	unlink('./photo/'.$name2.'_7_b.jpg');
	unlink('./photo/'.$name2.'_7_g.jpg');
	unlink('./photo/'.$name2.'_7_z.jpg');
	echo "<p>".$name."写真7枚目を削除しました。</p>\n";
}
if($delete8=='delete'){
	unlink('./photo/'.$name2.'_8.jpg');
	unlink('./photo/'.$name2.'_8_m.jpg');
	unlink('./photo/'.$name2.'_8_l.jpg');
	unlink('./photo/'.$name2.'_8_t.jpg');
	unlink('./photo/'.$name2.'_8_s.jpg');
	unlink('./photo/'.$name2.'_8_p.jpg');
	unlink('./photo/'.$name2.'_8_b.jpg');
	unlink('./photo/'.$name2.'_8_g.jpg');
	unlink('./photo/'.$name2.'_8_z.jpg');
	echo "<p>".$name."写真8枚目を削除しました。</p>\n";
}
if($delete9=='delete'){
	unlink('./photo/'.$name2.'_9.jpg');
	unlink('./photo/'.$name2.'_9_m.jpg');
	unlink('./photo/'.$name2.'_9_l.jpg');
	unlink('./photo/'.$name2.'_9_t.jpg');
	unlink('./photo/'.$name2.'_9_s.jpg');
	unlink('./photo/'.$name2.'_9_p.jpg');
	unlink('./photo/'.$name2.'_9_b.jpg');
	unlink('./photo/'.$name2.'_9_g.jpg');
	unlink('./photo/'.$name2.'_9_z.jpg');
	echo "<p>".$name."写真9枚目を削除しました。</p>\n";
}
if($delete10=='delete'){
	unlink('./photo/'.$name2.'_10.jpg');
	unlink('./photo/'.$name2.'_10_m.jpg');
	unlink('./photo/'.$name2.'_10_l.jpg');
	unlink('./photo/'.$name2.'_10_t.jpg');
	unlink('./photo/'.$name2.'_10_s.jpg');
	unlink('./photo/'.$name2.'_10_p.jpg');
	unlink('./photo/'.$name2.'_10_b.jpg');
	unlink('./photo/'.$name2.'_10_g.jpg');
	unlink('./photo/'.$name2.'_10_z.jpg');
	echo "<p>".$name."写真10枚目を削除しました。</p>\n";
}

?>

<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>