<?php

class Pie_Chart
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
	//  ヘルプ表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$path,$args;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
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
		
		// パラメータログテーブル名を定義
		$i_table = $prefix . '_i_' . $y . '_' . $m;
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){return;}
		
		////////////////////////////////////////////////////////////
		
		// クラスを読み込み
		include($work_dir . '/actions/param.php');
		
		// クラスインスタンスを生成
		$obj_param = new Param();
		
		// テンプレートを分割
		list($head,$main,$foot) = $tmpl->read('param_daily.htm');
		
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
		
		// 表示件数を設定
		$param_limit = 9;
		
		// 定数を定義
		define('max_len',40);
		define('jump_php',$jump_php);
		
		// 簡易検索用リンクを定義
		$link = "$scr_php/detail_search/$param/$y/$m/xx";
		
		////////////////////////////////////////////////////////////
		
		// 有無フィルターの時
		if($opt === 'exists'){$replace = 'replace_opt_exists';}
		
		// ドメインフィルターの時
		elseif($opt === 'domain' or $opt === 'search'){list($replace,$column2,$from,$where) = $obj_param->domain($prefix);}
		
		// 統合フィルターの時
		elseif($opt === 'arrange'){list($replace,$where) = $obj_param->opt_arrange($scr_php,$act,$param,$where,$y,$m);}
		
		// ページ,リンク先,リンク元の時
		elseif($param === 'page' or $param === 'click' or $param === 'referrer'){list($replace,$column2,$from,$where,$param,$opt,$slash) = $obj_param->page($db,$param,$opt,$prefix);}
		
		// 検索キーワードの時
		elseif($param === 'search_words'){list($replace,$where,$param,$opt,$opt2) = $obj_param->search_words($param,$opt);}
		
		// 訪問回数の時
		elseif($param === 'visit'){$replace = ($opt === 'repeat') ? 'replace_opt_repeat' : 'replace_visit';}
		
		// OSの時
		elseif($param === 'os'){list($replace,$where,$opt) = $obj_param->os($opt,$pickup);}
		
		// UAの時
		elseif($param === 'ua'){list($replace,$column,$param,$where,$group,$opt,$ua_type,$order,$pickup) = $obj_param->ua($opt,$pickup);}
		
		// ホストドメインの時
		elseif($param === 'host_domain'){list($replace,$where,$opt) = $obj_param->host_domain($opt);}
		
		////////////////////////////////////////////////////////////
		
		// limit句を定義
		if(!$opt){$limit = "limit $param_limit";}
		
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
		if($opt){list($opt_d,$total_cnt,$all_rows) = $obj_param->opt_filter($db,$param,$opt,$r,$total_cnt,$i_table);$opt2 = '/';}
		
		// 携帯フィルターの時はフィルターに追記
		elseif($ua_type){$opt2 = $ua_type . '/';}
		
		// DBと切断
		$db->close();
		
		// 変数を初期化
		$v = array();
		$c = array();
		$pers  = array();
		$items = array();
		
		// テンプレート変数を初期化
		$c['pers']  = array();
		$c['items'] = array();
		
		// 最大表示件数を定義
		$limit_cnt = ($all_rows > $param_limit) ? $param_limit : $all_rows;
		
		// その他のパーセンテージを初期化
		$etc_per = 100;
		
		// ヘッダーテンプレートを追記
		$table = $head;
		
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
			if($replace){$v['name'] = $obj_param->$replace($v,$param);}
			
			// 色分け用class属性を定義
			$v['tr'] = 'b' . $i;
			
			// パーセンテージを算出
			$v['per'] = number_format($v[$order] / $total_cnt * 100,1);
			
			// 0.1未満の時は「0.1」をセット
			if($v['per'] === 0){$v['per'] = 0.1;}
			
			// 簡易検索リンクを定義
			$v['cnt'] = '<a href="' . $link . '/' . $name . $slash . $opt . $opt2 . '">' . $v['per'] . '%</a>';
			
			// 順位をセット
			$v['i'] = '<span class="c' . $i . '">■</span>';
			
			// その他からパーセンテージを減少
			$etc_per -= $v['per'];
			
			// グラフ内表示用に整形
			$i_name = strip_tags($v['name']);
			$i_name = preg_replace('/\(.+/','',$i_name);
			
			// 配列に格納
			array_push($pers ,$v['per']);
			array_push($items,"'" . $i_name . "'");
			
			// メインテンプレートを出力
			$table .= $tmpl->res($main,$v);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// その他を追加
		if($etc_per >= 0.1)
		{
			
			// 配列に格納
			array_push($pers,$etc_per);
			array_push($items,"'その他'");
			
			// テンプレート変数を定義
			$v['i']    = '<span class="c10">■</span>';
			$v['tr']   = 'b10';
			$v['name'] = 'その他';
			$v['cnt']  = $etc_per . '%';
			
			// メインテンプレートを出力
			$table .= $tmpl->res($main,$v);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// フッターテンプレートを追記
		$table .= $foot;
		
		// テンプレート変数にセット
		$c['pers']  = implode(',',$pers);
		$c['items'] = implode(',',$items);
		
		// テンプレートファイルを読み込み
		$tmpl_d = $tmpl->read('pie_chart.htm',false);
		
		// メインテンプレートを出力
		$tmpl->view($tmpl_d,$c);
		
		// 項目テーブルを出力
		echo $table;
		
	}
	
}

