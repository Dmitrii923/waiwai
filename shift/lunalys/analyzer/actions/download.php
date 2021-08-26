<?php

class Download
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(true,true,false,false);
		
	}
	
	
	//---------------------------------------------------------
	//  ログダウンロード
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db = $obj['db'];
		
		// テーブル名を取得
		$table = $args[1];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// テーブル名を分解
		if(preg_match("/(\d{4}_\d{2})/",$table,$h))
		{
			
			// DB名を取得
			$t = $prefix . '_' . $h[1] . '.db';
			
			// DBが存在しない時は終了
			if(!$db->exists($t)){return;}
			
			// DBを追加接続
			$db->attach($t,'t');
			
		}
		
		// ダウンロード用ヘッダーを出力
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . $table . '.csv');
		
		// SQLを定義
		$q = "select * from $table;";
		
		// SQL実行
		$r = $db->query($q);
		
		// タイムアウト時間を60秒に設定
		//set_time_limit(60);
		
		// 詳細ログを表示するループ
		while($a = $db->fetch($r))
		{
			
			// 実体文字参照に変換
			if(isset($a['url'])){$a['url'] = preg_replace('/,/','&#44;',$a['url']);}
			
			// 「,」で区切って出力
			echo preg_replace("/[\r\n\f\t\a\e\b]/",'',implode(',',$a)) . "\n";
			
		}
		
	}
	
}

