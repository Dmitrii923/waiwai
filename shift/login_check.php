<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	if ($_SESSION['login'] != 'OK') {
		//ログインしていないメッセージを表示する
		
		echo <<< GOLGO
		<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
		<html xmlns="http://www.w3.org/1999/xhtml">
		<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>出勤情報</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
		</head>

		<body>
		<div id="container">
		<p>■ログインしていません。</p>
GOLGO;
		require_once 'conf.php';
		echo '<p><a href="index.php">ログイン画面を開く</a></p>';
		echo '</div>';

		
		echo '</body>';
		echo '</html>';
		
		//終了
		exit();
	}
?>