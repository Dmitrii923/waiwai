<html>
<head>
<meta http-equiv="Content-Language" content="ja" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>JQuery Sortable デモ</title>
<script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.21.custom.min.js"></script>
<style type="text/css">
#myList li {
	cursor: move
}

#order_list {
	cursor: move
}

.hover {
	background: #808080;
}
</style>
</head>
<body>

<h3>JQuery Sortable デモ</h3>

<?php
$order = split(",",$_REQUEST['order']);
if(is_array($order)){
	foreach($order as $id){ echo htmlspecialchars($id)." → "; }
}
?>

<script type="text/javascript">
jQuery.noConflict();

jQuery(function($) {
	$("#order_list").sortable({ 
		items: "li" ,
		hoverClass: "hover" ,
		stop : function(){
			var data=[];
			$("li","#order_list").each(function(i,v){
				data.push(v.id);
			});
			$('#order').val(data.toString());
		},
		update : function(){
			$('#submit').removeAttr('disabled');
		}
	});
});
</script>

<ul id="order_list"
	style="list-style-type: none; cursor: hand; cursor: pointer;">
	<li id="1" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji1.jpg" width="280" height="200">アイテム
	1</li>
	<li id="2" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji8.jpg" width="280" height="200">アイテム
2</li>
	<li id="3" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji2.jpg" width="280" height="200">アイテム
  3</li>
	<li id="4" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji3.jpg" width="280" height="200">アイテム
  4</li>
	<li id="5" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji5.jpg" width="280" height="200">アイテム
  5</li>
	<li id="6" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji6.jpg" width="280" height="200">アイテム
  6</li>
	<li id="7" style="border: 1px solid black; width: 600px; margin: 5px; height: 220px;"><img src="../../img/ji7.jpg" width="280" height="200">アイテム
	7</li>
</ul>

<form method="post" action="index.php">
<input type="text" name="order" id="order" size=10 />
←ここにliタグのIDを保存
<br />
<br />
<input type="submit" id="submit" name="submit" value="送信"
	disabled="disabled" />
</form>

</body>
</html>
