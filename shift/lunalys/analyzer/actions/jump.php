<?php

class Jump
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(false,false,false,false);
		
	}
	
	
	//---------------------------------------------------------
	//  URLジャンプ
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// リファラを取得
		$referrer = preg_replace("/.*\/jump\//","",$_SERVER['REQUEST_URI']);
		
		// リファラが存在しない時は空欄を返す
		if(!$referrer){return;}
		
		// 文字コードをUTF-8に変換
		$referrer = mb_convert_encoding($referrer,'UTF-8','auto');
		
		// リファラをURLと検索語に分割
		$urls = explode('::',$referrer);
		
		// URLを取得
		$url = $urls[0];
		
		// 検索語が無い時
		if(!isset($urls[1]))
		{
			
			// URL引数が存在する時
			if(preg_match('/([^\?]+\?)(.*)/',$url,$h)){$url = $h[1] . self::utfdecode($h[2]);}
			
			// ジャンプ用ヘッダーを出力
			header("Refresh: 0; URL=$url");
			
			// 終了
			return;
			
		}
		
		// リンクテキストを整形
		$text = $url . ' ' .  urldecode($urls[1]);
		
		// 検索語を取得
		$words = self::utfencode($urls[1]);
		
		// 実体参照文字列を変換
		$words = stripslashes($words);
		
		// 変数を初期化
		$encoding = '';
		
		// 文字コードがShift-JISのサイトの時
		if(preg_match("/(excite|biglobe|auone)/",$url,$h)){$encoding = 'SJIS';}
		
		// 文字コードがEUC-JPのサイトの時
		elseif(preg_match("/hatena|goo\.ne|livedoor|docomo/",$url,$h)){$encoding = 'EUC-JP';}
		
		// 未知の検索エンジンの時
		elseif(preg_match('/\?/',$url)){$encoding = self::get_encoding($url);}
		
		// 文字エンコーディングの指定が存在する時
		if($encoding)
		{
			
			// 文字エンコーディングを変更
			$words = urldecode($words);
			$words = mb_convert_encoding($words,$encoding,'auto');
			$words = urlencode($words);
			
		}
		
		// Googleの時1
		if(preg_match("/google.co.jp/",$url))    {$url = 'http://www.google.co.jp/search?hl=ja&ie=UTF-8&q=';}
		
		// Googleの時2
		elseif(preg_match("/google.com/",$url))  {$url = 'http://www.google.com/search?hl=ja&ie=UTF-8&q=';}
		
		// Bingの時
		elseif(preg_match("/bing.com/",$url))    {$url = 'http://www.bing.com/search?q=';}
		
		// Yahoo!の時
		elseif(preg_match("/search.yahoo/",$url)){$url = 'http://search.yahoo.co.jp/search?p=';}
		
		// 百度の時
		elseif(preg_match("/baidu/",$url))       {$url = 'http://www.baidu.jp/s?ie=utf-8&wd=';}
		
		// gooの時
		elseif(preg_match("/goo/",$url))         {$url = 'http://search.goo.ne.jp/web.jsp?MT=';}
		
		// infoseekの時
		elseif(preg_match("/infoseek/",$url))    {$url = 'http://search.www.infoseek.co.jp/Web?qt=';}
		
		// exciteの時
		elseif(preg_match("/excite/",$url))      {$url = 'http://www.excite.co.jp/search.gw?lang=jp&search=';}
		
		// livedoorの時
		elseif(preg_match("/livedoor/",$url))    {$url = 'http://search.livedoor.com/search/?q=';}
		
		// はてなの時
		elseif(preg_match("/hatena/",$url))      {$url = 'http://search.hatena.ne.jp/websearch?word=';}
		
		// @niftyの時
		elseif(preg_match("/nifty/",$url))       {$url = 'http://search.nifty.com/websearch/search?cflg=検索&q=' ;}
		
		// BIGLOBEの時
		elseif(preg_match("/biglobe/",$url))     {$url = 'http://cgi.search.biglobe.ne.jp/cgi-bin/search2-b?q=';}
		
		// So-netの時
		elseif(preg_match('/so-net/',$url))      {$url = 'http://www.so-net.ne.jp/search/web/?query=';}
		
		// docomoの時
		elseif(preg_match('/docomo/',$url))      {$url = 'http://search.goo.ne.jp/web.jsp?MT=';}
		
		// auの時
		elseif(preg_match('/auone/',$url))       {$url = 'http://search.auone.jp/?q=';}
		
		// Luna Searchの時
		elseif(preg_match("/luna.tv/",$url))     {$url = 'http://s.luna.tv/search.aspx?q=';}
		
		// conduitの時
		elseif(preg_match('/conduit/',$url))     {$url = 'http://search.conduit.com/Results.aspx?q=';}
		
		// babylonの時
		elseif(preg_match('/babylon/',$url))     {$url = 'http://search.babylon.com/?q=';}
		
		// URLに検索語を追記
		$url .= $words;
		
		// ジャンプ用ヘッダーを出力
		header("Refresh: 0; URL=$url");
		
	}
	
	
	//---------------------------------------------------------
	//  文字エンコーディングを取得
	//---------------------------------------------------------
	
	function get_encoding($url)
	{
		
		// HTMLデータを取得
		$url_d = @file_get_contents($url . 'Lunalys');
		
		// UTF-8|EUC-JP|Shift_JISの時
		if(preg_match('/(UTF-8|EUC-JP|Shift_JIS)/i',$url_d,$h)){$encoding = $h[1];}
		
		// その他の時
		else{$encoding = '';}
		
		// 文字エンコーディングを返す
		return $encoding;
		
	}
	
	
	//---------------------------------------------------------
	//  UTF-8デコード
	//---------------------------------------------------------
	
	function utfdecode($words)
	{
		
		// URLエンコード
		$words = urlencode($words);
		
		// 特殊記号をを元に戻す
		$words = preg_replace("/%3D/",'=',$words);
		$words = preg_replace("/%26/",'&',$words);
		//$words = preg_replace("/%3A/",':',$words);
		//$words = preg_replace("/%2F/",'/',$words);
		//$words = preg_replace("/%20/",' ',$words);
		
		// 変換後の文字列を返す
		return $words;
		
	}
	
	
	//---------------------------------------------------------
	//  UTF-8エンコード
	//---------------------------------------------------------
	
	function utfencode($words)
	{
		
		// 特殊記号を変換
		$words = preg_replace("/'/" ,'%22',$words);
		$words = preg_replace("/#/" ,'%23',$words);
		$words = preg_replace("/:/" ,'%3A',$words);
		$words = preg_replace("/;/" ,'%3B',$words);
		$words = preg_replace("/\*/",'%2A',$words);
		$words = preg_replace("/\+/",'%2B',$words);
		$words = preg_replace("/\-/",'%2D',$words);
		
		// 変換後の文字列を返す
		return $words;
		
	}
	
}

