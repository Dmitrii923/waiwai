<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ログイン</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>

<div id="container">
<h1>ログイン</h1>
<h2>ユーザー名とパスワードを入力してください。</h2>

<form action="check_login.php" method="post">

<p>ユーザー名：<br />
<input class="w50" type="text" name="user" /></p>

<p>パスワード：<br />
<input class="w50" type="password" name="pass" /></p>

<p>
<input type="submit" value="ログイン" />
</p>
</form>

</div>

<?php include ('parts/copyright.php'); ?>

</body>
</html>
