<?php

class Log_Data
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
	//  管理メニュー表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		// マスターDB名を取得
		$main_db = $path['main_db'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// DBが存在しない時は終了
		if(!$db->exists($main_db)){return;}
		
		// ベースディレクトリを取得
		$data_dir = $path['data_dir'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// 変数を別名でコピー
		$v = $path;
		
		// 変数を初期化
		$v['convert'] = '';
		
		////////////////////////////////////////////////////////////
		
		// ヘッダー,メイン,フッター テンプレートを取得
		list($total_form,$master_p,$header,$main,$footer) = $tmpl->read('log_data.htm');
		
		// リクエストメソッドがPOSTの時
		if($_SERVER['REQUEST_METHOD'] === 'POST')
		{
			
			// 処理タイプを取得
			$type = $args[1];
			
			// 変更/削除処理実行
			$v['convert'] = self::$type($db,$prefix,$data_dir,$work_dir);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// フラグを初期化
		$v['t_flag'] = false;
		
		// カウントテーブル名を定義
		$t_table = $prefix . '_total';
		
		// SQLを定義
		$q = "select * from $t_table;";
		
		// SQLを実行
		$a = $db->query_fetch($q);
		
		// カウントデータが存在する時
		if($a)
		{
			
			// 累計アクセス数を取得
			$v['u_t'] = $a['u_t'];
			$v['p_t'] = $a['p_t'];
			
			// フラグをtrueにセット
			$v['t_flag'] = true;
			
		}
		
		// カウントデータが存在しない時
		else
		{
			
			// 累計アクセス数を取得
			$v['u_t'] = 0;
			$v['p_t'] = 0;
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 累計カウント修正テンプレートを出力
		$tmpl->view($total_form,$v);
		
		// マスターテーブルを出力
		if($v['t_flag']){$tmpl->view($master_p,$v);}
		
		// ファイル名を取得
		$files = glob("$data_dir/$prefix*.db");
		
		// 月間テーブルリストを出力
		self::m_tables($tmpl,$files,$header,$main,$footer);
		
	}
	
	
	//---------------------------------------------------------
	//  テーブル名表示
	//---------------------------------------------------------
	
	static function m_tables($tmpl,$files,$header,$main,$footer)
	{
		
		// グローバル変数を定義
		global $path;
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// 降順ソート
		rsort($files);
		
		// 変数を初期化
		$ts = array('l','i','d');
		$v  = array();
		
		// スクリプト名を取得
		$v['scr_php'] = $path['scr_php'];
		
		// ファイル名を取得するループ
		while(list(,$f) = each($files))
		{
			
			// 検索DB名を定義
			$t = $prefix . '_)(\d{4}_\d{2}';
			
			// テーブル名配列に入れる
			if(!preg_match("/($t)\.db/",$f,$h)){continue;}
			
			// ヘッダーテンプレートを出力
			$tmpl->view($header);
			
			// テーブル名出力ループ
			foreach($ts as $t)
			{
				
				// テーブル名を定義
				$v['table'] = $prefix . '_' . $t . '_' . $h[2];
				
				// メインテンプレートを出力
				$tmpl->view($main,$v);
				
			}
			
			// フッターテンプレートを出力
			$tmpl->view($footer);
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  累計アクセス数の変更
	//---------------------------------------------------------
	
	static function cnt_rw($db,$prefix)
	{
		
		// グローバル変数を定義
		global $args;
		
		// カウントテーブル名を定義
		$t_table = $prefix . '_total';
		
		// アクセス数を取得
		$u_t = ($args['u_t']) ? preg_replace('/[^0-9]/','',$args['u_t']) : 0;
		$p_t = ($args['p_t']) ? preg_replace('/[^0-9]/','',$args['p_t']) : 0;
		
		// 空欄の場合は0をセット
		if(!$u_t){$u_t = 0;}
		if(!$p_t){$p_t = 0;}
		
		// SQLを定義
		$q = "update $t_table set u_t = $u_t,p_t = $p_t;";
		
		// SQL実行
		$db->query($q);
		
	}
	
	
	//---------------------------------------------------------
	//  ログコンバート
	//---------------------------------------------------------
	
	static function convert($db,$prefix,$data_dir,$work_dir)
	{
		
		// クラスを読み込み
		include($work_dir . '/modules/sql.php');
		
		// クラスインスタンスを取得
		$sql = new SQL();
		
		// 変数を初期化
		$convert = '';
		$tab = "\n\t\t\t\t\t";
		
		// DB名を取得
		$dbs = glob("$data_dir/$prefix*.db");
		
		// 配列を降順でソート
		rsort($dbs);
		
		// DB名を取得するループ
		while(list(,$t_db) = each($dbs))
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
			$q = "select * from $d_table limit 1;";
			
			// SQLを実行
			$a = $db->query_fetch($q);
			
			// 新データの時は次へ
			if(!$a or isset($a['seq'])){$db->detach();continue;}
			
			// データ挿入用SQLを定義
			$q = "drop table $d_table;";
			
			// SQLを実行
			$db->query($q);
			
			// テーブルを作成
			$db->query($sql->create_d_table($d_table));
			
			// DBから切断
			$db->detach();
			
			// メッセージを追記
			$convert .=  $tab . '<p class="convert">' . $d_table . ' をリセットしました！</p>';
			
			// 次へ
			continue;
			/*
			// SQLを定義
			$q  = "alter table $d_table add column ua_full varchar(300);";
			
			// SQLを実行
			$db->query($q);
			
			// DBから切断
			$db->detach();
			
			// メッセージを追記
			$convert .=  $tab . '<p class="convert">' . $d_table . ' を変換しました！</p>';
			*/
		}
		
		// メッセージを追記
		if(!$convert){$convert = $tab . '<p class="convert">変換は必要ありませんでした！</p>';}
		
		// メッセージを返す
		return $convert;
		
	}
	
}

