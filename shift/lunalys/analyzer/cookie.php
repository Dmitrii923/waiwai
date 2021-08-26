<?php

// 実行可否（0:不実行  1:Cookie発行  2:Cookie削除）
$execute = 0;

// 実行しない場合は終了
if(!$execute){exit;}

// Cookie発行の時
elseif($execute === 1)
{
	
	// 有効期限を定義
	$c_time = $_SERVER['REQUEST_TIME'] + 3600 * 24 * 365;
	
	// メッセージを定義
	$message = 'Set Cookie!';
	
}

// Cookie削除の時
elseif($execute === 2)
{
	
	// 有効期限を定義
	$c_time = 0;
	
	// メッセージを定義
	$message = 'Delete Cookie!';
	
}

// 現在のサーバーホストを分割
$c_dm = array_reverse(explode('.',$_SERVER['SERVER_NAME']));

// 2nd LD の長さが3以上の時（属性無し）
if(strlen($c_dm[1]) > 2){$c_host = '.' . $c_dm[1] . '.' . $c_dm[0];}

// 2nd LD の長さが2以下の時（属性有り）
else{$c_host = '.' . $c_dm[2] . '.' . $c_dm[1] . '.' . $c_dm[0];}

// クロスドメイン用ヘッダーを出力
header("P3P: CP='UNI CUR OUR'");

// Cookieを発行
setcookie('ls_login',"user=&pass=",$c_time,'/',$c_host);

// メッセージを出力
echo $message;

