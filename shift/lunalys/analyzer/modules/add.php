<?php

class Add
{
	
	//---------------------------------------------------------
	//  パラメータ追記
	//---------------------------------------------------------
	
	static function add_size($db,$where,$d_table,$i_table,$id,$visit)
	{
		
		// ディスプレイ解像度,ブラウザ表示領域を取得
		list($display_size,$client_size) = Client_Size::size();
		
		// SQLを定義
		$q = "select seq,display_size from $d_table $where;";
		
		// トランザクション開始
		$db->begin('immediate');
		
		// SQLを実行
		$a = $db->query_fetch($q);
		
		// データが存在しないもしくは追記済の時は終了
		if(!$a or $a['display_size']){return Logging::close($db,'rollback');}
		
		// シークエンスを取得
		$seq = $a['seq'];
		
		// 訪問回数を増やす
		++$visit;
		
		// SQLを定義
		$q = "update $d_table set display_size = '$display_size',client_size = '$client_size',id = '$id',visit = $visit where seq = $seq;";
		
		// SQLを実行
		$db->query($q);
		
		// パラメータ統計テーブルを更新
		Logging::update_i_table($db,$i_table,'display_size',$display_size);
		Logging::update_i_table($db,$i_table,'client_size' ,$client_size);
		
		// 再訪の時はテーブルを更新
		if($visit > 1){Logging::update_i_table($db,$i_table,'visit',$visit);}
		
		// DB接続終了
		Logging::close($db);
		
		// Cookieを発行
		Logging::set_cookie($id,$visit);
		
	}
	
}

