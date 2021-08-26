<?php
	//セッション開始
	session_start();
	
	//セッション変数を初期化
	$_SESSION = array();
	
	//セッションIDを破棄
	if ( isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time() -3600, '/');
	}
	
	//セッションを破棄
	session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ログアウト</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div id="container">
<h1>ログアウトしました。</h1>
<p>■<a href="index.php">ログインフォームに戻る</a></p>

</div>

<?php include ('parts/copyright.php'); ?>

</body>
</html>
