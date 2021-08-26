<?php

class Overlay
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(true,true,false,false);
		
	}
	
	
	//---------------------------------------------------------
	//  ページオーバーラップ生成
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		$date = $obj['date'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 共通処理クラスを読み込み
		include($work_dir . '/filters/header.php');
		
		// インスタンスを生成
		$header = new Header();
		
		// 年月移動リンクを取得
		$nav = $header->create_date_m('overlay',$date,'url');
		
		// 年月を取得
		$y = $args['y'];
		$m = $args['m'];
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// 戻るリンクを定義
		$no_data = '<a href="javascript:history.back();">no data</a>';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){exit($no_data);}
		
		// DBに接続
		else{$db->attach($t_db);}
		
		// ログテーブル名を定義
		$n_table = $prefix . '_page';
		$d_table = $prefix . '_d_' . $y . '_' . $m;
		$i_table = $prefix . '_i_' . $y . '_' . $m;
		
		// リンクを整形
		$link = "$scr_php/overlay/$y/$m";
		
		////////////////////////////////////////////////////////////
		
		// 引数が存在する時
		if(isset($args[3])){$url = preg_replace("/.*\/(http.+)/A","$1",$_SERVER['REQUEST_URI']);}
		
		// 引数が存在しない時
		else
		{
			
			// SQLを定義
			$q = "select url from $i_table,$n_table where type = 'page' and name = no order by cnt desc limit 1;";
			
			// SQLを実行
			$url = $db->query_fetch($q,'url');
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$x = array();
		$args['ii'] = 0;
		$js_array   = '';
		$page_no    = 1;
		
		// グローバル変数にセット
		$args['url']  = $url;
		$args['link'] = $link;
		
		// リンクを入れ替え
		$nav = preg_replace('/url\//',$url,$nav);
		
		////////////////////////////////////////////////////////////
		
		// SQLを定義
		$q = "select * from $n_table;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// オプションフィルタリングループ
		while($a = $db->fetch($r))
		{
			
			// データを取得
			$no = $a['no'];
			
			// URLが一致する時
			if($url === $a['url'])
			{
				
				// JavaScriptを整形
				$js_array .= "olUrls['" . $a['url'] . "'] = 'self';\n";
				
				// p_noを別名で保持
				$page_no = $no;
				
			}
			
			// URLが一致しない時
			else
			{
				
				// URLを配列にセット
				$urls[$no] = $a['url'];
				
				// 「0」を配列にセット
				$x[$no] = 0;
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 変数を別名で保持
		$p = $page_no;
		
		// SQLを定義
		$q = "select page_route from $d_table where page_route like '$p-%' or page_route like '%-$p-%';";
		
		// SQLを実行
		$r = $db->query($q);
		
		// トータル数を初期化
		$all_cnt = 0;
		
		// レコードデータ表示ループ
		while($a = $db->fetch($r))
		{
			
			// page_noが一致しない時は次へ
			if(!preg_match("/$page_no(-)([^-]*)/",$a['page_route'],$h)){continue;}
			
			// 一致移行のp_noを取得
			$z = $h[2];
			
			// カウント数を増加
			$x[$z] = (isset($x[$z])) ? $x[$z] + 1 : 1;
			
			// トータル数を増加
			$all_cnt++;
			
		}
		
		// カウント数配列ループ
		foreach($x as $key => $val)
		{
			
			// URLが存在する時
			if(isset($urls[$key]))
			{
				
				// URLを取得
				$xurl = $urls[$key];
				
				// パーセンテージを算出
				$xper = ($all_cnt) ? round(($val / $all_cnt) * 100) : 0;
				
				// JavaScriptを整形
				$js_array .= "olUrls['$xurl'] = '$xper%';\n";
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// ポップアップ用CSSを定義
		$css = <<<_HTML_
<style type="text/css">

.click,#content_date
{
	
	position:absolute;
	
	font:normal normal 12px/120% "メイリオ","Meiryo","ＭＳ Ｐゴシック",sans-serif !important;
	
	border-radius:4px;
	
	box-shadow:3px 3px 4px rgba(0,0,0,0.4);
	
}

.click
{
	
	display:inline;
	
	height:15px;
	width:30px;
	
	padding-right:3px;
	
	border:1px solid darkgray;
	
	text-align:right !important;
	text-decoration:none !important;
	
	color:#666666 !important;
	background-color:#f8f8f8 !important;
	
}

#content_date
{
	
	top  : 5px;
	right:15px;
	
	padding:0 5px;
	
	background-color:#ffffff !important;
	
}
</style>
</head>
_HTML_;
		
		////////////////////////////////////////////////////////////
		
		// ポップアップ用JavaScriptを定義
		$js = <<<_HTML_
<script type="text/javascript">

var linksLength = document.links.length;
var olUrls = new Array();
$js_array

for(i = 0;i < linksLength;i++)
{
	
	a = document.links[i];
	
	a.onclick = olJump;
	
	if(olUrls[a] && olUrls[a] != 'self'){a.innerHTML += '<span class="click">' + olUrls[a] + '</span>';}
	
}

function olJump()
{
	
	location.href = '$link/' + this.href;
	
	return false;
	
}

</script>$nav
</body>
_HTML_;
		
		////////////////////////////////////////////////////////////
		
		// プロトコルを取得
		$protocol = (preg_match('/https:/A',$url)) ? 'https' : 'http';
		
		// プロトコルをグローバル変数にセット
		$args['protocol'] = $protocol;
		
		// 基準パスをグローバル変数にセット
		$args['base_url'] = self::url_path($url);
		
		// ストリーム配列を定義
		$stream = array($protocol => array('method' => 'GET','header' => "User-Agent: Lunasys\r\n"));
		
		// ストリームコンテキストを生成
		$context = stream_context_create($stream);
		
		// ファイルデータを読み込み
		$url_d = @file_get_contents($url,false,$context);
		
		// データが取得出来なかった時
		if(!$url_d)
		{
			
			// リンク元クラスを読み込み
			include($work_dir . '/modules/referrer.php');
			
			// ページデータ（HTML）を取得
			$url_d = Referrer::socket($url);
			
			// リクエストヘッダーを削除
			$url_d = preg_replace("/^[^<]*|[^>]*$/",'',$url_d);
			
		}
		
		// データが取得出来なかった時は終了
		if(!$url_d){exit($no_data);}
		
		// URLを絶対パスに変換
		$url_d = preg_replace_callback('/(href|src)(=")([^>]*\.)(.{1,4})("[^>]*>)/i','path',$url_d);
		
		// <head>にCSSを挿入
		$url_d = preg_replace('/<\/head>/i',$css,$url_d);
		
		// <body>にJavaScriptを挿入
		$url_d = preg_replace('/<\/body>/i',$js,$url_d);
		
		// EUC-JP|Shift_JISの時は文字コードヘッダーを送信
		if(preg_match('/charset=\"?(EUC-JP|Shift_JIS)/i',$url_d,$h)){header("Content-type: text/html; charset=$h[1]");}
		
		// ページデータを出力
		echo $url_d;
		
	}
	
	
	//---------------------------------------------------------
	//  URL省略/整形
	//---------------------------------------------------------
	
	static function url_path($url)
	{
		
		// 「http://」「https://」を削除
		$url = preg_replace('/(http|https):\/\//','',$url);
		
		// 末尾のファイル名は削除
		$url = preg_replace('/\/[^\/]+\..+/','/',$url);
		
		// URLを返す
		return $url;
		
	}
	
}
	
	
	//---------------------------------------------------------
	//  絶対パス算出
	//---------------------------------------------------------
	
	function path($value)
	{
		
		// グローバル変数を定義
		global $args;
		
		// 基準パスを取得
		$base_url = $args['base_url'];
		
		// プロトコルを取得
		$protocol = $args['protocol'];
		
		// 絶対パスを取得
		$value[3] = file_path($base_url,$value[3],$protocol);
		
		// 先頭の要素を削除
		array_shift($value);
		
		// 配列を繋いで返す
		return implode('',$value);
		
	}
	
	
	//---------------------------------------------------------
	//  絶対パス算出（詳細）
	//---------------------------------------------------------
	
	function file_path($base_url,$file,$protocol)
	{
		
		// 「./」を削除
		$file = preg_replace('/^\.\//','',$file);
		
		// 絶対パスの時
		if(preg_match('/^(http|https):/',$file)){return $file;}
		
		// ファイル名のみの時
		elseif(preg_match('/^\w/',$file)){return $protocol . '://' . $base_url . $file;}
		
		// 「/」から始まるURLの時
		elseif(preg_match('/^\//',$file))
		{
			
			// URLを解析
			$purl = parse_url($protocol . '://' . $base_url);
			
			// ホスト名を取得
			$host = $purl['host'];
			
			// 絶対パスを返す
			return $protocol . '://' . $host . $file;
			
		}
		
		// 基準URLを「/」で分割
		$path = explode('/',$base_url);
		
		// 対象パスを「../」で分割
		$file_path = explode('../',$file);
		
		// 戻る階層数を取得
		$back_cnt = count($file_path);
		
		// 先頭の要素を削除
		$last_path = array_pop($file_path);
		
		// 戻る階層数だけループ
		for($i = 0;$i < $back_cnt;$i++){array_pop($path);}
		
		// 絶対パスを整形
		$file = $protocol . '://' . implode('/',$path) . '/' . $last_path;
		
		// 絶対パスを返す
		return $file;
		
	}
	
