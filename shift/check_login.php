<?php
	//セッションの生成
	session_start();
	
	require_once ('conf.php');
	
	//ユーザー名/パスワード
	$user = htmlspecialchars($_POST['user'], ENT_QUOTES);
	$pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
	
	if (($user == $login_id) && ($pass == $login_pass)) {
		$login = 'OK';
	} else {
		$login = 'Error';
	}
	
	$_SESSION['login'] = $login;
	
	if ($login == 'OK') {
		header('Location: ok_login.php');
	} else {
		header('Location: error_login.php');
	}
	
?>