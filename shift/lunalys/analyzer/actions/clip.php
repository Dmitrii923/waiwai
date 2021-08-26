<?php

class Clip
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
	//  データ公開
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $args,$obj,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$date = $obj['date'];
		$tmpl = $obj['tmpl'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// マスターDB名を取得
		$main_db = $path['main_db'];
		
		// DBが存在しない時は終了
		if(!$db->exists($main_db)){return;}
		
		// 項目種別を取得
		$param = (isset($args[1])) ? $args[1] : 'referrer';
		
		// 年を取得
		$y = (isset($args[2])) ? $args[2] : '';
		
		// 月を取得
		$m = (isset($args[3])) ? $args[3] + 0 : '';
		
		// 表示件数を取得
		$limit = (isset($args[4])) ? $args[4] : 10;
		
		// 現在日付を取得する 
		if(!$y and !$m){list($y,$m) = $date->now_date();}
		
		// 月を2桁に補正
		elseif($m < 10){$m = '0' . $m;}
		
		////////////////////////////////////////////////////////////
		
		// パラメータログテーブル名を定義
		$i_table = $prefix . '_i_' . $y . '_' . $m;
		
		// 月間DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){return;}
		
		// 月間DBに追加接続
		$db->attach($t_db);
		
		// テンプレートを分割
		list($head,$main,$foot) = $tmpl->read('clip.htm');
		
		// 改行を削除
		$head = preg_replace("/\r|\n|\t/",'',$head);
		$main = preg_replace("/\r|\n|\t/",'',$main);
		$foot = preg_replace("/\r|\n|\t/",'',$foot);
		
		////////////////////////////////////////////////////////////
		
		// JavaScript用ヘッダーを出力
		header("Content-type: application/x-javascript; charset=UTF-8");
		
		// SQLを定義
		$q = "select sum(cnt) as sum from $i_table where type = '$param';";
		
		// SQLを実行
		$all_rows = $db->query_fetch($q,'sum');
		
		// データが無い時は終了
		if(!$all_rows){return;}
		
		// SQLを定義
		if($param === 'page' or $param === 'referrer' or $param === 'click')
		{
			
			// ページ番号テーブル名を定義
			$n_table = $prefix . '_' . $param;
			
			// SQLを定義
			$q = "select url,substr(title,0,24) as name,cnt from $i_table,$n_table where type = '$param' and name = no order by cnt desc limit $limit;";
			
		}
		
		// SQLを定義
		else{$q = "select name,cnt from $i_table where type = '$param' order by cnt desc limit $limit;";}
		
		// SQLを実行
		$r = $db->query($q);
		
		// JavaScriptヘッダーを出力
		echo "document.write('" . $head;
		
		////////////////////////////////////////////////////////////
		
		// カウンターを初期化
		$i = 1;
		
		// データ取得ループ
		while($v = $db->fetch($r))
		{
			
			// 色分け用class属性を定義
			$v['style'] = ($i % 2 == 0) ? '' : 'background:none;';
			
			// パーセンテージを算出
			$per = number_format($v['cnt'] / $all_rows * 100,1);
			
			// 0.1未満の時は「0.1」をセット
			if($per == 0){$per = 0.1;}
			
			// パーセンテージを整形
			$v['per'] = $per. '%';
			
			// 順位を取得
			$v['i'] = $i;
			
			// リンクを設定
			if($param === 'page' or $param === 'referrer' or $param === 'click'){$v['name'] = '<a href="' . $v['url'] . '" target="_blank">' . $v['name'] . '</a>';}
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
			// カウンターを1増加
			$i++;
			
		}
		
		////////////////////////////////////////////////////////////
		
		// テンプレート変数を初期化
		$v = array();
		
		// 年月をテンプレート変数にセット
		$v['y'] = $y;
		$v['m'] = $m;
		$v['param'] = $param;
		
		// JavaScriptフッターを出力
		echo $tmpl->view($foot,$v) . "');";
		
	}
	
}

