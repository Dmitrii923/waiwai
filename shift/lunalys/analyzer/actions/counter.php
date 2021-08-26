<?php

class Counter
{
	
	//---------------------------------------------------------
	//  コントロール設定
	//---------------------------------------------------------
	
	static function control()
	{
		
		// コントロール設定を返す
		return array(false,true,false,false);
		
	}
	
	
	//---------------------------------------------------------
	//  テキストカウンター表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db = $obj['db'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// マスターDB名を取得
		$main_db = $path['main_db'];
		
		// DBが存在しない時は終了
		if(!$db->exists($main_db)){return;}
		
		// UU/PVを取得
		$type = $args[1];
		
		// 日付種別を取得
		$day = $args[2];
		
		// 変数を初期化
		$cnt    = '';
		$column = '';
		
		// カラムプレフィックスを定義
		$cp = ($type === 'uu') ? 'u' : 'p';
		
		// 累計テーブル名を定義
		$t_table = $prefix . '_total';
		
		// SQLを定義
		$q = "select * from $t_table;";
		
		// SQL実行
		$a = $db->query_fetch($q);
		
		// 累計カウントの時
		if($day === 'total')
		{
			
			// カラム名を定義
			$column = $cp . '_t';
			
			// JavaScriptを出力
			$cnt = $a[$column];
			
		}
		
		// 昨日/今日カウントの時
		else
		{
			
			// カラム名を定義
			$column = ($day === 'today') ? 't_date' : 'y_date';
			
			// 日付を取得
			$ymd = $a[$column];
			
			// 年月日に分割
			list($y,$m,$d) = explode('-',$ymd);
			
			// 月間テーブル名を定義
			$l_table = $prefix . '_l_' . $y . '_' . $m;
			
			// 月間DB名を定義
			$t_db = $prefix . '_' . $y . '_' . $m . '.db';
			
			// DBが存在しない時は終了
			if(!$db->exists($t_db)){return;}
			
			// 月間DBに追加接続
			$db->attach($t_db);
			
			// カラム名を定義
			$column = $cp . '_td';
			
			// SQLを定義
			$q = "select $column from $l_table where a_date = '$ymd';";
			
			// SQL実行
			$cnt = $db->query_fetch($q,$column);
			
		}
		
		// JavaScript用ヘッダーを出力
		header("Content-type: application/x-javascript; charset=UTF-8");
		
		// JavaScriptを出力
		echo 'document.write(' . $cnt . ');';
		
	}
	
}

