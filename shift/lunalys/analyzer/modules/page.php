<?php

class Page
{
	
	//---------------------------------------------------------
	//  ページ番号を取得
	//---------------------------------------------------------
	
	static function page_no($db,$prefix,$conf)
	{
		
		// URLを取得
		$url = (isset($_GET['url'])) ? $_GET['url'] : $_SERVER['REQUEST_URI'];
		
		// 絶対URLの時
		if(preg_match('/(http|https):/A',$url))
		{
			
			// キャッシュからアクセスの時
			if(preg_match('/cache/',$url))
			{
				
				// URLを切り出し
				if(preg_match('/q=cache:[^:]+:(https:[^&\+ ]+)/',$url,$h)){$url = urldecode($h[1]);}
				elseif(preg_match('/cache\?.+&u=(https[^&]+)/'  ,$url,$h)){$url = urldecode($h[1]);}
				elseif(preg_match('/q=cache:[^:]+:([^&\+ ]+)/'  ,$url,$h)){$url = 'http://' . urldecode($h[1]);}
				elseif(preg_match('/cache\?.+&u=([^&]+)/'       ,$url,$h)){$url = 'http://' . urldecode($h[1]);}
				
			}
			
			// ドメイン設定がある場合
			if($conf['domain'])
			{
				
				// ドメインを取得
				$domain = $conf['domain'];
				
				// 対象ドメイン外は除外する
				if(!preg_match("/(http|https):\/\/[^\/]*($domain)/Ai",$url)){return 0;}
				
			}
			
			// プロトコルを取得
			$protocol = (preg_match('/https:/A',$url)) ? 'https' : 'http';
			
		}
		
		// 相対URLの時
		else
		{
			
			// プロトコルを取得
			$protocol = (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] === 'off') ? 'http' : 'https';
			
			// 絶対URLに変換する
			$url = $protocol . '://' . $_SERVER['HTTP_HOST'] . $url;
			
		}
		
		// tracker.js/write.phpが含まれる時は除外する
		if(preg_match("/analyzer\/(tracker\.js|write\.php)|[<>]/",$url)){return 0;}
		
		// URLを整形
		$url = Logging::rewrite_url($url,$conf);
		
		////////////////////////////////////////////////////////////
		
		// Page Noテーブル名を定義
		$n_table = $prefix . '_page';
		
		// URLを別名で保持
		$org_url = $url;
		
		// URLをエスケープ
		$url = $db->escape($url);
		
		// SQLを定義
		$q = "select no from $n_table where url = $url;";
		
		// SQLを実行
		$no = $db->query_fetch($q,'no');
		
		// データが存在する時はNoを返す
		if($no){return $no;}
		
		// SQLを定義
		$q = "select max(no) as max from $n_table;";
		
		// SQLを実行
		$max = $db->query_fetch($q,'max');
		
		// Page No を取得
		$no = ($max) ? $max + 1 : 1;
		
		////////////////////////////////////////////////////////////
		
		// タイトルを取得
		$title = (isset($_GET['title'])) ? $_GET['title'] : self::page_title($org_url,$protocol);
		
		// ページが存在しない時は終了
		if(!$title){return 0;}
		
		// ページタイトルをWeb用にエンコード
		$title = Logging::web_encode(trim($title));
		$title = preg_replace('/&amp;/','&' ,$title);
		
		// URLをエスケープ
		$title = $db->escape($title);
		
		// SQLを定義
		$q = "insert into $n_table (no,url,title) values ($no,$url,$title);";
		
		// SQLを実行
		$db->query($q);
		
		// Page No を返す
		return $no;
		
	}
	
	
	//---------------------------------------------------------
	//  HTMLからページタイトルを取得
	//---------------------------------------------------------
	
	static function page_title($url,$protocol)
	{
		
		// ストリーム配列を定義
		$stream = array($protocol => array('method' => 'GET','header' => "User-Agent: Lunalys\r\n"));
		
		// ストリームコンテキストを生成
		$context = stream_context_create($stream);
		
		// ファイルデータを読み込み
		$url_d = @file_get_contents($url,false,$context);
		
		// 存在しないページの時
		if(!$url_d){return;}
		
		// ページタイトルを切り出し
		$title = (preg_match('/<title>([^<>]+)</i',$url_d,$h)) ? $h[1] : $url;
		
		// タイトルを返す
		return $title;
		
	}
	
}

