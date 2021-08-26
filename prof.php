<?php
//設定ファイル読み込み
require_once 'shift/conf.php';
//GETデータ受け取り
$name2 = $_GET['name2'];

//データを読み込み
$data = file('shift/data.csv');
for($i=0; $i<sizeof($data); $i++) {
	$line = explode(',' , $data[$i]);
	if ($line[2] == $name2) {
		include('shift/parts/basic_hensu.php');
		include('shift/parts/schetime.php');
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $name; ?>のプロフィール</title>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />     
<!-- Add jQuery library -->
	<script type="text/javascript" src="lib/jquery-1.9.0.min.js"></script>

	<!-- Add mousewheel plugin (this is optional) -->
	<script type="text/javascript" src="lib/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="source/jquery.fancybox.js?v=2.1.4"></script>
	<link rel="stylesheet" type="text/css" href="source/jquery.fancybox.css?v=2.1.4" media="screen" />

	<!-- Add Button helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>

	<!-- Add Thumbnail helper (this is optional) -->
	<link rel="stylesheet" type="text/css" href="source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />
	<script type="text/javascript" src="source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>

	<!-- Add Media helper (this is optional) -->
	<script type="text/javascript" src="source/helpers/jquery.fancybox-media.js?v=1.0.5"></script>

	<script type="text/javascript">
		$(document).ready(function() {
			/*
			 *  Simple image gallery. Uses default settings
			 */

			$('.fancybox').fancybox();

			/*
			 *  Different effects
			 */

			// Change title type, overlay closing speed
			$(".fancybox-effects-a").fancybox({
				helpers: {
					title : {
						type : 'outside'
					},
					overlay : {
						speedOut : 0
					}
				}
			});

			// Disable opening and closing animations, change title type
			$(".fancybox-effects-b").fancybox({
				openEffect  : 'none',
				closeEffect	: 'none',

				helpers : {
					title : {
						type : 'over'
					}
				}
			});

			// Set custom style, close if clicked, change title type and overlay color
			$(".fancybox-effects-c").fancybox({
				wrapCSS    : 'fancybox-custom',
				closeClick : true,

				openEffect : 'none',

				helpers : {
					title : {
						type : 'inside'
					},
					overlay : {
						css : {
							'background' : 'rgba(238,238,238,0.85)'
						}
					}
				}
			});

			// Remove padding, set opening and closing animations, close if clicked and disable overlay
			$(".fancybox-effects-d").fancybox({
				padding: 0,

				openEffect : 'elastic',
				openSpeed  : 150,

				closeEffect : 'elastic',
				closeSpeed  : 150,

				closeClick : true,

				helpers : {
					overlay : null
				}
			});

			/*
			 *  Button helper. Disable animations, hide close button, change title type and content
			 */

			$('.fancybox-buttons').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',

				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,

				helpers : {
					title : {
						type : 'inside'
					},
					buttons	: {}
				},

				afterLoad : function() {
					this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
				}
			});


			/*
			 *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
			 */

			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',

				closeBtn  : false,
				arrows    : false,
				nextClick : true,

				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});

			/*
			 *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
			*/
			$('.fancybox-media')
				.attr('rel', 'media-gallery')
				.fancybox({
					openEffect : 'none',
					closeEffect : 'none',
					prevEffect : 'none',
					nextEffect : 'none',

					arrows : false,
					helpers : {
						media : {},
						buttons : {}
					}
				});

			/*
			 *  Open manually
			 */

			$("#fancybox-manual-a").click(function() {
				$.fancybox.open('1_b.jpg');
			});

			$("#fancybox-manual-b").click(function() {
				$.fancybox.open({
					href : 'iframe.html',
					type : 'iframe',
					padding : 5
				});
			});

			$("#fancybox-manual-c").click(function() {
				$.fancybox.open([
					{
						href : '1_b.jpg',
						title : 'My title'
					}, {
						href : '2_b.jpg',
						title : '2nd title'
					}, {
						href : '3_b.jpg'
					}
				], {
					helpers : {
						thumbs : {
							width: 75,
							height: 50
						}
					}
				});
			});


		});
	</script>
	<style type="text/css">
		.fancybox-custom .fancybox-skin {
			box-shadow: 0 0 50px #222;
		}
	</style>
</head>

<body>

<div id="header_bg2">
  <h1>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h1>
  <div id="header"><img src="img/logo2.png" width="1024" height="98" /></div>
</div>
<div id="button"><?php include ('php/menu.php'); ?></div>
<div id="main_bg2">
  <div id="blackarea"></div>
  <div id="pagenavi"><h2>群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」</h2>
  <p></p>
  <p>｜<a href="index.php" title="群馬県館林市のガールズバー「Girls Bar WaiWai合衆国」">トップページ</a> ＞＞<a href="cast.php">在籍スタッフ一覧</a>＞＞ <strong><?php echo $name; ?>のプロフィール</strong></p></div>
  <div id="hoka_main">
    <div id="widepage"><img src="img/profpage.jpg" width="1024" height="128" />
      <div id="prof_main"><table width="950" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="320" height="450" align="left" valign="top">
          <?php
//プロフィールメイン写真
if($photo1==$empty){
	echo "<img src=\"shift/photo/no_photo_b.jpg\" alt=\"".$name."\" width=\"320px\" />\n";
}else{
	echo "<img src=\"shift/".$photo1."_b.jpg\" alt=\"".$name."\" width=\"320px\"/>\n";
}
?></td>
          <td width="451" align="left" valign="top"><table width="430" border="0" align="center" cellpadding="10" cellspacing="2">
        <tr>
          <td colspan="2" align="left" valign="top"><?php echo $name; ?>　(<?php echo $age; ?>)</td>
          </tr>
        <tr>
          <td width="134" align="left" valign="top"><span class="prof_txt">誕生日</span></td>
          <td width="242" align="left" valign="top"><span class="prof_txt"><?php echo $profinfo1; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">血液型</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo2; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">出身地</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo3; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">資格・特技</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo4; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">好みのタイプ</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo5; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">好きな食べ物</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo7; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">好きなお酒</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo8; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">好きなブランド</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo9; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">チャームポイント</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $profinfo10; ?></span></td>
      </tr>
      <tr>
        <td align="left" valign="top"><span class="prof_txt">女の子から一言</span></td>
        <td align="left" valign="top"><span class="prof_txt"><?php echo $comment; ?></span></td>
      </tr>
          </table></td>
          <td width="179" align="right" valign="top"><a href="cast.php"><img src="img/prof_list.png" width="179" height="43" /></a><br />
<?php
if($profinfo6==''){
	echo "";
}else{
	echo "<a href=\"http://ameblo.jp/".$profinfo6."\" target=\"_blank\"><img src=\"img/prof_blog.png\" alt=\"\" border=\"0\" /></a>";
}
?></td>
        </tr>
</table></div>
<div id="prof_photoarea"><img src="img/prof2.jpg" width="989" height="98" />
<table width="100%">
<tr>
<?php
//画像の登録がない場合
if($photo1==$empty&&$photo2==$empty&&$photo3==$empty&&$photo4==$empty&&$photo5==$empty&&$photo6==$empty&&$photo7==$empty&&$photo8==$empty&&$photo9==$empty&&$photo10==$empty){
	echo "<td>\n";
	echo "★画像の登録がありません★\n";
	echo "</td></tr>\n";
}else{
	//画像登録有りの場合
	$photo=array($photo1,$photo2,$photo3,$photo4,$photo5,$photo6,$photo7,$photo8,$photo9,$photo10);
	//テーブルセルカウント変数
	$tb=0;
	
for($i=0;$i<10;$i++){
		if($photo[$i]!=""){
			//セルカウントアップ
			$tb++;
			echo "<td width=\"20%\" height=\"160\" align=\"center\" valign=\"middle\">\n";
			echo "<a class=\"fancybox\" href=\"shift/".$photo[$i].".jpg\" data-fancybox-group=\"gallery\"><img src=\"shift/".$photo[$i]."_p.jpg\" alt=\"".$name."\" /></a>\n";
echo "</td>\n";

			if($tb==5){
				echo "</tr>\n";
				$tb=0;
			}
		}
	}
	//セルの不足分を埋める
	if(5-$tb!=0){
		$td_col=5-$tb;
		echo "<td width=\"0\" colspan=\"".$td_col."\">&nbsp;</td></tr>\n";
	}

}
?></table></div>
    </div>
    
  </div>
  <div id="footer"><?php include ('php/sitemap.php'); ?>
</div>
</div>
</body>
</html>