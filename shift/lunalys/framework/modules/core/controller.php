<?php

class Controller
{
	
	//---------------------------------------------------------
	//  メインコントローラ
	//---------------------------------------------------------
	
	static function execute($base_dir,$work_dir)
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 変数を初期化
		$obj   = array();
		$args  = array();
		$path  = array();
		$conf  = array();
		$fw    = array();
		$load  = array();
		$slash = array();
		$path_info = '';
		
		// 設定ファイルを解析
		$fw   = parse_ini_file($work_dir . '/configs/fw.ini');
		$conf = parse_ini_file($work_dir . '/configs/conf.ini');
		
		// 時差設定をスーパーグローバル変数にセット
		$_SERVER['GMT_DIFF'] = $fw['gmt_diff'];
		
		// ディレクトリ＆ファイルパスを定義
		$fw_dir    = $base_dir . '/' . $fw['fw_dir'];
		$data_dir  = $base_dir . '/' . $fw['data_dir'];
		$error_log = $data_dir . '/' . $fw['error_log'];
		
		// iniオプションを設定
		ini_set('date.timezone'  ,$fw['date.timezone']);
		ini_set('error_reporting',$fw['error_reporting']);
		ini_set('display_errors' ,$fw['display_errors']);
		ini_set('log_errors'     ,$fw['log_errors']);
		ini_set('error_log'      ,$error_log);
		
		////////////////////////////////////////////////////////////
		
		// [パスの取得] //
		
		// スクリプトファイルパスを取得
		$scr_php = $_SERVER['SCRIPT_NAME'];
		
		// PATH_INFOがある時は削除
		$scr_php = preg_replace('/(\/.+\.php).*/',"$1",$scr_php);
		
		// スクリプトディレクトリを取得
		$scr_dir = dirname($scr_php);
		
		// mod_rewrite 経由の時はディレクトリをスクリプトパスに設定
		if(isset($_SERVER['MOD_REWRITE'])){$scr_php = $scr_dir;}
		
		// パスをグローバル変数にセット
		$path['fw_dir']   = $fw_dir;
		$path['work_dir'] = $work_dir;
		$path['data_dir'] = $data_dir;
		$path['scr_php']  = $scr_php;
		$path['scr_dir']  = $scr_dir;
		$path['main_db']  = $fw['main_db'];
		$path['prefix']   = $fw['prefix'];
		
		////////////////////////////////////////////////////////////
		
		// [呼出引数の取得] //
		
		// 引数を$argsにセット
		$args = ($_SERVER['REQUEST_METHOD'] === 'GET') ? $_GET : $_POST;
		
		// ORIG_PATH_INFO が存在する時
		if(isset($_SERVER['ORIG_PATH_INFO']))
		{
			
			// 「/」をエスケープ
			$scr_php = addcslashes($scr_php,'/');
			
			// スクリプトファイルパスを削除
			$path_info = preg_replace("/$scr_php/A",'',$_SERVER['ORIG_PATH_INFO']);
			
		}
		
		// PATH_INFO を取得
		elseif(isset($_SERVER['PATH_INFO'])){$path_info = $_SERVER['PATH_INFO'];}
		
		////////////////////////////////////////////////////////////
		
		// [アクションのディスパッチ] //
		
		// PATH_INFO が存在する時
		if($path_info and $path_info !== '/')
		{
			
			// スラッシュで分割
			$slash = explode('/',substr($path_info,1));
			
			// 引数の数を取得
			$c = count($slash);
			
			// 値を$argsへ代入
			for($i = 0;$i < $c;$i++){$args[$i] = $slash[$i];}
			
			// 末尾の空白チェック用
			$i--;
			
			// 末尾の空白を削除
			if(!$args[$i]){unset($args[$i]);}
			
			// 第一引数をアクションに設定
			$args['act'] = $args[0];
			
		}
		
		// デフォルトのアクションを設定
		else{if(!isset($args['act'])){$args['act'] = 'index';}}
		
		// アクション名を取得
		$act = $args['act'];
		
		// アクションが未定義の時
		if(!file_exists($work_dir . '/actions/' . $act . '.php')){exit("Undefined Action [$act]");}
		
		////////////////////////////////////////////////////////////
		
		// [汎用クラスのインクルード] //
		
		// テンプレートクラスを読み込み
		include($fw_dir . '/modules/core/template.php');
		
		// インスタンスを生成
		$obj['tmpl'] = new Template($work_dir);
		
		// インクルードファイル名を定義
		$load_ini = $work_dir . '/configs/load.ini';
		
		// インクルードファイルが存在する時
		if(file_exists($load_ini))
		{
			
			// インクルードファイルをパース
			$load = parse_ini_file($load_ini);
			
			// インクルードファイル読み込みループ
			while(list($ins,$class) = each($load))
			{
				
				// クラスを読み込み
				include($fw_dir . '/modules/library/' . $class . '.php');
				
				// クラスインスタンスを生成し配列に格納
				$obj[$ins] = new $class();
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// [メイン処理] //
		
		// クラスを読み込み
		include($work_dir . '/actions/' . $act . '.php');
		
		// コントロール設定を取得
		list($auth,$db,$pre,$post) = call_user_func($act . '::control');
		
		// ログイン認証
		if($auth)
		{
			
			// ログイン認証クラスを読み込み
			include($fw_dir . '/modules/core/login.php');
			
			// ログイン認証実行
			Login::execute($work_dir,$obj['tmpl']->tmpl_dir);
			
		}
		
		// DB接続
		if($db)
		{
			
			// DBクラスを読み込み
			include($fw_dir . '/modules/core/db.php');
			
			// インスタンスを生成
			$obj['db'] = new DB($data_dir);
			
			// DBに接続
			$obj['db']->connect($fw['main_db']);
			
		}
		
		// プレフィルター
		if($pre)
		{
			
			// クラスを読み込み
			include($work_dir . '/filters/' . $pre . '.php');
			
			// プレ処理を実行
			call_user_func($pre . '::execute');
			
		}
		
		// アクションを実行
		call_user_func($act . '::execute');
		
		// ポストフィルター
		if($post)
		{
			
			// クラスを読み込み
			include($work_dir . '/filters/' . $post . '.php');
			
			// ポスト処理を実行
			call_user_func($post . '::execute');
			
		}
		
	}
	
}

