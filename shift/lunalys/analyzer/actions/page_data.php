<?php

class Page_Data
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
	//  ページ情報編集メニュー表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$conf,$path;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		// 変数を別名でコピー
		$v = $path;
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// マスターDB名を取得
		$main_db = $path['main_db'];
		
		// 定数を取得
		$prefix = $path['prefix'];
		
		// DBが存在しない時は終了
		if(!$db->exists($main_db)){return;}
		
		// タイプを取得
		$type = (isset($args[1])) ? $args[1] : 'page';
		
		// オプションを取得
		$opt = (isset($args[2])) ? $args[2] : '0';
		
		// テーブル名を定義
		$n_table = $prefix . '_' . $type;
		
		// カウンター変数を初期化
		$i  = 0;
		$no = 0;
		
		// オプションを変数にセット
		$v['opt']  = $opt;
		$v['type'] = $type;
		
		// エラーメッセージを初期化
		$error = '';
		
		// メニューを取得
		$menu = $args['menu'];
		
		// メニューリンクを取得
		$v['content_filter'] = Header::create_filter('page_data',$menu['page_data']);
		
		////////////////////////////////////////////////////////////
		
		// CSV編集モードの時
		if($opt === 'csv')
		{
			
			// リクエストメソッドがPOSTの時は変更処理
			if($_SERVER['REQUEST_METHOD'] === 'POST'){self::write_csv($n_table);}
			
			// データを出力
			self::view_csv($n_table,$db,$tmpl,$v);
			
			// 終了
			return;
			
		}
		
		// リクエストメソッドがPOSTの時は変更処理
		if($_SERVER['REQUEST_METHOD'] === 'POST'){$error = self::write($n_table);}
		
		////////////////////////////////////////////////////////////
		
		// SQLとリンクを取得
		list($q,$v2) = self::prev_next($n_table,$db,$tmpl,$v);
		
		// ヘッダー,メイン,フッター テンプレートを取得
		list($header,$main,$footer,$all_view) = $tmpl->read('page_data.htm');
		
		// 変数を初期化
		$main_d = '';
		$nos    = array();
		
		// SQLを実行
		$r = $db->query($q);
		
		// DBと切断
		$db->close();
		
		// データが存在する時
		while($v = $db->fetch($r))
		{
			
			// 色分け用class属性を定義
			$v['tr'] = ($i % 2 === 0) ? 1 : 2;
			
			// 編集用IDをセット
			$v['i'] = $i;
			
			// メインテンプレートを出力
			$main_d .= $tmpl->res($main,$v);
			
			// カウンタを1増加
			$i++;
			
			// Noを配列に格納
			array_push($nos,$v['no']);
			
		}
		
		// 開始＆終了Noを取得
		$v2['start_end'] = ($nos) ? $nos[0] . " ～ " . array_pop($nos) : 'no data';
		
		// ヘッダーテンプレートを出力
		$tmpl->view($header,$v2);
		
		// メインデータを出力
		echo $error . $main_d;
		
		// フッターテンプレートを出力
		$tmpl->view($footer);
		
		// 全件表示ではない時
		if($opt !== 'all' and $nos){$args['content_all'] = $tmpl->res($all_view,$v2);}
		
	}
	
	
	//---------------------------------------------------------
	//  リンク取得
	//---------------------------------------------------------
	
	static function prev_next($n_table,$db,$tmpl,$v)
	{
		
		// グローバル変数を定義
		global $path;
		
		// 全件表示の時
		if($v['opt'] == 'all')
		{
			
			// SQLを定義
			$q = "select * from $n_table order by no desc;";
			
			// 前何件へのリンクを定義
			$v['prev_link'] = 'class="no_link"';
			
			// 次何件へのリンクを定義
			$v['next_link'] = 'class="no_link"';
			
			// SQLとリンクを返す
			return array($q,$v);
			
		}
		
		// スクリプトパスを取得
		$scr_php  = $path['scr_php'];
		
		// 変数を初期化
		$type  = $v['type'];
		$start = $v['opt'];
		$limit = 100;
		
		// SQLを定義
		$q = "select count(*) as cnt from $n_table;";
		
		// 総数を取得
		$all_rows = $db->query_fetch($q,'cnt');
		
		// 開始番号が0未満の時
		if($start < 0){$start = 0;}
		
		// 開始番号が総数以上の時
		elseif($start > $all_rows){$start = $all_rows;}
		
		// SQLを定義
		$q = "select * from $n_table order by no desc limit $start,$limit;";
		
		////////////////////////////////////////////////////////////
		
		// リンクを設定
		$link = 'href="' . "$scr_php/page_data/$type/";
		
		// 開始番号を取得
		$prev_no = $start - $limit;
		
		// 開始番号が0未満の時
		if($prev_no < 0){$prev_no = 0;}
		
		// 次の開始番号を取得
		$next_no = $start + $limit;
		
		// 開始番号が総数以上の時
		if($next_no > $all_rows){$next_no = $all_rows;}
		
		// 前何件へのリンクを定義
		$v['prev_link'] = ($start !== 0) ? $link . $prev_no . '/"' : 'class="no_link"';
		
		// 次何件へのリンクを定義
		$v['next_link'] = ($next_no !== $all_rows) ? $link . $next_no . '/"' : 'class="no_link"';
		
		// SQLとリンクを返す
		return array($q,$v);
		
	}
	
	
	//---------------------------------------------------------
	//  CSV表示
	//---------------------------------------------------------
	
	static function view_csv($n_table,$db,$tmpl,$v)
	{
		
		// ヘッダー,メイン,フッター テンプレートを取得
		$tmpl_d = $tmpl->read('page_data_csv.htm',false);
		
		// SQLを定義
		$q = "select * from $n_table order by no;";
		//$q = "select * from $n_table order by url;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// テンプレート変数を初期化
		$v['csv_d'] = '';
		
		// 変数を初期化
		$nos = array();
		
		// データが存在する時
		while($d = $db->fetch($r))
		{
			
			// データを変数に追記
			$v['csv_d'] .= $d['no'] . ',' . $d['url'] . ',' . $d['title'] . "\n";
			
			// Noを配列に格納
			array_push($nos,$d['no']);
			
		}
		
		// 開始＆終了Noを取得
		$v['start_end'] = ($nos) ? $nos[0] . " ～ " . array_pop($nos) : 'no data';
		
		// テンプレートを出力
		$tmpl->view($tmpl_d,$v);
		
	}
	
	
	//---------------------------------------------------------
	//  テーブル更新処理
	//---------------------------------------------------------
	
	static function write($n_table)
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db = $obj['db'];
		
		// スクリプトファイル名を取得
		$scr_php = $path['scr_php'];
		
		// エラーメッセージを初期化
		$error = '';
		
		// データが無い時は終了
		if(!isset($args['nos'])){return $error;}
		
		// 送信データを取得
		$nos    = $args['nos'];
		$urls   = $args['urls'];
		$titles = $args['titles'];
		
		// トランザクション開始
		$db->begin();
		
		// データ編集ループ
		while(list(,$i) = each($nos))
		{
			
			// 変更後の値を取得
			$url   = $db->escape($urls[$i]);
			$title = $db->escape($titles[$i]);
			
			// データが存在しない時は次へ
			if(!$urls[$i] or !$titles[$i]){$q = "delete from $n_table where no = $i;";}
			
			// データが存在する時
			else
			{
				
				// SQLを定義
				$q = "select count(url) as cnt from $n_table where url = $url and no != $i;";
				
				// URLが重複している時は次へ
				if($db->query_fetch($q,'cnt')){$error .= "\n\t\t\t\t\t\t" . '<tr class="error_tr"><td>' . $i . '</td><td>&nbsp; ' . $urls[$i] . ' は既に存在しているURLです！</td></tr>';continue;}
				
				// // SQLを定義
				$q = "update $n_table set url = $url,title = $title where no = $i;";
				
			}
			
			// SQLを実行
			$db->query($q);
			
		}
		
		// トランザクション終了
		$db->commit();
		
		// データ領域開放
		$db->query('vacuum;');
		
		// 終了
		return $error;
		
	}
	
	
	//---------------------------------------------------------
	//  テーブル更新処理
	//---------------------------------------------------------
	
	static function write_csv($n_table)
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$db = $obj['db'];
		
		// スクリプトファイル名を取得
		$scr_php = $path['scr_php'];
		
		// 送信データを取得
		$csv_d = $args['csv_d'];
		
		// \rを削除
		$csv_d = preg_replace("/\r/",'',$csv_d);
		
		// 改行で分割
		$csv_d = explode("\n",$csv_d);
		
		// レコード数を取得
		$csv_c = count($csv_d);
		
		// トランザクション開始
		$db->begin();
		
		// SQLを定義
		$q = "delete from $n_table;";
		
		// SQLを実行
		$db->query($q);
		
		// データ編集ループ
		for($i = 0;$i < $csv_c;$i++)
		{
			
			// データが存在しない時は次へ
			if(!$csv_d[$i]){continue;}
			
			// レコードを分割する
			list($no,$url,$title) = explode(',',$csv_d[$i]);
			
			// データが存在しない時は次へ
			if(!$no or !$url or !$title){continue;}
			
			// データをエスケープ
			$url   = $db->escape($url);
			$title = $db->escape($title);
			
			// SQLを定義
			$q = "insert into $n_table values($no,$url,$title);";
			
			// SQLを実行
			$db->query($q);
			
		}
		
		// トランザクション終了
		$db->commit();
		
		// データ領域開放
		$db->query('vacuum;');
		
	}
	
}

