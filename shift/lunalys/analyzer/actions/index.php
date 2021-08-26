<?php

class Index
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
	//  メイン処理
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path,$conf;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// マスターDB名を取得
		$main_db = $path['main_db'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// グラフ種別を取得
		$line_chart = $conf['line_chart'];
		
		// 今日ログの表示を取得
		$today_param = $conf['today_param'];
		
		// 今日ログの最大表示件数を取得
		$today_limit = $conf['today_limit'];
		
		////////////////////////////////////////////////////////////
		
		// テンプレート変数を初期化
		$v = array();
		$a = array();
		
		// 変数を初期化
		$p_t_max = 0;
		$p_y_max = 0;
		$u_a = array();
		$p_a = array();
		
		// 年月日時を取得
		$y  = $args['y'];
		$m  = $args['m'];
		$d  = $args['d'];
		$hh = $args['hh'];
		$yy = $args['yy'];
		$ym = $args['ym'];
		$yd = $args['yd'];
		
		// フラグを初期化
		$t_flag = false;
		
		////////////////////////////////////////////////////////////
		
		// マスターDBが存在する時
		if($db->exists($main_db))
		{
			
			// カウントテーブル名を定義
			$t_table = $prefix . '_total';
			
			// SQLを定義
			$q = "select u_t,p_t from $t_table;";
			
			// SQLを実行
			$a = $db->query_fetch($q);
			
			// カウント数を取得
			$v['u_t']  = $a['u_t'];
			$v['p_t']  = $a['p_t'];
			
		}
		
		// マスターDBが存在しない時
		else
		{
			
			// カウント数を変数にセット
			$v['u_t']  = 0;
			$v['p_t']  = 0;
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 月間DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// 月間DBが存在する時
		if($db->exists($t_db))
		{
			
			// DBに接続
			$db->attach($t_db,'t_day');
			
			// テーブル名を定義
			$l_table = $prefix . '_l_' . $y . '_' . $m;
			
			// SQLを定義
			$q = "select * from $l_table where a_date = '$y-$m-$d';";
			
			// SQLを実行
			$t_cnt = $db->query_fetch($q);
			
			// データが存在する時
			if($t_cnt)
			{
				
				// テンプレート変数にカウントをセット
				$v['u_td'] = $t_cnt['u_td'];
				$v['p_td'] = $t_cnt['p_td'];
				
				// フラグをtrueにセット
				$t_flag = true;
				
			}
			
			// データが存在しない時
			else
			{
				
				// テンプレート変数にカウントをセット
				$v['u_td'] = 0;
				$v['p_td'] = 0;
				
				// 空のデータ配列を取得
				$t_cnt = self::l_cnt();
				
			}
			
			// 不要な要素は0をセット
			$t_cnt['a_date'] = 0;
			$t_cnt['a_wday'] = 0;
			$t_cnt['u_td']   = 0;
			$t_cnt['p_td']   = 0;
			
			// 最大値を取得
			$p_t_max = max($t_cnt);
			
			////////////////////////////////////////////////////////////
			
			// DB名を定義
			$y_db = $prefix . '_' . $yy . '_' . $ym . '.db';
			
			// DBが存在する時
			if($db->exists($y_db))
			{
				
				// DBに接続
				if($t_db !== $y_db){$db->attach($y_db,'y_day');}
				
				// テーブル名を定義
				$l_table = $prefix . '_l_' . $yy . '_' . $ym;
				
				// SQLを定義
				$q = "select * from $l_table where a_date = '$yy-$ym-$yd';";
				
				// SQLを実行
				$y_cnt = $db->query_fetch($q);
				
			}
			
			// DBが存在しない時
			else{$y_cnt = '';}
			
			// データが存在する時
			if($y_cnt)
			{
				
				// テンプレート変数にカウントをセット
				$v['u_yd'] = $y_cnt['u_td'];
				$v['p_yd'] = $y_cnt['p_td'];
				
			}
			
			// データが存在しない時
			else
			{
				
				// テンプレート変数にカウントをセット
				$v['u_yd'] = 0;
				$v['p_yd'] = 0;
				
				// 空のデータ配列を取得
				$y_cnt = self::l_cnt();
				
			}
			
			// 不要な要素は0をセット
			$y_cnt['a_date'] = 0;
			$y_cnt['a_wday'] = 0;
			$y_cnt['u_td']   = 0;
			$y_cnt['p_td']   = 0;
			
			// 終了値を算出
			$c = $hh + 1;
			
			// 現在時刻までの昨日データは「0」をセット
			for($i = 0;$i < $c;$i++)
			{
				
				// カラム名を定義
				$p_i = ($i < 10) ? 'p_0' . $i : 'p_' . $i;
				
				// 0をセット
				$y_cnt[$p_i] = 0;
				
			}
			
			// 最大値を取得
			$p_y_max = max($y_cnt);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// カウントデータが存在しない時
		else
		{
			
			// カウント数を変数にセット
			$v['u_yd'] = 0;
			$v['u_td'] = 0;
			$v['p_yd'] = 0;
			$v['p_td'] = 0;
			
			// カウント配列を取得
			$t_cnt = self::l_cnt();
			$y_cnt = self::l_cnt();
			
		}
		
		////////////////////////////////////////////////////////////
		
		// メインテンプレートを読み込み
		list($header,$main,$footer) = $tmpl->read('index.htm');
		
		// 大きい方を基準最大値にセット
		$max_cnt = ($p_t_max > $p_y_max) ? $p_t_max : $p_y_max;
		
		// 最大値,半分数,基準ピクセルを取得
		$pixcel = self::max_figure($max_cnt,180);
		
		// ヘッダーテンプレートを出力
		$tmpl->view($header,$v);
		
		////////////////////////////////////////////////////////////
		
		// テンプレート変数を初期化
		$v = array();
		
		// グラフ処理メソッド名を取得
		$graph_type = ($line_chart) ? 'line' : 'bar';
		
		// グラフデータをテンプレート変数にセット
		$v['graph_d'] = self::$graph_type($pixcel,$t_cnt,$y_cnt,$hh,$work_dir,$main);
		
		// フッターテンプレートを出力
		$tmpl->view($footer,$v);
		
		// 今日ログの表示
		if($today_param and $t_flag){self::today_param($db,$tmpl,$path,$y,$m,$d,$today_param,$today_limit);}
		
		// DBと切断
		$db->close();
		
	}
	
	
	//---------------------------------------------------------
	//  折れ線グラフ出力
	//---------------------------------------------------------
	
	static function line($pixcel,$t_cnt,$y_cnt,$hh,$work_dir)
	{
		
		// 空セルを出力
		echo '<td></td>';
		
		// クラスを読み込み
		include($work_dir . '/modules/canvas.php');
		
		// クラスインスタンスを生成
		$canvas = new Canvas();
		
		// グラフデータを取得
		$canvas_d = $canvas->index(205,27,13,$pixcel,$t_cnt,$y_cnt,$hh);
		
		// グラフデータを返す
		return $canvas_d;
		
	}
	
	
	//---------------------------------------------------------
	//  棒グラフ出力
	//---------------------------------------------------------
	
	static function bar($pixcel,$t_cnt,$y_cnt,$hh,$work_dir,$main)
	{
		
		// グローバル変数を定義
		global $obj,$conf;
		
		// テンプレート変数を初期化
		$v = array();
		
		// インデントタブを定義
		$tab = "\n\t\t\t\t\t\t\t\t";
		
		// 画像グラフの色を取得
		$bar_color_t = $conf['bar_color_t'];
		$bar_color_y = $conf['bar_color_y'];
		
		// 時間別グラフ出力ループ
		for($i = 0;$i < 24;$i++)
		{
			
			// 桁補正
			$zero = ($i < 10) ? 0 : '';
			
			// カラム名を定義
			$u_i = 'u_' . $zero . $i;
			$p_i = 'p_' . $zero . $i;
			
			// 現在時間以下の時
			if($i <= $hh)
			{
				
				// 今日グラフ画像をセット
				$v['u_img'] = 'templates/img/graph/' . $bar_color_t . '/u.png';
				$v['p_img'] = 'templates/img/graph/' . $bar_color_t . '/p.png';
				
				// 今日のカウントをセット
				$v['u_cnt'] = $t_cnt[$u_i];
				$v['p_cnt'] = $t_cnt[$p_i];
				
			}
			
			// 現在時間以上の時
			else
			{
				
				// 昨日グラフ画像をセット
				$v['u_img'] = 'templates/img/graph/' . $bar_color_y . '/u.png';
				$v['p_img'] = 'templates/img/graph/' . $bar_color_y . '/p.png';
				
				// 今日のカウントをセット
				$v['u_cnt'] = $y_cnt[$u_i];
				$v['p_cnt'] = $y_cnt[$p_i];
				
			}
			
			// グラフ画像の高さを取得
			$v['u_h'] = round($v['u_cnt'] * $pixcel);
			$v['p_h'] = round($v['p_cnt'] * $pixcel);
			
			// PVカウントが0の時
			if(!$v['p_cnt']){echo $tab . '<td></td>';continue;}
			
			// メインテンプレートを出力
			$obj['tmpl']->view($main,$v);
			
		}
		
		// 空白を返す
		return;
		
	}
	
	
	//---------------------------------------------------------
	//  今日ログの表示
	//---------------------------------------------------------
	
	static function today_param($db,$tmpl,$path,$y,$m,$d,$today_param,$today_limit)
	{
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// ジャンプパスを定義
		$jump_php = 'http://act.st/api/jump.php/';
		//$jump_php = $scr_php . '/jump/';
		
		// 最大表示文字数を定義
		$max_len = 20;
		
		// 日付を定義
		$t_date = $y . '-' . $m . '-' . $d;
		
		// テーブル名を定義
		$n_table = $prefix . '_referrer';
		$d_table = $prefix . '_d_' . $y . '_' . $m;
		
		// テンプレートを分割
		list($head,$main,$foot) = $tmpl->read('today_param.htm');
		
		// パラメータ配列を定義
		$params = array('search_words' => '検索語','referrer' => 'リンク元');
		
		// descオプションを設定
		$desc = ($today_param == 1) ? 'desc' : '';
		
		// 変数を初期化
		$v = array();
		
		// パラメータ表示ループ
		while(list($param,$title) = each($params))
		{
			
			// ソースコード整形用
			echo "\n";
			
			// テンプレート変数をセット
			$v['param'] = $param;
			$v['title'] = $title;
			
			// ヘッダーテンプレートを出力
			$tmpl->view($head,$v);
			
			// リンク元の時
			if($param === 'referrer'){$q = "select url as jump,no as detail,title,count($param) as cnt from $d_table,$n_table where a_date = '$t_date' and $param != '' and $param = no group by $param,title order by cnt $desc,l_time desc limit $today_limit;";$jump = '';}
			
			// 検索語の時
			elseif($param === 'search_words'){$q = "select $param as detail,$param as jump,$param as title,count($param) as cnt from $d_table where a_date = '$t_date' and $param != '' group by $param order by cnt $desc,l_time desc limit $today_limit;";$jump = 'http://www.google.co.jp/::';}
			
			// SQLを実行
			$r = $db->query($q);
			
			// ループカウンタ
			$i = 1;
			
			// レコードデータ表示ループ
			while($v = $db->fetch($r))
			{
				
				// 色分け用class属性を定義
				$v['tr'] = ($i % 2 === 0) ? 2 : 1;
				
				// 簡易検索用リンクを整形
				$v['cnt']  = '<a href="' . $scr_php . "/detail_search/$param/$y/$m/$d/" . $v['detail'] . '/">' . $v['cnt'] . '</a>';
				
				// ジャンプ用リンクを整形
				$v['name'] = '<a href="' . $jump_php . $jump . $v['jump'] . '" class="out">' . mb_strimwidth($v['title'],0,36,'...','UTF-8') . '</a>';
				
				// メインテンプレートを出力
				$tmpl->view($main,$v);
				
				// カウンタを1増加
				$i++;
				
			}
			
			// フッターテンプレートを出力
			$tmpl->view($foot);
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  基準 最大・半分・px 値算出
	//---------------------------------------------------------
	
	static function max_figure($max_cnt,$max_px)
	{
		
		// 最大値の桁数を取得
		$figure = strlen($max_cnt);
		
		// 上1桁目を切り出し
		$last_figure = substr($max_cnt,0,1);
		
		// 基準最大値を算出
		$max = ($max_cnt < 10) ? 10 : pow(10,$figure - 1) * ($last_figure + 1);
		
		// 基準ピクセル数を算出
		$pixcel = $max_px / $max;
		
		// 最大値,半数値,ピクセル数を返す
		return $pixcel;
		
	}
	
	
	//---------------------------------------------------------
	//  カウント配列生成
	//---------------------------------------------------------
	
	static function l_cnt()
	{
		
		// 配列を初期化
		$l_cnt = array();
		
		// 時間別グラフ出力ループ
		for($i = 0;$i < 24;$i++)
		{
			
			// 桁補正
			$zero = ($i < 10) ? 0 : '';
			
			// カラム名を定義
			$u_i = 'u_' . $zero . $i;
			$p_i = 'p_' . $zero . $i;
			
			// 配列に0をセット
			$l_cnt[$u_i] = 0;
			$l_cnt[$p_i] = 0;
			
		}
		
		// 配列を返す
		return $l_cnt;
		
	}
	
}

