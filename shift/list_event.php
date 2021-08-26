<?php
	//セッションの復元
	session_start();
	
	//ログインチェック
	require_once 'login_check.php';
	
	//設定ファイル読み込み
	require_once 'conf.php';
	
	$now_year = date("Y"); //現在の年を取得
	
	$now_month = date("n"); //現在の月を取得

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja" xml:lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>月間イベント管理</title>
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- lightview -->
<link href="lightview/css/lightview.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/prototype/1/prototype.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/scriptaculous/1/scriptaculous.js?load=effects"></script>
<script type="text/javascript" src="lightview/js/lightview.js"></script>
<!-- lightview -->

</head>

<body>

<div id="container">

<h1>イベント登録</h1>
<ul id="menu"><?php include ('parts/menu2.php'); ?></ul>
<div id="under_line"></div>
<div id="hp_view">
<ul id="eve">
  <li><a href="eventedit.php?id=<?php echo $now_year; ?><?php echo $now_month; ?>">今月のイベント登録・編集</a></li>
  <li><a href="nextedit.php?id=<?php echo $now_year; ?><?php echo $next_month; ?>">翌月のイベント登録・編集</a></li></ul><div id="under_line"></div></div>

</div>


<div id="footer">
<div id="menu"><p><?php include ('parts/menu.php'); ?></p>
</div>
<?php include ('parts/copyright.php'); ?>
</div></div>


</body>
</html>
