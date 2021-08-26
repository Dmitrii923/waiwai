<?php

class Param_Daily
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(true,true,'header','footer');
		
	}
	
	
	//---------------------------------------------------------
	//  日別統計表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// ジャンプパスを定義
		$jump_php = 'http://act.st/api/jump.php/';
		//$jump_php = $scr_php . '/jump/';
		
		// jump.phpのURLを定数にセット
		define('jump_php',$jump_php);
		
		// 年月日を取得
		$y = $args['y'];
		$m = $args['m'];
		$d = $args['d'];
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){return;}
		
		// DBに接続
		$db->attach($t_db,'t');
		
		////////////////////////////////////////////////////////////
		
		// テンプレートを分割
		list($head,$main,$foot) = $tmpl->read('param_daily.htm');
		
		// 対象パラメータを取得
		$param = (isset($args[1])) ? $args[1] : 'referrer';
		
		// 変数を初期化
		$replace = '';
		$column  = '';
		$where   = '';
		$from    = '';
		$slash   = '/';
		
		// 対象日付を定義
		$t_date = $y . '-' . $m . '-' . $d;
		
		// 詳細ログテーブル名を定義
		$d_table = $prefix . '_d_' . $y . '_' . $m;
		
		// リンク用年月日を定義
		$ymd = $y . '/' . $m . '/' . $d;
		
		// テンプレート変数を初期化
		$v = array();
		
		// ヘッダーテンプレートを出力
		$tmpl->view($head);
		
		// 置換関数があるときはセット
		if(method_exists('Param_Daily','replace_' . $param)){$replace = 'replace_' . $param;}
		
		////////////////////////////////////////////////////////////
		
		// その他統計の時
		if($param === 'all'){self::all_view($tmpl,$main,$foot,$ymd);return;}
		
		// ページ統計の時
		elseif($param === 'page' or $param === 'click'){self::page_view($db,$tmpl,$ymd,$param,$d_table,$t_date,$main,$foot);return;}
		
		// リンク元統計の時
		elseif($param === 'referrer'){list($replace,$column,$where,$from) = self::referrer($prefix);}
		
		// UAの時
		elseif($param === 'ua'){$where = "and ua_type != 'Robot'";}
		
		////////////////////////////////////////////////////////////
		
		// SQLを定義
		$q = "select $param as name,count($param) as cnt $column from $d_table $from where a_date = '$t_date' and $param != '' $where group by $param order by cnt desc;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// DBと切断
		$db->close();
		
		// 簡易検索用リンクを定義
		$link = "$scr_php/detail_search/$param/$ymd";
		
		// ループカウンタ
		$i = 1;
		
		// 詳細ログを表示するループ
		while($v = $db->fetch($r))
		{
			
			// 簡易検索リンクを定義
			$v['cnt'] = '<a href="' . $link . '/' . $v['name'] . $slash . '">' . $v['cnt'] . '</a>';
			
			// 表示文字列を置換
			if($replace){$v['name'] = self::$replace($v);}
			
			// 色分け用class属性を定義
			$v['tr'] = ($i % 2 === 0) ? 2 : 1;
			
			// 順位を取得
			$v['i'] = $i;
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
			// カウンタを1増加
			$i++;
			
		}
		
		// フッターテンプレートを出力
		$tmpl->view($foot);
		
	}
	
	
	//---------------------------------------------------------
	//  リンク元
	//---------------------------------------------------------
	
	static function referrer($prefix)
	{
		
		// リンク設定を定義
		$replace = 'replace_referrer';
		
		// カラム名を定義
		$column = ",title,url";
		
		// where句を定義
		$where = " and referrer = no";
		
		// リンク元テーブル名を定義
		$from = ',' . $prefix . '_referrer';
		
		// リンク設定、SQL文を返す
		return array($replace,$column,$where,$from);
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換：UA
	//---------------------------------------------------------
	
	static function replace_ua($v)
	{
		
		// 文字数を制限
		return mb_strimwidth($v['name'],0,80,'...','UTF-8');
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換：訪問回数
	//---------------------------------------------------------
	
	static function replace_visit($v)
	{
		
		// 文字を整形
		return $v['name'] . '回目';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換：検索語
	//---------------------------------------------------------
	
	static function replace_search_words($v)
	{
		
		// リンクを整形
		return '<a href="' . jump_php . 'http://www.google.co.jp/' . '::' . $v['name'] . '" class="out">' . $v['name'] . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換：ドメイン
	//---------------------------------------------------------
	
	static function replace_host_domain($v)
	{
		
		// unknownの時はそのまま返す
		if($v['name'] === 'unknown'){return $v['name'];}
		
		// リンクを整形
		return '<a href="' . jump_php . 'http://www.' . $v['name'] . '/" class="out">' . $v['name'] . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換：リンク元
	//---------------------------------------------------------
	
	static function replace_referrer($v)
	{
		
		// リンクを整形
		return '<a href="' . jump_php . $v['url'] . '" class="out">' . mb_strimwidth($v['title'],0,80,'...','UTF-8') . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  ページ統計
	//---------------------------------------------------------
	
	static function page_view($db,$tmpl,$ymd,$param,$d_table,$t_date,$main,$foot)
	{
		
		// グローバル変数を定義
		global $path;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// 変数を初期化
		$where  = '';
		$pns    = array();
		$urls   = array();
		$titles = array();
		
		// テーブル名を定義
		$n_table = $prefix . '_' . $param;
		
		// 簡易検索用リンクを定義
		$link = "$scr_php/detail_search/$param/$ymd";
		
		// 対象カラム名を定義
		$param .= '_route';
		
		// SQLを定義
		$q = "select no,url,title from $n_table;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// SQLを定義
		$q = "select count(no) as cnt from $n_table;";
		
		// レコード数を取得
		$rows = $db->query_fetch($q,'cnt');
		
		// データが存在しない時
		if(!$rows){$tmpl->view($foot);return false;}
		
		// データレコード取得ループ
		while($a = $db->fetch($r))
		{
			
			// Noを取得
			$no = $a['no'];
			
			// リンクタイトルを配列にセット
			$titles[$no] = '<a href="' . jump_php . $a['url'] . '"  class="out">' . mb_strimwidth($a['title'],0,80,'...','UTF-8') . '</a>';
			
		}
		
		// SQLを定義
		$q = "select $param as param,count($param) as cnt from $d_table where a_date = '$t_date' and $param != '' group by $param;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// 詳細ログを表示するループ
		while($a = $db->fetch($r))
		{
			
			// 別名で変数を保持
			$ns = explode('-',$a['param']);
			
			// カウント数を連想配列にセット
			foreach($ns as $n){$pns[$n] = (isset($pns[$n])) ? $pns[$n] + $a['cnt'] : $a['cnt'];}
			
		}
		
		// ループカウンタ
		$i = 1;
		
		// 降順でソート
		if($pns){arsort($pns);}
		
		// 表示ループ
		foreach($pns as $key => $val)
		{
			
			// タイトルが存在しない時は次へ
			if(!isset($titles[$key])){continue;}
			
			// 色分け用class属性を定義
			$v['tr'] = ($i % 2 === 0) ? 2 : 1;
			
			// 順位を取得
			$v['i'] = $i;
			
			// 項目名を定義
			$v['name'] = $titles[$key];
			
			// 簡易検索リンクを定義
			$v['cnt'] = '<a href="' . $link . '/' . $key . '/' . '">' . $val . '</a>';
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
			// カウンタを1増加
			$i++;
			
		}
		
		// フッターテンプレートを出力
		$tmpl->view($foot);
		
	}
	
	
	//---------------------------------------------------------
	//  その他統計項目一覧表示
	//---------------------------------------------------------
	
	static function all_view($tmpl,$main,$foot,$ymd)
	{
		
		// グローバル変数を定義
		global $path,$conf;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// タイトルiniファイルを解析
		$title = parse_ini_file($work_dir . '/templates/ini/title.ini');
		
		// 詳細ログパラメータ配列を定義
		$params = array
		(
			
			'referrer',
			'click',
			'page',
			'search_words',
			'visit',
			'os',
			'ua',
			'host_domain',
			'ip_address',
			'remote_host',
			'client_size',
			'display_size'
			
		);
		
		// テンプレート変数を初期化
		$v['cnt'] = '';
		
		// ループカウンタ
		$i = 1;
		
		// 詳細ログを表示するループ
		foreach($params as $key)
		{
			
			// 表示項目名を取得
			$val = $title[$key];
			
			// シーケンス番号を設定
			$v['i'] = $i;
			
			// 色分け用class属性を定義
			$v['tr'] = ($i % 2 === 0) ? 2 : 1;
			
			// リンクを定義
			$link = "$scr_php/param_daily/$key/$ymd/";
			
			// リンクを整形
			$v['name'] = '<a href="' . $link . '">' . $val . '</a>';
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
			// カウンタを1増加
			$i++;
			
		}
		
		// フッターテンプレートを出力
		$tmpl->view($foot);
		
	}
	
}

