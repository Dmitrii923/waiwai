<?php

class Click
{
	
	//---------------------------------------------------------
	//  リンク先追記
	//---------------------------------------------------------
	
	static function click_link($db,$where,$d_table,$i_table,$prefix,$conf)
	{
		
		// フラグを初期化
		$update = true;
		
		// トランザクション開始
		$db->begin('immediate');
		
		// Noを取得
		$click_no = self::click_no($db,$prefix,$conf);
		
		// SQLを定義
		$q = "select seq,click_route from $d_table $where;";
		
		// SQLを実行
		$a = $db->query_fetch($q);
		
		// データが存在しない時
		if(!$a or !$click_no){$update = false;}
		
		// クリックルートが存在する時
		elseif($a['click_route'])
		{
			
			// ページ番号を分割
			$click_nos = explode('-',$a['click_route']);
			
			// PV総数を取得
			$cnt_ps = count($click_nos);
			
			// 配列の最終indexを算出
			$last_click_no = $cnt_ps - 1;
			
			// リロードの時は終了
			if($click_no == $click_nos[$last_click_no]){$update = false;}
			
			// クリックルートにクリック番号を追加
			$click_route = $a['click_route'] . '-' . $click_no;
			
		}
		
		// クリックルートが存在しない時
		else{$click_route = $click_no;}
		
		// 更新フラグがfalseの時
		if(!$update){return Logging::close($db,'rollback');}
		
		// シークエンスを取得
		$seq = $a['seq'];
		
		// SQLを定義
		$q = "update $d_table set click_route = '$click_route' where seq = $seq;";
		
		// SQLを実行
		$db->query($q);
		
		// パラメータ統計テーブルを更新
		Logging::update_i_table($db,$i_table,'click',$click_no);
		
		// DB接続終了
		Logging::close($db);
		
	}
	
	
	//---------------------------------------------------------
	//  クリックNoを取得
	//---------------------------------------------------------
	
	static function click_no($db,$prefix,$conf)
	{
		
		// URLを取得
		$url = (isset($_GET['url'])) ? strip_tags($_GET['url']) : '';
		
		// タイトルを取得
		$title = (isset($_GET['title'])) ? strip_tags($_GET['title']) : '';
		
		// タイトルの前後の空白を削除
		$title = trim($title);
		
		// サーバーのドメインを取得
		$http_host = $_SERVER['HTTP_HOST'];
		
		// 内部リンクか外部リンクか判定
		$out = (preg_match("/(http|https):\/\/[^\/]*($http_host)/A",$url)) ? false : true;
		
		// URLを整形
		$url = Logging::rewrite_url($url,$conf,$out);
		
		// URLが存在しない時0を返す
		if(!$url){return 0;}
		
		// タイトルが存在しない時はURLをセット
		elseif(!$title){$title = $url;}
		
		////////////////////////////////////////////////////////////
		
		// Noテーブル名を定義
		$n_table = $prefix . '_click';
		
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
		
		// URLをエスケープ
		$title = $db->escape($title);
		
		// SQLを定義
		$q = "insert into $n_table (no,url,title) values ($no,$url,$title);";
		
		// SQLを実行
		$db->query($q);
		
		// Page No を返す
		return $no;
		
	}
	
}

