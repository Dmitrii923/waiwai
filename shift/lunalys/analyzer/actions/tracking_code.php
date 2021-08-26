<?php

class Tracking_Code
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(true,false,'header','footer');
		
	}
	
	
	//---------------------------------------------------------
	//  ヘルプ表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj;
		
		// 変数を初期化
		$v = array();
		
		// 汎用クラスインスタンスを取得
		$date = $obj['date'];
		$tmpl = $obj['tmpl'];
		
		// テンプレートファイルを読み込み
		$tmpl_d = $tmpl->read('tracking_code.htm',false);
		
		// write_php tracker.phpのパスを取得
		$v['write_php']   = getcwd() . '/<span class="red">write.php</span>';
		$v['tracker_php'] = getcwd() . '/tracker.php';
		
		// プロトコルを取得
		$protocol = (!isset($_SERVER['HTTPS']) or $_SERVER['HTTPS'] === 'off') ? 'http' : 'https';
		
		// URLディレクトリを取得
		$v['url_dir'] = $protocol . '://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']);
		
		// 今日の年月を取得
		list($v['y'],$v['m']) = $date->now_date();
		
		// メインテンプレートを出力
		$tmpl->view($tmpl_d,$v);
		
	}
	
}

