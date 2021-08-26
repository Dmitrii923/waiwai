<?php

class Shortcut
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
	//  ログ表示
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
		
		// プレフィックスを取得
		$prefix = $path['prefix'];
		
		// データディレクトリを取得
		$data_dir = $path['data_dir'];
		
		// 表示種別（モード）を取得
		$type = $args[1];
		
		// パラメータ種別を取得
		$param = $args[2];
		
		// 指定年月日を取得
		$y = $args['y'];
		$m = $args['m'];
		
		// メニュー＆タイトル配列を取得
		$menu  = $args['menu'];
		$title = $args['title'];
		
		// 変数を初期化
		$limit = 0;
		
		// リンクを定義
		$link = '<a href="' . "$scr_php/$type/";
		
		////////////////////////////////////////////////////////////
		
		// テンプレートを分割
		list($header,$main,$footer) = $tmpl->read('shortcut.htm');
		
		// ヘッダーテンプレートを出力
		$tmpl->view($header);
		
		////////////////////////////////////////////////////////////
		
		// テンプレート変数をリセット
		$v = array();
		$a = array();
		
		// 詳細 or 日別統計 の時
		if($type === 'detail' or $type === 'param_daily')
		{
			
			// DB名を定義
			$t_db = $prefix . '_' . $y . '_' . $m . '.db';
			
			// DBが存在する時
			if($db->exists($t_db))
			{
				
				// DBに接続
				$db->attach($t_db,'t');
				
				// 詳細ログテーブル名を定義
				$l_table = $prefix . '_l_' . $y . '_' . $m;
				
				// SQLを定義
				$q = "select max(u_td) as max_u,max(p_td) as max_p from $l_table;";
				
				// SQLを実行
				$a = $db->query_fetch($q);
				
				// 総数の桁数を取得
				$u_figure = strlen($a['max_u']);
				$p_figure = strlen($a['max_p']);
				
				// SQLを定義
				$q = "select count(a_date) as cnt from $l_table;";
				
				// 該当件数を取得
				$limit = $db->query_fetch($q,'cnt');
				
				// SQLを定義
				$q = "select a_date,u_td,p_td from $l_table order by a_date desc;";
				
				// SQLを実行
				$r = $db->query($q);
				
			}
			
		}
		
		// 詳細以外の時
		else
		{
			
			// DB一覧を取得
			$files = glob("$data_dir/$prefix*.db");
			
			// 降順で配列をソート
			rsort($files);
			
			// 該当件数を取得
			$limit = count($files);
			
			// パラメータ統計ログテーブル名を定義
			$i_table = $prefix . '_i_' . $y;
			
		}
		
		////////////////////////////////////////////////////////////
		
		// パラメータ統計の時
		if($type === 'param' or $type === 'pie_chart' or $type === 'transition')
		{
			
			// iniファイルのキーを定義
			$type = $param;
			
			// リンクに追記
			$link .= $param . '/';
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 区切り文字を定義
		$tab = " &nbsp;|&nbsp;\n\t\t\t\t\t\t\t";
		
		// 詳細ログを表示するループ
		for($i = 0;$i < $limit;$i++)
		{
			
			// 詳細 or 日別統計 の時
			if($type === 'detail' or $type === 'param_daily')
			{
				
				// データを取り出し
				$a = $db->fetch($r);
				
				// 日付を分割
				list($y,$m,$d) = explode('-',$a['a_date']);
				
				// 表示項目に日付を定義
				$v['name'] = "&nbsp;&nbsp; $y/$m/$d &nbsp;|&nbsp; ";
				
				// ユニーク数 / PV数 を表示項目に追記
				$v['name'] .= str_pad($a['u_td'],$u_figure,'0',STR_PAD_LEFT) . ' / ';
				$v['name'] .= str_pad($a['p_td'],$p_figure,'0',STR_PAD_LEFT);
				
				// 年月データを整形
				$ym = "$y/$m/$d/";
				
			}
			
			// 詳細以外の時
			else
			{
				
				// 検索DB名を定義
				$match = $prefix . '_' . $y . '_(\d{2})\.db';
				
				// 月間DBではない時は次へ
				if(!preg_match("/$match/",$files[$i],$h)){continue;}
				
				// 表示項目に日付を定義
				$v['name'] = '&nbsp;&nbsp; ' . $y . '/' . $h[1];
				
				// 年月データを整形
				$ym = $y . '/' . $h[1] . '/';
				
			}
			
			// オプションデータが存在しない時はタイトルを配列にセット
			if(!isset($menu[$type])){$menu[$type]['base'] = $title[$type];}
			
			// グラフの時
			if($type === 'graph')
			{
				
				// iniファイル読み込みループ
				foreach($menu[$type] as $key => $val)
				{
					
					// 表示項目に追記
					$v['name'] .=  $tab . $link . $key . '/' . $ym . '">' . $val . '</a>';
					
				}
				
				// 配列データ取得ループ
				foreach($menu['cal'] as $key => $val)
				{
					
					// 表示項目に追記
					$v['name'] .=  $tab . $link . 'timely/' . $ym . $key . '/">' . $val . '</a>';
					
				}
				
			}
			
			// 日間パラメータ統計の時
			elseif($type === 'param_daily')
			{
				
				// iniファイル読み込みループ
				foreach($menu[$type] as $key => $val)
				{
					
					// 表示項目に追記
					$v['name'] .=  $tab . $link . $key . '/' . $ym . '">' . $val . '</a>';
					
				}
				
			}
			
			// グラフ以外の時
			else
			{
				
				// iniファイル読み込みループ
				foreach($menu[$type] as $key => $val)
				{
					
					// 基本の時はkeyを空欄にする
					$opt = ($key === 'base') ? '' : $key . '/';
					
					// 表示項目に追記
					$v['name'] .=  $tab . $link . $ym . $opt . '">' . $val . '</a>';
					
				}
				
			}
			
			// 色分け用class属性を定義
			$v['tr'] = ($i % 2 === 0) ? 1 : 2;
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
		}
		
		// フッターテンプレートを出力
		$tmpl->view($footer,$v);
		
	}
	
}

