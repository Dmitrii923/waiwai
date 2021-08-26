<?php

class Popup
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
	//  JavaScript生成
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$path;
		
		// 汎用クラスインスタンスを取得
		$db = $obj['db'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// p_noテーブル名を定義
		$n_table = $prefix . '_page';
		
		// 変数を初期化
		$p_no_d = "p_nos[0] = 'Unknown';\n";
		
		// SQLを定義
		$q = "select no,title from $n_table;";
		
		// テーブルを生成
		$r = $db->query($q);
		
		// データ取得ループ
		while($a = $db->fetch($r))
		{
			
			// タイトルをエスケープ
			$a['title'] = preg_replace("/(\\\\|')/","\\\\$1",$a['title']);
			
			// 配列格納用定義を変数に付け足し
			$p_no_d .= 'p_nos[' . $a['no'] . "] = '" . $a['title'] . "';\n";
			
		}
		
		// p_noテーブル名を定義
		$n_table = $prefix . '_click';
		
		// SQLを定義
		$q = "select no,title from $n_table;";
		
		// テーブルを生成
		$r = $db->query($q);
		
		// データ取得ループ
		while($a = $db->fetch($r))
		{
			
			// タイトルをエスケープ
			$a['title'] = preg_replace("/(\\\\|')/","\\\\$1",$a['title']);
			
			// 配列格納用定義を変数に付け足し
			$p_no_d .= "p_nos['c" . $a['no'] . "'] = '" . $a['title'] . "';\n";
			
		}
		
		// JavaScript用ヘッダーを出力
		header("Content-type: application/x-javascript; charset=UTF-8");
		
		// JavaScriptを出力
		echo $p_no_d;
		
	}
	
}

