<?php

class SP
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(false,true,false,'footer');
		
	}
	
	
	//---------------------------------------------------------
	//  メイン処理
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// フレームワークディレクトリを取得
		$fw_dir = $path['fw_dir'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// テンプレートディレクトリを再定義
		$obj['tmpl']->tmpl_dir = $work_dir . '/templates/htm/sp';
		
		// 折れ線グラフ設定をoffに変更
		$conf['line_chart'] = 0;
		
		// 変数を初期化
		$new_args = array();
		
		// アクション名（sp）を削除
		unset($args['act']);
		unset($args[0]);
		
		// アクション名を取得
		$act = (isset($args[1])) ? $args[1] : 'index';
		
		// リクエストメソッドを取得
		$method = $_SERVER['REQUEST_METHOD'];
		
		// GETメソッドの時
		if($method === 'GET')
		{
			
			// データ取得ループ
			while(list($key,$val) = each($args))
			{
				
				// キーをデクリメント
				$i = --$key;
				
				// 値を新しい配列にセット
				$new_args[$i] = $val;
				
			}
			
			// 配列を入れ直し
			$args = $new_args;
			
		}
		
		// アクション名を再定義
		$args['act'] = $act;
		
		////////////////////////////////////////////////////////////
		
		// ログイン認証クラスを読み込み
		include($fw_dir . '/modules/core/login.php');
		
		// ヘッダークラスを読み込み
		include($work_dir . '/filters/header.php');
		
		// メインクラスを読み込み
		include($work_dir . '/actions/' . $act . '.php');
		
		// ログイン処理実行
		Login::execute($work_dir,$obj['tmpl']->tmpl_dir);
		
		// ヘッダー処理実行
		Header::execute();
		
		// メイン処理実行
		call_user_func($act . '::execute');
		
	}
	
}

