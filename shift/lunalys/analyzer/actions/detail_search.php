<?php

class Detail_Search
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
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// スクリプトディレクトリ名を取得
		$scr_dir = $path['scr_dir'];
		
		// ワークディレクトリ名を取得
		$work_dir = $path['work_dir'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// メイン,ナビリンク,フッター テンプレートを取得
		list($main,$navi_link,$footer) = $tmpl->read('detail.htm');
		
		// クラスを読み込み
		include($work_dir . '/actions/detail.php');
		
		// クラスインスタンスを生成
		$detail = new Detail();
		
		////////////////////////////////////////////////////////////
		
		// フラグを初期化
		$flag['t_d'] = true;
		$flag['hit'] = false;
		
		// 変数を初期化
		$wheres   = array();
		$table    = '';
		$where    = 'and ';
		$where_ua = "ua_type != 'Robot'";
		$limit    = '';
		$opt      = '';
		$d = 'xx';
		$a = array();
		$b = array();
		
		// インデントタブを定義
		$t1 = "\t\t\t\t";
		$t2 = $t1 . "\t";
		
		////////////////////////////////////////////////////////////
		
		// リクエストメソッドを取得
		$method = $_SERVER['REQUEST_METHOD'];
		
		// GETメソッドの時
		if($method === 'GET')
		{
			
			// パラメータ種別を取得
			$param = $args[1];
			
			// ID検索の時
			if($param === 'id'){return self::id($detail,$db,$tmpl,$main,$path,$args[2]);}
			
			// 年月を取得
			$y = $args[2];
			$m = $args[3];
			$d = $args[4];
			
			// 検索項目名を取得
			$item = $args[5];
			
			// 検索オプションを取得
			$opt = (isset($args[6])) ? $args[6] : '';
			
			// 日付の指定がある時は条件に足す
			if($d !== 'xx'){$where .= "a_date = '$y-$m-$d' and ";}
			
			// オプションをリセット
			if($param === 'host_domain' or $opt === 'pickup'){$opt = '';}
			
			// 縦幅オプションの時
			if($opt === 'height'){$where .= "$param like '%$item'";}
			
			// 横幅オプションの時
			elseif($opt === 'width'){$where .= "$param like '$item%'";}
			
			// 統合オプションの時
			elseif($opt === 'arrange' and $item !== 'Linux'){$where .= "$param like '$item%'";}
			
			// 統合オプションの時
			elseif($opt === 'arrange' and $item === 'Linux'){$where .= "($param like '%Linux%' or $param = 'Fedora' or $param = 'Ubuntu')";}
			
			// 検索語の時
			elseif($opt === 'word'){$where .= "$param like '%$item%'";}
			
			// リンク元検索エンジン,ドメインオプションの時
			elseif($opt === 'search' or $opt === 'domain'){$where .= self::domain_where($db,$item,$prefix);}
			
			// リンク元有無オプションの時
			elseif($opt === 'exists')
			{
				
				// リンク元 無しの時
				if($item === 'f'){$where .= "$param = ''";}
				
				// リンク元 有り / 検索エンジンの時
				elseif($item === 's'){$where .= "search_words != ''";}
				
				// リンク元 有り / 通常リンクの時
				elseif($item === 't'){$where .= "$param != '' and search_words = ''";}
				
			}
			
			// 訪問回数統合オプションの時
			elseif($opt === 'repeat')
			{
				
				// 初回アクセスの時
				if($item === 'f'){$where .= "$param != '' and $param < 2";}
				
				// リピートアクセスの時
				elseif($item === 'r'){$where .= "$param != '' and $param > 1";}
				
			}
			
			// リンク先の時
			elseif($param === 'click')
			{
				
				// 変数を別名で保持
				$p = $item;
				
				// 検索条件を定義
				$where .= "(click_route = '$p' or click_route like '$p-%' or ";
				$where .= "click_route like '%-$p-%' or click_route like '%-$p')";
				
			}
			
			// アクセスページの時
			elseif($param === 'page')
			{
				
				// ディレクトリオプションが無い時
				if(!isset($args[7]))
				{
					
					// 変数を別名で保持
					$p = $item;
					
					// 検索条件を定義
					$where .= "(page_route = '$p' or page_route like '$p-%' or ";
					$where .= "page_route like '%-$p-%' or page_route like '%-$p')";
					
				}
				
				// ディレクトリオプションの時
				else{$where .= self::dir_where($db,$args,$prefix);}
				
			}
			
			// 携帯フィルターの時
			elseif($opt === 'mobile'){$where .= "$param = '$item'";$where_ua = "ua_type = 'Mobile'";}
			
			// PCフィルターの時
			elseif($opt === 'pc'){$where .= "$param = '$item'";$where_ua = "ua_type = 'PC'";}
			
			// ロボットオプションの時
			elseif(preg_match('/xx\/(.+)\/robot/',$_SERVER['REQUEST_URI'],$h)){$where .= "$param = '" . preg_replace('/%20/',' ',$h[1]) . "'";$where_ua = "ua_type = 'Robot'";}
			
			// オプションが無い時
			elseif(!$opt){$where .= "$param = '$item'";}
			
			// その他例外の時
			else{$where = '';}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// POSTメソッドの時
		else
		{
			
			// 年月を取得
			$y = $args['y'];
			$m = $args['m'];
			
			// 詳細ログパラメータ配列を定義
			$params = array
			(
				
				'referrer',
				'search_words',
				'page',
				'click',
				'ua',
				'os',
				'host_domain',
				'client_size',
				'display_size'
				
			);
			
			// 条件定義ループ
			foreach($params as $param)
			{
				
				// 検索データが存在しない時
				if(!isset($args[$param]) or !$args[$param]){continue;}
				
				// 一致条件名を整形
				$eq = $param . '_eq';
				
				// アクセスページの時
				if($param === 'page' or $param === 'click')
				{
					
					// 項目名を取得
					$p = $args[$param];
					
					// 対象カラム名を定義
					$rt = $param . '_route';
					
					// 検索条件を定義
					$route = " ($rt = '$p' or $rt like '$p-%' or $rt like '%-$p-%' or $rt like '%-$p')";
					
					// 含まない時はnot演算子を追記
					if($args[$eq] === 'ne'){$route = ' not' . $route;}
					
					// 配列に格納
					array_push($wheres,$route);
					
				}
				
				// 検索語の時
				elseif($param === 'search_words')
				{
					
					// 項目名を取得
					$w = $args[$param];
					
					// 検索条件を定義
					$wd = " (search_words like '%$w%')";
					
					// 含まない時はnot演算子を追記
					if($args[$eq] === 'ne'){$wd = ' not' . $wd;}
					
					// 配列に格納
					array_push($wheres,$wd);
					
				}
				
				// アクセスページ以外の時
				else
				{
					
					// 比較演算子を定義
					$e = ($args[$eq] === 'eq') ? '=' : '!=';
					
					// 配列に格納
					array_push($wheres," $param $e '$args[$param]'");
					
				}
				
			}
			
			// 条件に追記
			if($wheres){$where .= implode(' and',$wheres);}
			
			// 検索条件が無い時はwhere句をリセット
			else{$where = '';}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 日付の指定が存在する時は追記
		$date_d = ($d !== 'xx') ? '/' . $d : '';
		
		// メニューをセット
		echo $t1 . '<p id="content_date">' . "&lt; $y/$m$date_d &gt;" . '</p>' . "\n" . $t1;
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DBに接続
		$db->attach($t_db,'t');
		
		// 詳細ログテーブル名を定義
		$d_table = $prefix . '_d_' . $y . '_' . $m;
		
		// SQLを定義
		$q = "select count(ip_address) as cnt from $d_table;";
		
		// 全ログ数を取得
		$all_rows = $db->query_fetch($q,'cnt');
		
		// // 詳細ログが存在する時
		if($all_rows)
		{
			
			// SQLを定義
			$q = "select * from $d_table $table where $where_ua $where order by a_date desc,l_time desc;";
			
			// SQLを実行
			$r = $db->query($q);
			
			// SQLを定義
			$q = "select count(ip_address) as cnt from $d_table where $where_ua $where ;";
			
			// 該当件数を取得
			$seq = $db->query_fetch($q,'cnt');
			
			// パーセンテージを取得
			$per = number_format($seq / $all_rows * 100,1);
			
			// メニュー項目を設定
			echo '<p id="content_filter">' . "$seq / $all_rows ( $per% )" . '</p>' . "\n" . $t1 . '<section id="content_main">';
			
			// レスポンスを出力
			$detail->view($db,$tmpl,$main,$r,$seq,$work_dir,$scr_php,$prefix,$opt);
			
		}
		
		// データが存在しない時
		else{echo '<p id="content_filter">0 / 0 ( 0.0% )</p>' . "\n" . $t1 . '<section id="content_main">';}
		
		// フッターテンプレートを出力
		$args['content_all'] = $tmpl->res($footer,$path);
		
	}
	
	
	//---------------------------------------------------------
	//  ID検索
	//---------------------------------------------------------
	
	static function id($detail,$db,$tmpl,$main,$path,$id)
	{
		
		// インデントタブを定義
		$t1 = "\t\t\t";
		$t2 = $t1 . "\t";
		
		// ベースディレクトリを取得
		$data_dir = $path['data_dir'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// DB名を取得
		$dbs = glob("$data_dir/$prefix*.db");
		
		// 配列を降順でソート
		rsort($dbs);
		
		// where句を定義
		$where = "where id = '$id'";
		
		// ヘッダーを出力
		echo $t1 . '<section id="content_main">' . "\n";
		echo $t2 . '<p id="content_date">' . "&lt; $id &gt;" . '</p>';
		
		// DB名を取得するループ
		foreach($dbs as $t_db)
		{
			
			// マスターDBの時は次へ
			if(preg_match('/_master/',$t_db)){continue;}
			
			// ファイル名を切り出す
			$t_db = basename($t_db);
			
			// テーブル名を切り出す
			$d_table = preg_replace("/($prefix)([^\.]*)\.db/","$1" . '_d' . "$2",$t_db);
			
			// DBに接続
			$db->attach($t_db);
			
			//////////////////////////////////////////////////////////////////////
			
			// SQLを定義
			$q = "select count(ip_address) as cnt from $d_table $where;";
			
			// 該当件数を取得
			$seq = $db->query_fetch($q,'cnt');
			
			// データが無い時は次へ
			if(!$seq){$db->detach();continue;}
			
			// SQLを定義
			$q = "select * from $d_table $where order by a_date desc,l_time desc;";
			
			// SQLを実行
			$r = $db->query($q);
			
			// レスポンスを出力
			$detail->view($db,$tmpl,$main,$r,$seq,$work_dir,$scr_php,$prefix,'id');
			
			// DBから切断
			$db->detach();
			
		}
		
		// ポップアップ<script>を出力
		echo "\n" . $t2 . '<p id="pop"></p>';
		echo "\n" . $t2 . '<script type="text/javascript" src="' . $scr_php . '/popup/"></script>';
		
	}
	
	
	//---------------------------------------------------------
	//  ドメインデータ取得
	//---------------------------------------------------------
	
	static function domain_where($db,$item,$prefix)
	{
		
		// 配列を初期化
		$nos = array();
		
		// データテーブル名を定義
		$n_table = $prefix . '_referrer';
		
		// SQLを定義
		$q = "select no from $n_table where url like '%$item%';";
		
		// SQLを実行
		$r = $db->query($q);
		
		// データ取得ループ
		while($a = $db->fetch($r))
		{
			
			// 検索条件を配列にセット
			array_push($nos,'referrer = ' . $a['no']);
			
		}
		
		// 検索条件に結合
		$where = '(' . implode(' or ',$nos) . ')';
		
		// where句を返す
		return $where;
		
	}
	
	
	//---------------------------------------------------------
	//  ディレクトリデータ取得
	//---------------------------------------------------------
	
	static function dir_where($db,$args,$prefix)
	{
		
		// 変数を初期化
		$where = 'like';
		
		// ディレクトリを取得
		$dir = preg_replace("/.*\/(http.+\/)dir\//","$1",$_SERVER['REQUEST_URI']);
		
		// 「/」をエスケープ
		$dir2 = preg_replace('/\//','\/',$dir);
		
		// 配列を初期化
		$nos = array();
		
		// データテーブル名を定義
		$n_table = $prefix . '_page';
		
		// SQLを定義
		$q = "select no,url from $n_table where url like '$dir%';";
		
		// SQLを実行
		$r = $db->query($q);
		
		// データ取得ループ
		while($a = $db->fetch($r))
		{
			
			// URLからディレクトリを削除
			$page = preg_replace("/$dir2/",'',$a['url']);
			
			// 「/」が含まれる場合は次へ
			if(preg_match('/\//',$page)){continue;}
			
			// データを取得
			$no = $a['no'];
			
			// 検索条件を配列にセット
			array_push($nos,"page_route = '$no' or page_route like '$no-%' or page_route like '%-$no-%' or page_route like '%-$no'");
			
		}
		
		// 検索条件に結合
		$where = '(' . implode(' or ',$nos) . ')';
		
		// where句を返す
		return $where;
		
	}
	
}

