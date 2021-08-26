<?php

class Referrer
{
	
	//---------------------------------------------------------
	//  検索エンジン・検索語解析 関数
	//---------------------------------------------------------
	
	static function ref_words($db,$prefix,$referrer,$conf)
	{
		
		// 特殊文字を変換
		$referrer = preg_replace("/%25/",'%',$referrer);
		$referrer = preg_replace("/%2B/",'+',$referrer);
		
		// URLデコード
		$referrer = urldecode($referrer);
		
		// Web用にエンコード
		$referrer = Logging::web_encode($referrer);
		
		// Googleキャッシュの時
		if(preg_match('/q=cache:[^ ]* ([^&]*)&/',$referrer,$h))          {$referrer = 'http://www.google.co.jp/';}
		
		// Googleの時
		elseif(preg_match('/google.*[^\w]q=([^&]*)/',$referrer,$h))      {$referrer = 'http://www.google.co.jp/';}
		
		// Googleの時2
		elseif(preg_match('/google.*(url|imgres)\?/',$referrer,$h))      {$referrer = 'http://www.google.co.jp/';$h[1] = 'not provided';}
		
		// Yahooの時
		elseif(preg_match('/yahoo.*[^\w]p=([^&]*)/',$referrer,$h))       {$referrer = 'http://search.yahoo.co.jp/';}
		
		// Bingの時
		elseif(preg_match('/bing.*[^\w]q=([^&]*)/',$referrer,$h))        {$referrer = 'http://www.bing.com/';}
		
		// 百度の時
		elseif(preg_match('/baidu.*[^\w]wd=([^&]*)/',$referrer,$h))      {$referrer = 'http://www.baidu.jp/';}
		
		// gooの時
		elseif(preg_match('/goo.*[^\w]MT=([^&]*)/',$referrer,$h))        {$referrer = 'http://search.goo.ne.jp/';}
		
		// infoseekの時
		elseif(preg_match('/infoseek.*[^\w]qt=([^&]*)/',$referrer,$h))   {$referrer = 'http://search.www.infoseek.co.jp/';}
		
		// exciteの時
		elseif(preg_match('/excite.*[^\w]search=([^&]*)/',$referrer,$h)) {$referrer = 'http://www.excite.co.jp/';}
		
		// livedoorの時
		elseif(preg_match('/livedoor.*[^\w]q=([^&]*)/',$referrer,$h))    {$referrer = 'http://search.livedoor.com/';}
		
		// はてなの時
		elseif(preg_match('/hatena.*[^\w]word=([^&]*)/',$referrer,$h))   {$referrer = 'http://search.hatena.ne.jp/';}
		
		// 楽天の時
		elseif(preg_match('/rakuten.*[^\w]qt=([^&]*)/',$referrer,$h))    {$referrer = 'http://search.www.infoseek.co.jp/';}
		
		// @niftyの時
		elseif(preg_match('/nifty.*[^\w]q=([^&]*)/',$referrer,$h))       {$referrer = 'http://search.nifty.com/';}
		
		// @niftyの時2
		elseif(preg_match('/nifty.*[^\w]Text=([^&]*)/',$referrer,$h))    {$referrer = 'http://search.nifty.com/';}
		
		// Azby Club 富士通の時
		elseif(preg_match('/azby.*[^\w]Text=([^&]*)/',$referrer,$h))     {$referrer = 'http://azby.nifty.com/';}
		
		// BIGLOBEの時
		elseif(preg_match('/biglobe.*[^\w]q=([^&]*)/',$referrer,$h))     {$referrer = 'http://search.biglobe.ne.jp/';}
		
		// So-netの時
		elseif(preg_match('/so-net.*[^\w]query=([^&]*)/',$referrer,$h))  {$referrer = 'http://www.so-net.ne.jp/';}
		
		// docomoの時
		elseif(preg_match('/docomo.*[^\w]key=([^&]*)/',$referrer,$h))    {$referrer = 'http://www.nttdocomo.co.jp/';}
		
		// auの時
		elseif(preg_match('/auone.*[^\w]q=([^&]*)/',$referrer,$h))       {$referrer = 'http://search.auone.jp/';}
		
		// auの時2
		elseif(preg_match('/ezweb.*[^\w]query=([^&]*)/',$referrer,$h))   {$referrer = 'http://www.google.co.jp/';}
		
		// Luna Searchの時
		elseif(preg_match('/luna\.tv.*[^\w]q=([^&]*)/',$referrer,$h))    {$referrer = 'http://s.luna.tv/';}
		
		// conduitの時
		elseif(preg_match('/conduit.*[^\w]q=([^&]*)/',$referrer,$h))     {$referrer = 'http://search.conduit.com/';}
		
		// babylonの時
		elseif(preg_match('/babylon.*[^\w]q=([^&]*)/',$referrer,$h))     {$referrer = 'http://search.babylon.com/';}
		
		// babylonの時2
		elseif(preg_match('/babylon\.com\/web\/([^\?]*)/',$referrer,$h)) {$referrer = 'http://search.babylon.com/';}
		
		// その他検索エンジンの時
		elseif(preg_match('/(.+\?).*(q|query|key|keyword|keywords|MT)=([^&]*)/i',$referrer,$h)) {$referrer = $h[1] . $h[2] . '=';$h[1] = $h[3];}
		
		// 検索語をセット
		$search_words = (isset($h[1])) ? $h[1] : '';
		
		// 検索語が存在する時
		if($search_words)
		{
			
			// 検索語のスペースを整形
			$search_words = preg_replace('/　|[\s]/',' ',$search_words);
			$search_words = preg_replace('/ +/'     ,' ',$search_words);
			
		}
		
		// リンク元No,検索語を返す
		return self::ref_no($db,$prefix,$referrer,$search_words,$conf);
		
	}
	
	
	//---------------------------------------------------------
	//  referrerテーブルの更新
	//---------------------------------------------------------
	
	static function ref_no($db,$prefix,$referrer,$search_words,$conf)
	{
		
		// リンク元テーブル名を定義
		$n_table = $prefix . '_referrer';
		
		// ドメインを取得
		$domain = $conf['domain'];
		
		// 変数を別名で保持
		$org_referrer = $referrer;
		
		// 検索語が存在しない時はURLを整形
		if(!$search_words){$referrer = Logging::rewrite_url($referrer,$conf,true);}
		
		// URLをエスケープ
		$referrer = $db->escape($referrer);
		
		// SQLを定義
		$q = "select no from $n_table where url = $referrer;";
		
		// SQLを実行
		$no = $db->query_fetch($q,'no');
		
		// ページURLが存在する場合
		if($no){return array($no,$search_words);}
		
		// HTMLデータを取得
		$referrer_d = self::file_data($org_referrer);
		
		// 検索エンジンではない時
		if(!$search_words and $domain)
		{
			
			// リファラスパムは除外する
			if(!preg_match("/(http|https):\/\/[^\/]*($domain)/i",$referrer_d)){return array('','');}
			
		}
		
		// ページタイトルを切り出し
		if(preg_match('/<title>([^<>]+)</i',$referrer_d,$h))
		{
			
			// タイトルをWeb用にエンコード
			$title = Logging::web_encode(trim($h[1]));
			$title = preg_replace('/&amp;/','&' ,$title);
			
			// スペースの連続の場合はURLをセット
			if(!preg_match('/[^　\s]+/i',$title)){$title = $org_referrer;}
			
		}
		
		// ページタイトルが不明の時はURLをセット
		else{$title = $org_referrer;}
		
		// タイトルをエスケープ
		$title = $db->escape($title);
		
		////////////////////////////////////////////////////////////
		
		// SQLを定義
		$q = "select max(no) as max from $n_table;";
		
		// SQLを実行
		$max = $db->query_fetch($q,'max');
		
		// データが存在する時
		$no = ($max) ? $max + 1 : 1;
		
		// SQLを定義
		$q = "insert into $n_table (no,url,title) values ($no,$referrer,$title);";
		
		// SQLを実行
		$db->query($q);
		
		// リンク元No,検索語を返す
		return array($no,$search_words);
		
	}
	
	
	//---------------------------------------------------------
	//  HTMLデータの取得
	//---------------------------------------------------------
	
	static function file_data($referrer)
	{
		
		// ファイルデータを取得
		$data = @file_get_contents($referrer);
		
		// 外部URLが開けない時
		if(!$data){$data = self::socket($referrer);}
		
		// ファイルデータを返す
		return $data;
		
	}
	
	
	//---------------------------------------------------------
	//  HTMLデータの取得（socket）
	//---------------------------------------------------------
	
	static function socket($referrer)
	{
		
		// 変数を初期化
		$res  = '';
		
		// 送信先データを取得
		$purl = @parse_url($referrer);
		$host = (isset($purl["host"])) ? $purl["host"] : '';
		$port = 80;
		
		// ソケットを開く
		$fp = @fsockopen($host,$port,$err_no,$err_msg,10);
		
		// ソケットが開けなかった時
		if(!$fp){return '';}
		
		// 送信データを整形
		$req = <<<_REQUEST_
GET $referrer HTTP/1.1
User-Agent: Lunalys
Host: $host
Connection: Close


_REQUEST_;
		
		// データを送信
		fputs($fp,$req);
		
		// レスポンスを取得
		while(!feof($fp)){$res .= fgetc($fp);}
		
		// ソケットを閉じる
		fclose($fp);
		
		// レスポンスを返す
		return $res;
		
	}
	
}

