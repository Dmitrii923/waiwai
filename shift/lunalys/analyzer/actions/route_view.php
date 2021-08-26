<?php

class Route_View
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
	//  アクセスルート表示（Ajaxでは無い時）
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// ヘッダー,メイン,フッター テンプレートを取得
		list($header,$main,$footer) = $tmpl->read('route_view.htm');
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// ページ番号テーブル名を定義
		$n_table = $prefix . '_page';
		
		// ページ番号を取得
		$no = $args[1];
		
		// 接続時間を取得
		$time = (isset($args[2])) ? $args[2] : '';
		
		// 接続時間を取得
		$click = (isset($args[3])) ? $args[3] : '';
		
		// 変数を初期化
		$times = array();
		
		// 滞在時間が存在する時 
		if($time){$times = explode('-',$time . '-');}
		
		// 滞在時間が存在しない時
		else{$times[0] = '';}
		
		////////////////////////////////////////////////////////////
		
		// アクセスルートを表示
		self::view($db,$tmpl,$no,$times,$n_table,$header,$main,$footer);
		
		// クリックルートが存在しない時は終了
		if(!$click){return;}
		
		// 変数を初期化
		$times = array();
		
		// クリック番号テーブル名を定義
		$n_table = $prefix . '_click';
		
		// <hr />を出力
		echo "\n\t\t\t\t" . '<hr />' . "\n";
		
		// クリックルートを表示
		self::view($db,$tmpl,$click,$times,$n_table,$header,$main,$footer);
		
	}
	
	
	//---------------------------------------------------------
	//  ルート表示
	//---------------------------------------------------------
	
	static function view($db,$tmpl,$no,$times,$n_table,$header,$main,$footer)
	{
		
		// テンプレート変数を初期化
		$v = array();
		$f = array();
		
		// アクセスルートをp_noに分割
		$nos = explode('-',$no);
		
		// カウントを初期化
		$c = count($nos);
		
		// アクセスルートをp_noに分割
		$where = 'where no = ' . implode(' or no = ',$nos);
		
		// SQLを定義
		$q = "select * from $n_table $where;";
		
		// SQLを実行
		$r = $db->query($q);
		
		////////////////////////////////////////////////////////////
		
		// データ取得ループ
		while($a = $db->fetch($r))
		{
			
			// ページ番号を取得
			$n = $a['no'];
			
			// URLを配列に格納
			$f[$n]['url'] = $a['url'];
			
			// タイトルを配列に格納
			$f[$n]['title'] = $a['title'];
			
		}
		
		////////////////////////////////////////////////////////////
		
		// ヘッダーテンプレートを出力
		$tmpl->view($header);
		
		// ページタイトル表示ループ
		for($i = 0;$i < $c;$i++)
		{
			
			// ページ番号を取得
			$n = $nos[$i];
			
			// タイトルが存在する時
			if(isset($f[$n]['url']))
			{
				
				// 滞在時間を取得
				$t = (isset($times[$i])) ? ' &nbsp;' . $times[$i] : '';
				
				// テンプレート変数にタイトルをセット
				$v['title']  = '<a href="http://act.st/lunasys/jump.php/' . $f[$n]['url'] . '" class="out">';
				$v['title'] .= $f[$n]['title'] . '</a>' .  $t;
				
			}
			
			// タイトルが存在しない時
			else{$v['title'] = 'undefined';}
			
			// メインテンプレートを出力
			$tmpl->view($main,$v);
			
		}
		
		// フッターテンプレートを出力
		$tmpl->view($footer);
		
	}
	
}

