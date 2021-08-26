<?php

// プロトコルを取得
$protocol = (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] === 'off') ? 'http' : 'https';

// ホスト名を取得
$host = $_SERVER['SERVER_NAME'];

// ドキュメントルートを取得
$document_root = preg_quote($_SERVER['DOCUMENT_ROOT'],'/');

// write.phpまでのパスを取得
$url = preg_replace("/$document_root/",'',dirname(__FILE__)) . '/write.php';

// 引数を設定
$url .= '?url=' . $protocol . '://' . $host. $_SERVER['REQUEST_URI'];

// IPアドレスを取得
if(isset($_SERVER['HTTP_CLIENT_IP'])){$ip = $_SERVER['HTTP_CLIENT_IP'];}
elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];}
else{$ip = $_SERVER['REMOTE_ADDR'];}

// ソケットを開く
$fp = @fsockopen($host,80,$err_no,$err_msg,10);

// ソケットが開けなかった時
if(!$fp){return '';}

// 送信データを整形
$req = <<<_REQUEST_
GET $url HTTP/1.1
Host: $host
Connection: Close
From: $ip

_REQUEST_;

// 言語設定が存在する時は追記
if(isset($_SERVER['HTTP_ACCEPT_LANGUAGE'])){$req .= 'Accept-language: ' . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "\n";}

// UAが存在する時は追記
if(isset($_SERVER['HTTP_USER_AGENT'])){$req .= 'User-Agent: ' . $_SERVER['HTTP_USER_AGENT'] . "\n";}

// リンク元が存在する時は追記
if(isset($_SERVER['HTTP_REFERER'])){$req .= 'Referer: ' . $_SERVER['HTTP_REFERER'] . "\n";}

// COOKIEが存在する時は追記
if(isset($_SERVER['HTTP_COOKIE'])){$req .= 'Cookie: ' . $_SERVER['HTTP_COOKIE'] . "\n";}

// 改行コードを追記
$req .= "\r\n\r\n";

// データを送信
fputs($fp,$req);

// ソケットを閉じる
fclose($fp);

