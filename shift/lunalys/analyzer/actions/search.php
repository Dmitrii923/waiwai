<?php

class Search
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
	//  詳細検索フォーム生成
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// モード名を取得
		$act = $args['act'];
		
		// 年を取得
		$y = $args['y'];
		
		// 月を取得
		$m = $args['m'];
		
		// 年を変数にセット
		$v['y'] = $y;
		
		// 月を変数にセット
		$v['m'] = $m;
		
		// ログテーブル名を定義
		$i_table = $prefix . '_i_' . $y . '_' . $m;
		
		// インデントタブを定義
		$tab6 = "\n\t\t\t\t\t\t\t";
		$tab7 = $tab6 . "\t";
		$tab9 = $tab7 . "\t";;
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){return;}
		
		// DBに接続
		$db->attach($t_db,'t');
		
		////////////////////////////////////////////////////////////
		
		// ヘッダー,メイン,フッター テンプレートを取得
		list($header,$main,$footer) = $tmpl->read('search.htm');
		
		// テンプレートを出力
		$tmpl->view($header,$path);
		
		// メニューナビリンクの文字を取得
		$title = parse_ini_file($work_dir . '/templates/ini/title.ini');
		
		////////////////////////////////////////////////////////////
		
		// データファイル定数名を定義
		$n_table = $prefix . '_page';
		
		// 項目名配列を定義
		$params = array('referrer','click','page','search_words','os','ua','host_domain','client_size','display_size');
		
		////////////////////////////////////////////////////////////
		
		// 項目別に<option>を出力するループ
		while(list(,$param) = each($params))
		{
			
			// 項目名を定義
			$v['name'] = $title[$param];
			
			// name属性を定義
			$v['n'] = $param;
			
			// チェック用name/id属性を定義
			$v['n_eq'] = $param . '_eq';
			$v['n_ne'] = $param . '_ne';
			
			// 空欄<option>をセット
			$v['option'] = $tab9 . '<option></option>';
			
			// SQLを定義
			if(preg_match('/referrer|page|click/',$param))
			{
				
				// ページ番号テーブル名を定義
				$n_table = $prefix . '_' . $param;
				
				// SQLを定義
				$q = "select no,title from $i_table,$n_table where type = '$param' and name = no order by cnt desc;";
				
			}
			
			// SQLを定義
			else{$q = "select name from $i_table where type = '$param' order by cnt desc;";}
			
			// SQLを実行
			$r = $db->query($q);
			
			// データ取得ループ
			while($a = $db->fetch($r))
			{
				
				// タブをセット
				$v['option'] .= $tab9;
				
				// リンク元,ページの時
				if(preg_match('/referrer|page|click/',$param)){$v['option'] .= '<option value="' . $a['no'] . '">' . $a['title'] . '</option>';}
				
				// それ以外の時
				else{$v['option'] .= '<option>' . $a['name'] . '</option>';}
				
			}
			
			// テンプレートを出力
			$tmpl->view($main,$v);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// テンプレートを出力
		$tmpl->view($footer,$v);
		
	}
	
}

