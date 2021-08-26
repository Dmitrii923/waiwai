<?php

class Param
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
	//  月間パラメータ統計生成
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// ヘッダー,メイン,フッター テンプレートを取得
		list($head,$main,$foot,$all_view) = $tmpl->read('param.htm');
		
		// ヘッダーテンプレートを出力
		$tmpl->view($head);
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// スクリプトディレクトリ名を取得
		$scr_dir = $path['scr_dir'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// 最大表示件数を取得
		$param_limit = $conf['param_limit'];
		
		// ジャンプパスを定義
		$jump_php = 'http://act.st/api/jump.php/';
		//$jump_php = $scr_php . '/jump/';
		
		////////////////////////////////////////////////////////////
		
		// アクション名を取得
		$act = $args['act'];
		
		// 項目種別を取得
		$param = $args[1];
		
		// フィルター設定を取得
		$opt = $args['opt'];
		
		// ピックアップ項目を取得
		$pickup = $args['pickup'];
		
		// 年を取得
		$y = $args['y'];
		
		// 月を取得
		$m = $args['m'];
		
		// 年を取得
		$ly = $args['ly'];
		
		// 月を取得
		$lm = $args['lm'];
		
		// パラメータログテーブル名を定義
		$i_table = $prefix . '_i_' . $y . '_' . $m;
		
		// パラメータログテーブル名を定義
		$li_table = $prefix . '_i_' . $ly . '_' . $lm;
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DB名を定義
		$l_db = $prefix . '_' . $ly . '_' . $lm . '.db';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){return;}
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$column  = 'name,cnt';
		$column1 = 'sum(cnt) as sum,count(distinct name) as rows';
		$column2 = '';
		$order   = 'cnt';
		$ua_type = '';
		$replace = '';
		$from    = '';
		$where   = "type = '$param'";
		$group   = '';
		$limit   = '';
		$opt2    = '';
		$slash   = '/';
		
		// 定数を定義
		define('max_len',50);
		define('jump_php',$jump_php);
		
		// 簡易検索用リンクを定義
		$link = "$scr_php/detail_search/$param/$y/$m/xx";
		
		// 別名で変数を保持
		$all_view_opt = $opt;
		
		// フィルターが無い時
		if(!$opt or $opt === 'none'){$opt = '';$all_view_opt = 'none';}
		
		// 全件表示用リンクを定義
		$all_view_link = "$scr_php/param/$param/$y/$m/$all_view_opt/all/";
		
		// フラグを初期化
		$flag['p'] = false;
		$flag['l'] = false;
		$flag['c'] = false;
		
		////////////////////////////////////////////////////////////
		
		// 有無フィルターの時
		if($opt === 'exists'){$replace = 'replace_opt_exists';}
		
		// ドメインフィルターの時
		elseif($opt === 'domain' or $opt === 'search'){list($replace,$column2,$from,$where) = self::domain($prefix);}
		
		// 統合フィルターの時
		elseif($opt === 'arrange'){list($replace,$where) = self::opt_arrange($scr_php,$act,$param,$where,$y,$m);}
		
		// ページ,リンク先,リンク元の時
		elseif($param === 'page' or $param === 'click' or $param === 'referrer'){list($replace,$column2,$from,$where,$param,$opt,$slash) = self::page($db,$param,$opt,$prefix);}
		
		// 検索キーワードの時
		elseif($param === 'search_words'){list($replace,$where,$param,$opt,$opt2) = self::search_words($param,$opt);}
		
		// 訪問回数の時
		elseif($param === 'visit'){$replace = ($opt === 'repeat') ? 'replace_opt_repeat' : 'replace_visit';}
		
		// OSの時
		elseif($param === 'os'){list($replace,$where,$opt) = self::os($opt,$pickup);}
		
		// UAの時
		elseif($param === 'ua'){list($replace,$column,$param,$where,$group,$opt,$ua_type,$order,$pickup) = self::ua($opt,$pickup);}
		
		// ホストドメインの時
		elseif($param === 'host_domain'){list($replace,$where,$opt) = self::host_domain($opt);}
		
		////////////////////////////////////////////////////////////
		
		// 全件表示の時はフラグをtrueにセット
		$flag['a'] = ($pickup === 'all') ? true : false;
		
		// limit句を定義
		if(!$flag['a'] and !$opt){$limit = "limit $param_limit";}
		
		////////////////////////////////////////////////////////////
		
		// 前月DBが存在する時
		if($db->exists($l_db))
		{
			
			// DBに接続
			$db->attach($l_db,'l');
			
			// SQLを定義
			$q = "select $column1 from $li_table $from where $where;";
			
			// SQLを実行
			$a = $db->query_fetch($q);
			
			// 総カウント数を取得
			$lm_total_cnt = $a['sum'];
			
			// 総件数を取得
			$lm_all_rows = $a['rows'];
			
			// SQLを定義
			$q = "select $column from $li_table $from where $where $group order by $order desc;";
			
			// SQLを実行
			$r = $db->query($q);
			
			// フィルター設定が存在する時
			if($opt){list($lm_opt_d,$lm_total_cnt,$lm_all_rows) = self::opt_filter($db,$param,$opt,$r,$lm_total_cnt,$li_table);}
			
			////////////////////////////////////////////////////////////
			
			// 先月のレコードデータ集計ループ
			for($i = 1;;$i++)
			{
				
				// フィルターが存在しない時
				if(!$opt)
				{
					
					// データを取得
					$a = $db->fetch($r);
					
					// データが無い時はループ終了
					if(!$a){break;}
					
					// 項目名を取得
					$lm_name = $a['name'];
					
					// カウント数を取得
					$lm_cnt = $a[$order];
					
				}
				
				// フィルターが存在する時
				else
				{
					
					// データが無い時はループ終了
					if($i > $lm_all_rows){break;}
					
					// データを取得
					list($lm_name,$lm_cnt) = each($lm_opt_d);
					
				}
				
				// 先月の順位を連想配列にセット
				$lm_pd[$lm_name]['i'] = $i;
				
				// 先月のパーセンテージを連想配列にセット
				$lm_pd[$lm_name]['per'] = number_format($lm_cnt / $lm_total_cnt * 100,1);
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// DBに接続
		$db->attach($t_db,'t');
		
		// SQLを定義
		$q = "select $column1 from $i_table $from where $where;";
		
		// SQLを実行
		$a = $db->query_fetch($q);
		
		// 総カウント数を取得
		$total_cnt = $a['sum'];
		
		// 総件数を取得
		$all_rows = $a['rows'];
		
		// SQLを定義
		$q = "select $column $column2 from $i_table $from where $where $group order by $order desc $limit;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// フィルター設定が存在する時
		if($opt){list($opt_d,$total_cnt,$all_rows) = self::opt_filter($db,$param,$opt,$r,$total_cnt,$i_table);$opt2 = '/';}
		
		// 携帯フィルターの時はフィルターに追記
		elseif($ua_type){$opt2 = $ua_type . '/';}
		
		// DBと切断
		$db->close();
		
		////////////////////////////////////////////////////////////
		
		// 制限表示の時
		if(!$flag['a']){$limit_cnt = ($all_rows > $param_limit) ? $param_limit : $all_rows;}
		
		// 全件表示の時
		else{$limit_cnt = $all_rows;}
		
		////////////////////////////////////////////////////////////
		
		// レコードデータ表示ループ
		for($i = 1;;$i++)
		{
			
			// フィルターが存在しない時
			if(!$opt)
			{
				
				// データが無い時はループ終了
				$v = $db->fetch($r);
				
				// データを取得
				if(!$v){break;}
				
			}
			
			// フィルターが存在する時
			else
			{
				
				// データが無い時はループ終了
				if($i > $limit_cnt){break;}
				
				// データを取得
				list($v['name'],$v['cnt']) = each($opt_d);
				
			}
			
			// 項目名を取得
			$name = $v['name'];
			
			// 表示文字列を置換
			if($replace){$v['name'] = self::$replace($v,$param);}
			
			// 色分け用class属性を定義
			$v['tr'] = ($i % 2 === 0) ? 2 : 1;
			
			// パーセンテージを算出
			$v['per'] = number_format($v[$order] / $total_cnt * 100,1);
			
			// 0.1未満の時は「0.1」をセット
			if($v['per'] === 0){$v['per'] = 0.1;}
			
			// 簡易検索リンクを定義
			$v['cnt'] = '<a href="' . $link . '/' . $name . $slash . $opt . $opt2 . '">' . $v[$order] . '</a>';
			
			// 順位をセット
			$v['i'] = $i;
			
			////////////////////////////////////////////////////////////
			
			// 先月のデータが存在する時
			if(isset($lm_pd[$name]))
			{
				
				// 先月の順位をセット
				$v['lm_i'] = $lm_pd[$name]['i'];
				
				// 先月のパーセンテージ増減を算出
				$v['lm_per'] = number_format($v['per'] - $lm_pd[$name]['per'],1);
				
				// 先月のパーセンテージ増減を整形
				if($v['lm_per'] > 0){$v['lm_per'] = '+' . $v['lm_per'];$v['up_down'] = 'up';}
				
				// 増減が無い時
				elseif($v['lm_per'] === 0.0){$v['lm_per'] = '+' . $v['lm_per'];$v['up_down'] = 'even';}
				
				// 先月以下の時
				else{$v['up_down'] = 'down';}
				
				// 先月より順位が上の時
				if($v['i'] < $v['lm_i']){$img = 'up';}
				
				// 先月より順位が下の時
				elseif($v['i'] > $v['lm_i']){$img = 'down';}
				
				// 先月と同じ順位の時
				else{$img = 'even';}
				
			}
			
			// 先月のデータが存在しない時
			else
			{
				
				// 先月の順位に「-」をセット
				$v['lm_i']   = '－';
				
				// 今月のパーセンテージをセット
				$v['lm_per'] = '+' . $v['per'];
				
				// 新規データをセット
				$v['up_down'] = 'new';
				
				// 新規データをセット
				$img = 'new';
				
			}
			
			////////////////////////////////////////////////////////////
			
			// パーセンテージを整形
			$v['per'] .= '%';
			
			// パーセンテージ増減を整形
			$v['lm_per'] .= '%&nbsp;';
			
			// 順位変動<img>を整形
			$v['lm_img']  = '<img src="' . $scr_dir . '/templates/img/lm/' . $img . '.gif" width="15" height="15" />';
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// フッターテンプレートを出力
		$tmpl->view($foot);
		
		// 表示制限がある時
		if(!$flag['a'] and $all_rows > $param_limit)
		{
			
			// テンプレート変数を初期化
			$v = array();
			
			// 全件表示リンクをテンプレート変数にセット
			$v['link'] = $all_view_link;
			
			// ナビテンプレートを出力
			$args['content_all'] = $tmpl->res($all_view,$v);
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  リンク元ドメインフィルター
	//---------------------------------------------------------
	
	static function domain($prefix)
	{
		
		// 置換メソッド名を定義
		$replace = 'replace_opt_domain';
		
		// テーブル名を定義
		$from  = ',' . $prefix . '_referrer';
		
		// 検索条件を定義
		$where = "type = 'referrer' and name = no";
		
		// カラム名を定義
		$column2 = ",url as name";
		
		// メソッド名,カラム名,from句,where句を返す
		return array($replace,$column2,$from,$where);
		
	}
	
	
	//---------------------------------------------------------
	//  ページ,リンク先
	//---------------------------------------------------------
	
	static function page($db,$param,$opt,$prefix)
	{
		
		// 置換メソッド名を定義
		$replace = 'replace_page';
		
		// 変数を初期化
		$title = 'title';
		$slash = '/';
		
		// テーブル名を定義
		$from  = ',' . $prefix . '_' . $param;
		
		// 検索条件を定義
		$where = "type = '$param' and name = no";
		
		// URLフィルターの時
		if($opt == 'url')
		{
			
			// カラム名を定義
			$title = 'url as title';
			
			// 置換メソッド名を定義
			$replace = 'replace_opt_url';
			
		}
		
		// ディレクトリフィルターの時
		elseif($opt === 'dir'){$replace = 'replace_opt_dir';$slash = '';}
		
		// ファイルリンク/外部リンクの時
		elseif($param === 'click')
		{
			
			// ドメイン名配列を取得
			if($opt){$domains = self::get_self_domains($db,$prefix);}
			
			// ファイルリンクの時
			if($opt === 'file'){$where .= " and (url like '" . implode("%' or url like '",$domains) . "%')";}
			
			// 外部リンクの時
			elseif($opt === 'out'){$where .= " and (url not like '" . implode("%' and url not like '",$domains) . "%')";}
			
		}
		
		// カラム名を定義
		$column2 = ",$title,url";
		
		////////////////////////////////////////////////////////////
		
		// フィルターをリセット
		if($opt !== 'dir'){$opt = '';}
		
		// メソッド名,カラム名,from句,where句を返す
		return array($replace,$column2,$from,$where,$param,$opt,$slash);
		
	}
	
	
	//---------------------------------------------------------
	//  検索キーワード
	//---------------------------------------------------------
	
	static function search_words($param,$opt)
	{
		
		// 置換メソッドを定義
		$replace = 'replace_search_words';
		
		// 連語の時はフィルターをリセット
		if($opt === 'word'){$param = 'search_word';$opt .= '/';}
		
		// 検索条件を定義
		$where = "type='$param'";
		
		// メソッド名,フィルター名を返す
		return array($replace,$where,$param,'',$opt);
		
	}
	
	
	//---------------------------------------------------------
	//  OS
	//---------------------------------------------------------
	
	static function os($opt,$pickup)
	{
		
		// グローバル変数を定義
		global $path,$ini;
		
		// iniファイルをパース
		$ini = parse_ini_file($path['work_dir'] . '/templates/ini/os.ini');
		
		// 変数を初期化
		$where = "type = 'os'";
		
		// PCフィルターの時
		if($opt === 'pc'){$where .= " and (name not like 'iOS%' and name not like 'Android%' and name not like 'Windows Mobile%' and name not like 'Windows Phone%')";}
		
		// 携帯フィルターの時
		elseif($opt === 'mobile'){$where .= " and (name like 'iOS%' or name like 'Android%' or name like 'Windows Mobile%' or name like 'Windows Phone%')";}
		
		// ピックアップフィルター（Linux）の時
		elseif($pickup === 'Linux'){$where .= " and (name like '%Linux%' or name = 'Fedora' or name = 'Ubuntu' or name = 'CentOS')";}
		
		// ピックアップフィルターの時
		elseif($opt === 'pickup'){$where .= " and name like '$pickup%'";}
		
		// フィルターをリセット
		$opt = '';
		
		// 置換メソッド名を定義
		$replace = 'replace_os';
		
		// 検索条件を返す
		return array($replace,$where,$opt);
		
	}
	
	
	//---------------------------------------------------------
	//  UA
	//---------------------------------------------------------
	
	static function ua($opt,$pickup)
	{
		
		// グローバル変数を定義
		global $path,$ini;
		
		// iniファイルをパース
		$ini = parse_ini_file($path['work_dir'] . '/templates/ini/mobile.ini');
		
		// 変数をを初期化
		$column  = 'name,cnt';
		$order   = 'cnt';
		$param   = 'ua';
		$where   = "type = 'ua'";
		$group   = '';
		$replace = '';
		
		// フィルターを別名で保持
		$ua_type = $opt;
		
		// フィルターがない時
		if(!$opt)
		{
			
			// カラム名を定義
			$column = 'name,sum(cnt) as cnt2';
			
			// 検索条件を定義
			$where .= " or type = 'mobile' or type = 'game'";
			
			// グループ化を定義
			$group = 'group by name';
			
			// カラム名を定義
			$order = 'cnt2';
			
			// 置換メソッド名を定義
			$replace = 'replace_opt_mobile';
			
		}
		
		// ロボットフィルターの時
		elseif($opt === 'robot')
		{
			
			// パラメータ名を定義
			$param = 'robot';
			
			// 検索条件を定義
			$where = "type = 'robot'";
			
			// 置換メソッド名を定義
			$replace = 'replace_opt_robot';
			
		}
		
		// 携帯フィルターの時
		elseif($opt === 'mobile')
		{
			
			// パラメータ名を定義
			$param = 'mobile';
			
			// 検索条件を定義
			$where = "type = 'mobile'";
			
		}
		
		// ピックアップフィルターの時
		elseif($opt === 'pickup'){$where = "(type = 'ua' or type = 'mobile' or type = 'game') and name like '$pickup%'";}
		
		// スマートフォンの時
		if($opt === 'mobile' or preg_match('/(docomo|au|SoftBank)$/A',$pickup))
		{
			
			// 置換メソッド名を定義
			$replace = 'replace_opt_mobile';
			
			// ピックアップをリセット
			if($pickup){$pickup = 'all';}
			
		}
		
		// フィルターをリセット
		$opt = '';
		
		// メソッド名,カラム名を返す
		return array($replace,$column,$param,$where,$group,$opt,$ua_type,$order,$pickup);
		
	}
	
	
	//---------------------------------------------------------
	//  ホストドメイン
	//---------------------------------------------------------
	
	static function host_domain($opt)
	{
		
		// グローバル変数を定義
		global $titles,$path;
		
		// 変数を初期化
		$titles = array();
		
		// 検索条件を定義
		$where  = "type = 'host_domain'";
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// 置換メソッドを定義
		$replace = ($opt !== 'world') ? 'replace_host_domain' : 'replace_opt_world';
		
		// 外国フィルターの時
		if($opt === 'world'){$where .= " and name not like '%.jp' and name not like '%.com' and name not like '%.net' and name != 'unknown'";}
		
		// 学校・会社フィルターの時
		elseif($opt and $opt !== 'world'){$where .= " and name like '%.$opt.%'";}
		
		// 組織・国名を取得
		$dm_opt = ($opt === 'world') ? 'country' : 'isp';
		
		// 組織・国名設定ファイルを解析
		$titles = parse_ini_file($work_dir . '/templates/ini/' . $dm_opt . '.ini');
		
		// フィルターをリセット
		$opt = '';
		
		// メソッド名,where句を返す
		return array($replace,$where,$opt);
		
	}
	
	
	//---------------------------------------------------------
	//  統合オプション
	//---------------------------------------------------------
	
	static function opt_arrange($scr_php,$act,$param,$where,$y,$m)
	{
		
		// 置換メソッド名を定義
		$replace = 'replace_opt_arrange';
		
		// 定数を定義
		define('arrange_link',$scr_php . "/$act/$param/$y/$m/pickup/");
		
		// UAの時はwhere句に追記
		if($param === 'ua'){$where .= " or type = 'mobile' or type = 'game'";}
		
		// メソッド名,where句を返す
		return array($replace,$where);
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_page($v)
	{
		
		// 表示名を返す
		return '<a href="' . jump_php . $v['url'] . '" class="out" title="' . $v['title'] . '">' . mb_strimwidth($v['title'],0,max_len,'...','UTF-8') . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_opt_dir($v)
	{
		
		// 表示名を返す
		return preg_replace('/http.?:\/\/[^\/]*/','',$v['name']);
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_opt_url($v)
	{
		
		// http://を削除
		$v['title'] = preg_replace("/http.?:\/\/[^\/]*/",'',$v['title']);
		
		// 表示名を返す
		return '<a href="' . jump_php . $v['url'] . '" class="out">' . mb_strimwidth($v['title'],0,max_len,'...','UTF-8') . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  リンクの設定
	//---------------------------------------------------------
	
	static function replace_opt_domain($v)
	{
		
		// 項目名のリンクを整形
		return '<a href="' . jump_php . 'http://' . $v['name'] . '/" class="out" title="' . $v['name'] . '">' . mb_strimwidth($v['name'],0,max_len,'...','UTF-8') . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_opt_exists($v)
	{
		
		// グローバル変数を定義
		global $args;
		
		// 別名で項目名を保持
		$name = $v['name'];
		
		// 項目名を返す
		return $args['exists'][$name];
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_visit($v)
	{
		
		// 項目名を返す
		return $v['name'] . '回目';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_opt_repeat($v)
	{
		
		// グローバル変数を定義
		global $args;
		
		// 別名で項目名を保持
		$name = $v['name'];
		
		// 項目名を返す
		return $args['repeat'][$name];
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_host_domain($v)
	{
		
		// グローバル変数を定義
		global $titles;
		
		// 別名で項目名を保持
		$name = $v['name'];
		
		// 所属名が存在する時は追記
		$plus = (isset($titles[$name])) ? ' ( ' . $titles[$name] . ' )' : '';
		
		// 項目名のリンクを整形
		return '<a href="' . jump_php . 'http://www.' . $name . '/" class="out">' . $name . '</a>' . $plus;
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_opt_world($v)
	{
		
		// グローバル変数を定義
		global $titles;
		
		// 別名で項目名を保持
		$name = $v['name'];
		
		// ドメインを「.」で分割
		$dms = explode('.',$name);
		
		// 末尾の要素を切り出し
		$domain = array_pop($dms);
		
		// 所属名が存在する時は追記
		$plus = (isset($titles[$domain])) ? ' ( ' . $titles[$domain] . ' )' : '';
		
		// 項目名のリンクを整形
		return '<a href="' . jump_php . 'http://www.' . $name . '/" class="out">' . $name . '</a>' . $plus;
		
	}
	
	
	//---------------------------------------------------------
	//  リンクの設定
	//---------------------------------------------------------
	
	static function replace_search_words($v)
	{
		
		// 表示名を返す
		return '<a href="' . jump_php . 'http://www.google.co.jp/' . '::' . preg_replace('/"/',"'",$v['name']) . '" class="out">' . $v['name'] . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_os($v)
	{
		
		// グローバル変数を定義
		global $ini;
		
		// 値を別名で保持
		$os = $v['name'];
		
		// 愛称が存在するときはUAに追記
		if(isset($ini[$os])){$os = $ini[$os];}
		
		// UAを返す
		return $os;
		
	}
	
	
	//---------------------------------------------------------
	//  表示名の置換
	//---------------------------------------------------------
	
	static function replace_opt_mobile($v)
	{
		
		// グローバル変数を定義
		global $ini;
		
		// 値を別名で保持
		$ua = $v['name'];
		
		// 愛称が存在するときはUAに追記
		if(isset($ini[$ua])){$ua .= ' ' . $ini[$ua];}
		
		// UAを返す
		return $ua;
		
	}
	
	
	//---------------------------------------------------------
	//  リンクの設定
	//---------------------------------------------------------
	
	static function replace_opt_robot($v)
	{
		
		// 値を別名で保持
		$ua = $v['name'];
		
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
		$ua = mb_strimwidth($ua,0,max_len,'...','UTF-8');
		
		// URLが含まれている時はリンクを張る
		if(preg_match("/(http:[^\);,&]*)/",$v['name'],$h)){$ua = '<a href="' . jump_php . $h[1] . '" class="out">' . $ua . '</a>';}
		
		// UAを返す
		return $ua;
		
	}
	
	
	//---------------------------------------------------------
	//  リンクの設定
	//---------------------------------------------------------
	
	static function replace_opt_arrange($v)
	{
		
		// 表示名を返す
		return '<a href="' . arrange_link . $v['name'] . '">' . $v['name'] . '</a>';
		
	}
	
	
	//---------------------------------------------------------
	//  フィルタリング
	//---------------------------------------------------------
	
	static function opt_filter($db,$param,$opt,$r,$total_cnt,$i_table)
	{
		
		// 変数を初期化
		$names = array();
		
		// ピックアップフィルターの時
		if($opt === 'pickup'){global $args;$pickup = $args['pickup'];}
		
		// ディレクトリフィルターの時
		elseif($opt === 'dir'){$titles = self::get_dir_titles($db);}
		
		// リンク元有無フィルターの時
		if($opt === 'exists'){$names = self::get_exists_names($db,$i_table,$total_cnt);}
		
		// 訪問回数の時
		elseif($opt === 'repeat'){$names = self::get_repeat_names($db,$i_table,$total_cnt);}
		
		// リンク元有無フィルター以外の時
		else
		{
			
			// フィルタリングループ
			while($a = $db->fetch($r))
			{
				
				// 項目名を取得
				$name = $a['name'];
				
				// カウント数を取得
				$cnt = $a['cnt'];
				
				// 項目名を配列に分割
				$name_a = preg_split('/×| x |\/| /', $name);
				
				// 項目名を別名で保持
				$name2 = $name;
				
				// 検索エンジンフィルターの時
				if($opt === 'search')
				{
					
					// 検索エンジン以外は次へ
					if(!preg_match('/\.(google|yahoo|excite|nifty|biglobe|msn|goo|infoseek|ocn|baidu)\./',$name)){continue;}
					
					// 検索エンジンの時は変数にセット
					else{$name2 = $name_a[2];}
					
				}
				
				// リンク元ドメインフィルターの時
				elseif($opt === 'domain')
				{
					
					// ドメイン名をセット
					if(isset($name_a[2])){$name2 = $name_a[2];}
					
					// ドメインが無い時は次へ
					else{continue;}
					
				}
				
				// ディレクトリフィルターの時
				elseif($opt === 'dir')
				{
					
					// ディレクトリ名をセット
					$name2 = (isset($titles[$name])) ? $titles[$name] : 'undefined';
					
				}
				
				// ピックアップフィルターの時
				elseif($opt === 'pickup')
				{
					
					// Linuxの時
					if($pickup === 'Linux' and isset($name_a[1]) and $name_a[1] === 'Linux'){$name_a[0] = 'Linux';}
					
					// Fedora,Ubuntu,CentOSの時
					elseif($pickup === 'Linux' and preg_match('/Fedora|Ubuntu|CentOS/',$name_a[0])){$name_a[0] = 'Linux';}
					
					// 項目に一致しない時は次へ
					if($pickup !== $name_a[0]){continue;}
					
				}
				
				// その他の時
				else
				{
					
					// 項目名配列が1つの時
					if(count($name_a) == 1){$name2 = (!preg_match('/Fedora|Ubuntu|CentOS/',$name_a[0])) ? $name_a[0] : 'Linux';}
					
					// height及びOS統合フィルターの時
					elseif($opt === 'height' or $name_a[1] === 'Linux'){$name2 = $name_a[1];}
					
					// それ以外の時
					else{$name2 = $name_a[0];}
					
				}
				
				// 配列のデータが存在する時はカウントを増加
				if(isset($names[$name2])){$names[$name2] += $cnt;}
				
				// 配列のデータが存在しない時はカウントを配列にセット
				else{$names[$name2] = $cnt;}
				
			}
			
		}
		
		// ピックアップの時は合計値を算出
		if($opt === 'pickup' or $opt === 'exists' or $opt === 'mobile' or $opt === 'repeat'){$total_cnt = array_sum($names);}
		
		// 降順にソート
		arsort($names);
		
		// 総数を取得
		$all_rows = count($names);
		
		// データを返す
		return array($names,$total_cnt,$all_rows);
		
	}
	
	
	//---------------------------------------------------------
	//  訪問回数データ取得
	//---------------------------------------------------------
	
	static function get_repeat_names($db,$i_table,$total_cnt)
	{
		
		// 変数を初期化
		$names = array();
		
		// SQLを定義
		$q = "select cnt from $i_table where type = 'visit' and name = 1;";
		
		// SQLを実行
		$f_cnt = $db->query_fetch($q,'cnt');
		
		// カウント数が存在する時
		if($f_cnt)
		{
			
			// カウント数をは配列にセット
			$names['f'] = $f_cnt;
			$names['r'] = $total_cnt - $f_cnt;
			
		}
		
		// データ配列を返す
		return $names;
		
	}
	
	
	//---------------------------------------------------------
	//  リンク元有無データ取得
	//---------------------------------------------------------
	
	static function get_exists_names($db,$i_table,$total_cnt)
	{
		
		// 変数を初期化
		$names = array();
		
		// 詳細ログテーブル名を取得
		$d_table = preg_replace('/_i_/','_d_',$i_table);
		
		// SQLを定義
		$q = "select count(seq) as cnt from $d_table where ua_type != 'Robot' and referrer = '';";
		
		// リンク元無しを取得
		$cnt = $db->query_fetch($q,'cnt');
		
		// 1件以上の時は配列にセット
		if($cnt){$names['f'] = $cnt;}
		
		// SQLを定義
		$q = "select count(seq) as cnt from $d_table where ua_type != 'Robot' and referrer != '' and search_words = '';";
		
		// リンク元有り（通常リンク）を算出
		$cnt = $db->query_fetch($q,'cnt');
		
		// 1件以上の時は配列にセット
		if($cnt){$names['t'] = $cnt;}
		
		// SQLを定義
		$q = "select count(seq) as cnt from $d_table where ua_type != 'Robot' and referrer != '' and search_words != '';";
		
		// リンク元有り（検索エンジン）を算出
		$cnt = $db->query_fetch($q,'cnt');
		
		// 1件以上の時は配列にセット
		if($cnt){$names['s'] = $cnt;}
		
		// データ配列を返す
		return $names;
		
	}
	
	
	//---------------------------------------------------------
	//  dirデータ取得
	//---------------------------------------------------------
	
	static function get_dir_titles($db)
	{
		
		// グローバル変数を定義
		global $path,$titles;
		
		// データが存在する時は何もしない
		if($titles){return $titles;}
		
		// 変数を初期化
		$titles = array();
		
		// データテーブル名を定義
		$n_table = $path['prefix'] . '_page';
		
		// SQLを定義
		$q = "select no,url from $n_table order by no;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// フィルタリングループ
		while($a = $db->fetch($r))
		{
			
			// データを取得
			$no  = $a['no'];
			$url = $a['url'];
			
			// 「/」でURLを分割
			$ns = explode('/',$url);
			
			// ディレクトリ名を取得
			$url = (!array_pop($ns)) ? $url : dirname($url) . '/';
			
			// バックスラッシュを削除
			//$url = stripcslashes($url);
			
			// noをキーとした連想配列にセット
			$titles[$no] = $url;
			
		}
		
		// データ配列を返す
		return $titles;
		
	}
	
	
	//---------------------------------------------------------
	//  自身のドメイン名を取得
	//---------------------------------------------------------
	
	static function get_self_domains($db,$prefix)
	{
		
		// ページ番号テーブル名を定義
		$n_table = $prefix . '_page';
		
		// SQLを定義
		$q = "select url from $n_table limit 100;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// 配列を初期化
		$domains = array();
		
		// 詳細ログを表示するループ
		while($v = $db->fetch($r))
		{
			
			// URLをパース
			$urls = parse_url($v['url']);
			
			// ドメイン名を取得
			$host = 'http://' . $urls['host'];
			
			// ドメイン名を配列にセット
			$domains[$host] = true;
			
		}
		
		// ドメイン名を返す
		return array_keys($domains);
		
	}
	
}

