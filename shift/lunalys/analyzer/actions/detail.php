<?php

class Detail
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
	//  詳細ログ表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// 最大表示件数を取得
		$detail_limit = $conf['detail_limit'];
		
		// オプションを取得
		$opt = $args['opt'];
		
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
		
		// 詳細ログテーブル名を定義
		$d_table = $prefix . '_d_' . $y . '_' . $m;
		
		// 対象日付を定義
		$t_date = $y . '-' . $m . '-' . $d;
		
		// 変数を初期化
		$where = '';
		$limit = '';
		$param = '';
		$start = 0;
		
		////////////////////////////////////////////////////////////
		
		// 引数の数を取得
		$args_cnt = count($args);
		
		// 引数が存在しない時
		if($args_cnt === 2){$limit = "limit $detail_limit";}
		
		// 引数が存在する時
		else{list($opt,$start,$where,$limit) = self::opt_filter($opt,$detail_limit);}
		
		// ロボットフィルターではない時
		if($opt !== 'robot'){$where .= " and ua_type != 'Robot'";}
		
		////////////////////////////////////////////////////////////
		
		// メイン,ナビリンク,フッター テンプレートを取得
		list($main,$navi_link,$footer) = $tmpl->read('detail.htm');
		
		// SQLを定義
		$q = "select * from $d_table where a_date = '$t_date' $where order by l_time desc $limit;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// SQLを定義
		$q = "select count(ip_address) as cnt from $d_table where a_date = '$t_date' $where;";
		
		// 総数を取得
		$all_rows = $db->query_fetch($q,'cnt');
		
		// 開始カウント数を定義
		$seq = $all_rows - $start;
		
		// レスポンスを出力
		self::view($db,$tmpl,$main,$r,$seq,$work_dir,$scr_php,$prefix,$opt);
		
		////////////////////////////////////////////////////////////
		
		// フッターテンプレートをグローバル変数にセット
		$args['content_all'] = $tmpl->res($footer,$path);
		
		// 表示制限が存在する時
		if($limit and $all_rows > $detail_limit)
		{
			
			// リンクを定義
			$link = 'href="' . "$scr_php/detail/$y/$m/$d/";
			
			// ナビリンクデータを取得
			$v = self::navi_link($link,$all_rows,$start,$detail_limit);
			
			// ナビリンクを出力
			$args['content_all'] .= $tmpl->res($navi_link,$v);
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  メイン出力
	//---------------------------------------------------------
	
	static function view($db,$tmpl,$main,$r,$seq,$work_dir,$scr_php,$prefix,$opt)
	{
		
		// ジャンプパスを定義
		$jump_php = 'http://act.st/api/jump.php/';
		//$jump_php = $scr_php . '/jump/';
		
		// リファラタイトルを取得
		$ref_titles = self::ref_titles($db,$prefix);
		
		// ページタイトルを取得
		$page_titles = self::page_titles($db,$prefix);
		
		// スマホリストを取得
		$sp_titles = parse_ini_file($work_dir . '/templates/ini/mobile.ini');
		
		// OSリストを取得
		$os_titles = parse_ini_file($work_dir . '/templates/ini/os.ini');
		
		// DBと切断
		if($opt !== 'id'){$db->close();}
		
		// 詳細ログを表示するループ
		while($v = $db->fetch($r))
		{
			
			// カウント数を定義
			$v['seq'] = $seq;
			
			// リンク元が存在する時
			if($v['referrer'])
			{
				
				// 別名で変数を保持
				$referrer = $v['referrer'];
				
				// 検索語を取得
				$search_words = $v['search_words'];
				
				// リンク元データが存在しない時は「Undefined」を表示
				if(!isset($ref_titles[$referrer])){$v['referrer'] = 'Undefined';}
				
				// リンク元データが存在する時
				else
				{
					
					// リンク元データを取得
					$ref_url   = $ref_titles[$referrer]['url'];
					$ref_title = $ref_titles[$referrer]['title'];
					
					// 検索語が存在する時
					if($search_words)
					{
						
						// 検索語を取得
						$ref_title .= ' / ' . $search_words;
						
						// 「"」を「'」に変換
						$ref_url .= '::' . preg_replace('/\"/',"'",$search_words);
						
					}
					
					// リンクを整形
					$v['referrer'] = '<a href="' . $jump_php . $ref_url . '" class="out">' . $ref_title . '</a>';
					
				}
				
			}
			
			// ページルートを-で分割
			$page_nos = explode('-',$v['page_route']);
			
			// PV数を算出
			$pv = count($page_nos);
			
			// 初回ページのNoを取得
			$page_no = $page_nos[0];
			
			// 初回ページのタイトルを取得
			$page_title = (isset($page_titles[$page_no])) ? $page_titles[$page_no] : 'Undefined';
			
			// ページルートが複数の時はPV数を追記
			if($pv > 1){$page_title .= ' : ' . $pv;}
			
			// クリックルートが存在する時は追記
			if($v['click_route']){$page_title .= ' + ' . count(explode('-',$v['click_route']));}
			
			// リンクを定義
			$v['route'] = '<a href="' . $scr_php . '/route_view/' . $v['page_route'] . '/' . $v['route_time'] . '/' . $v['click_route'] . '/" class="pop">' . $page_title . '</a>';
			
			// IDが存在する時はリンクを張る
			$v['id'] = ($v['visit'] > 1 or ($v['ua_type'] === 'Mobile' and !$v['display_size'])) ? self::set_id($v,$scr_php) : '';
			
			// ローカル変数に値を保存
			$os = $v['os'];
			$ua = $v['ua'];
			
			// データが存在しない時は「------------」をセット
			if(!$v['display_size']){$v['display_size'] = '------------';}
			if(!$v['client_size']){$v['client_size'] = '------------';}
			if(!$os){$v['os'] = '------------';}
			if(!$ua){$v['ua'] = '------------';}
			
			// OS X の時は愛称を補記
			elseif($v['ua_type'] === 'PC' and isset($os_titles[$os])){$v['os'] = $os_titles[$os];}
			
			// スマホの時は機種名を補記
			elseif($v['ua_type'] === 'Mobile' and isset($sp_titles[$ua])){$v['ua'] = $ua . ' ' . $sp_titles[$ua];}
			
			// ロボットの時はUAの文字数を制限
			elseif($v['ua_type'] === 'Robot'){$v['ua'] = self::replace_opt_robot($ua,$jump_php);}
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
			// カウント数を1減少
			--$seq;
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  リンク元タイトル取得
	//---------------------------------------------------------
	
	static function ref_titles($db,$prefix)
	{
		
		// リンク元テーブル名を定義
		$n_table = $prefix . '_referrer';
		
		// SQLを定義
		$q = "select * from $n_table;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// 変数を初期化
		$ref_titles = array();
		
		// データレコード取得ループ
		while($a = $db->fetch($r))
		{
			
			// Noを取得
			$no = $a['no'];
			
			// URLとタイトルを配列にセット
			$ref_titles[$no]['url']   = $a['url'];
			$ref_titles[$no]['title'] = $a['title'];
			
		}
		
		// リンク元タイトルを返す
		return $ref_titles;
		
	}
	
	
	//---------------------------------------------------------
	//  ページタイトル取得
	//---------------------------------------------------------
	
	static function page_titles($db,$prefix)
	{
		
		// ページテーブル名を定義
		$n_table = $prefix . '_page';
		
		// SQLを定義
		$q = "select no,title from $n_table;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// 変数を初期化
		$no_titles = array();
		
		// 不明ページは Unknown をセット
		$no_titles[0] = 'Unknown';
		
		// データレコード取得ループ
		while($a = $db->fetch($r))
		{
			
			// Noを取得
			$no = $a['no'];
			
			// タイトルを配列にセット
			$no_titles[$no] = $a['title'];
			
		}
		
		// ページタイトルを返す
		return $no_titles;
		
	}
	
	
	//---------------------------------------------------------
	//  フッター出力
	//---------------------------------------------------------
	
	static function navi_link($link,$all_rows,$start,$detail_limit)
	{
		
		// リミット数を変数にセット
		$v['detail_limit'] = $detail_limit;
		
		// リンクを変数にセット
		$v['all_link'] = $link . 'all/"';
		
		// 開始番号を取得
		$prev_no = $start - $detail_limit;
		
		// 開始番号が0未満の時
		if($prev_no < 0){$prev_no = 0;}
		
		// 次の開始番号を取得
		$next_no = $start + $detail_limit;
		
		// 開始番号が総数以上の時
		if($next_no > $all_rows){$next_no = $all_rows;}
		
		// 前何件へのリンクを定義
		$v['prev_link'] = ($start != 0) ? $link . $prev_no . '/"' : 'class="no_link"';
		
		// 次何件へのリンクを定義
		$v['next_link'] = ($next_no != $all_rows) ? $link . $next_no . '/"' : 'class="no_link"';
		
		// リンクデータを返す
		return $v;
		
	}
	
	
	//---------------------------------------------------------
	//  オプションフィルタリング
	//---------------------------------------------------------
	
	static function opt_filter($opt,$detail_limit)
	{
		
		// 変数を初期化
		$where = '';
		$limit = '';
		$start = 0;
		
		// オプションが存在しない時
		if(!$opt){$limit = "limit $detail_limit";}
		
		// リンク元フィルターの時
		elseif($opt === 'referrer'){$where = "and referrer != ''";}
		
		// PCフィルターの時
		elseif($opt === 'pc'){$where = "and ua_type = 'PC'";}
		
		// ロボットフィルターの時
		elseif($opt === 'robot'){$where = "and ua_type = 'Robot'";}
		
		// 携帯フィルターの時
		elseif($opt === 'mobile'){$where = "and ua_type = 'Mobile'";}
		
		// 全件表示の時
		elseif($opt === 'all'){$opt = '';}
		
		// 通常表示の時
		else
		{
			
			// 変数を別名で保持
			$limit = $detail_limit;
			
			// 開始番号を取得
			$start = $opt;
			
			// 開始番号が0未満の時
			if($start < 0){$start = 0;}
			
			// Limit句を定義
			$limit = "limit $start,$limit";
			
			// オプションを初期化
			$opt = '';
			
		}
		
		// 各種データを返す
		return array($opt,$start,$where,$limit);
		
	}
	
	
	//---------------------------------------------------------
	//  リピート情報の設定
	//---------------------------------------------------------
	
	static function set_id($v,$scr_php)
	{
		
		// IDがない時は空欄を返す
		if(!$v['id']){return;}
		
		// ID検索リンクを返す
		return ' | <a href="' . $scr_php . '/detail_search/id/' . $v['id'] . '/">' . $v['id'] . ' : ' . $v['visit'] . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  リンクの設定
	//---------------------------------------------------------
	
	static function replace_opt_robot($name,$jump_php)
	{
		
		// 値を別名で保持
		$ua = $name;
		
		// Mozilla互換文字列を削除
		$ua = preg_replace('/(Mozilla\/\d\.\d )/','',$ua);
		
		// UA文字列を抽出
		    if(preg_match('/compatible; ([^\;]+)/',$ua,$h)){$ua = $h[1];}
		elseif(preg_match('/\(([^\;+]+)( \d{1,2}\.\d)\)/',$ua,$h)){$ua = $h[1] . $h[2];}
		elseif(preg_match('/\([^)]+\)([^(]+)/',$ua,$h)){$ua = $h[1];}
		elseif(preg_match('/([^(]+)/A',$ua,$h)){$ua = $h[1];}
		elseif(preg_match('/\(([^\;+]+)/A',$ua,$h)){$ua = $h[1];}
		
		// バージョン表記を整形する
		$ua = preg_replace('/\/v{0,1}(\d)/'," $1",$ua);
		
		// 無関係の文字列があれば削除
		$ua = preg_replace('/ ?[\+\,\;\)].*?$| .+@.+|Gecko [\d]+ /','',$ua);
		
		// 文字数を制限
		$ua = mb_strimwidth($ua,0,36,'...','UTF-8');
		
		// URLが含まれている時はリンクを張る
		if(preg_match("/(http:[^\);,&]*)/",$name,$h)){$ua = '<a href="' . $jump_php . $h[1] . '" class="out">' . $ua . '</a>';}
		
		// UAを返す
		return $ua;
		
	}
	
}

