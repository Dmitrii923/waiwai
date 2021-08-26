<?php

class Version
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
		global $obj,$path;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// テンプレートファイルを読み込み
		$tmpl_d = $tmpl->read('version.htm',false);
		
		// スクリプトバージョンファイルを解析
		$scr_ver = parse_ini_file($work_dir . '/templates/ini/version.ini');
		
		// スクリプトバージョンを取得
		$v['scr_ver'] = $scr_ver['scr_ver'];
		
		// PHPバージョンを取得
		$v['php_ver'] = PHP_VERSION;
		
		// DBバージョンを取得
		$v['sqlite_ver'] = $db->version();
		
		// Webサーバー名を取得
		$server_software = (isset($_SERVER['SERVER_SOFTWARE'])) ? $_SERVER['SERVER_SOFTWARE'] : 'unkown';
		
		// Apache or IIS の時
		if(preg_match('/(Apache|IIS)\/([\d\.]*)/',$server_software,$hits))
		{
			
			// Webサーバー名を取得
			$v['server_name'] = $hits[1];
			
			// バージョンを取得
			$v['server_ver'] = $hits[2];
			
		}
		
		// それ以外の時
		else
		{
			
			// Webサーバー名を取得
			$v['server_name'] = ($server_software == 'Apache') ? 'Apache' : 'Web Server';
			
			// バージョンを取得
			$v['server_ver'] = 'Unknown';
			
		}
		
		// メインテンプレートを出力
		$tmpl->view($tmpl_d,$v);
		
	}
	
}

