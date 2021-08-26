<?php

class Graph
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
	//  月間パラメータ統計生成
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$conf,$path;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$date = $obj['date'];
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$v = $path;
		$w = '';
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// 合計の文字を取得
		$v['sum'] = $args['access']['sum'];
		
		// 平均の文字を取得
		$v['ave'] = $args['access']['ave'];
		
		// 最高の文字を初期化
		$v['max'] = '';
		
		// 表示タイプを取得
		$graph = $args['graph'];
		
		// 表示タイプを変数にセット
		$v['graph'] = $graph;
		
		// 年を取得
		$y = $args['y'];
		
		// 月を取得
		$m = $args['m'];
		
		// 日を取得
		$d = $args['d'];
		
		// 折れ線グラフ使用フラグを取得
		$line_chart = $conf['line_chart'];
		
		// テンプレートを分割
		list($header,$thead,$td,$tr,$td2,$footer) = $tmpl->read('graph.htm');
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$l_cnt  = 1;
		$left   = 0;
		$length = 0;
		$j = 0;
		$s = 0;
		$e = 23;
		$u = array();
		$p = array();
		
		////////////////////////////////////////////////////////////
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// 月別の時
		if($graph === 'monthly'){list($w,$u,$p,$length,$left) = self::$graph($db,$y);}
		
		// DBが存在する時
		elseif($db->exists($t_db))
		{
			
			// DBに接続
			$db->attach($t_db,'t');
			
			// 詳細ログテーブル名を定義
			$l_table = $prefix . '_l_' . $y . '_' . $m;
			
			// SQLを定義
			$q = "select count(*) as cnt from $l_table;";
			
			// ログの件数を取得
			$l_cnt = $db->query_fetch($q,'cnt');
			
			// グラフ生成用データを取得
			list($w,$u,$p,$length,$left) = self::$graph($db,$y,$m,$d,$l_table);
			
		}
		
		// DBと切断
		$db->close();
		
		// テンプレート変数に曜日フィルターリンクをセット
		$v['w_days'] = $w;
		
		////////////////////////////////////////////////////////////
		
		// PV数の最大値を算出
		$max_cnt = (count($p)) ? max($p) : 0;
		
		// 最大値,半分数,基準ピクセルを取得
		list($max,$pixcel) = self::max_pixcel($max_cnt,180);
		
		// 平均値算出用の分母を取得
		$limit = ($graph === 'daily') ? $l_cnt : count($u);
		
		// アクセス数の合計値を算出
		$v['t_u'] = ($u) ? array_sum($u) : 0;
		$v['t_p'] = ($p) ? array_sum($p) : 0;
		
		// アクセス数の平均値を算出
		$v['a_u'] = ($u) ? round($v['t_u'] / $limit) : 0;
		$v['a_p'] = ($p) ? round($v['t_p'] / $limit) : 0;
		
		// 日別、月別の時
		if($graph !== 'timely')
		{
			
			// 日別の時は月初の曜日を取得
			if($graph === 'daily'){list($j,$en,$ja) = $date->week_day($y,$m,1);$e = 31;}
			
			// ループの最大値を定義
			else{$e = 12;}
			
			// ループの初期値を定義
			$s = 1;
			
			// アクセス数の合計値を算出
			$u_max = ($u) ? max($u) : 0;
			$p_max = ($p) ? max($p) : 0;
			
			// 最高の文字を取得
			$v['max'] = "\n\t\t\t\t\t\t\t" . $args['access']['max'] . ' : ' . $u_max . ' / ' . $p_max;
			
		}
		
		// 終了値を調整
		$e++;
		
		// 月の日数を取得
		$mday = $date->month_days($y,$m + 0);
		
		// ヘッダーテンプレートを出力
		$tmpl->view($header . $thead,$v);
		
		// テンプレート変数を初期化
		$v = array();
		
		////////////////////////////////////////////////////////////
		
		// グラフ処理メソッド名を取得
		$graph_type = ($line_chart) ? 'line' : 'bar';
		
		// グラフデータをテンプレート変数にセット
		$v['graph_d'] = self::$graph_type($pixcel,$u,$p,$s,$e,$tmpl,$td,$td2,$length,$left);
		
		// 中間<tr>テンプレートを出力
		$tmpl->view($tr,$v);
		
		// 基準<tr>テンプレートを出力
		self::bottom_tr($tmpl,$graph,$y,$m,$s,$e,$j,$mday,$td2);
		
		////////////////////////////////////////////////////////////
		
		// フッターテンプレートを出力
		$tmpl->view($footer,$v);
		
	}
	
	
	//---------------------------------------------------------
	//  時間別アクセス推移
	//---------------------------------------------------------
	
	static function timely($db,$y,$m,$d,$l_table)
	{
		
		// グローバル変数を定義
		global $args,$path;
		
		// 変数を初期化
		$w = '';
		$u = array();
		$p = array();
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 折れ線グラフの設定を定義
		$left   = 13;
		$length = 27;
		
		// フィルターオプションが存在する時
		if(isset($args[4]))
		{
			
			// フィルターオプションを取得
			$opt = $args[4];
			
			// 曜日フィルターの時
			if(!$d and $opt !== 'mon-fri' and $opt !== 'sat-sun')
			{
				
				// 曜日変換配列を定義
				$w_d = array('sun' => 'Sun','mon' => 'Mon','tue' => 'Tue','wed' => 'Wed','thu' => 'Thu','fri' => 'Fri','sat' => 'Sat');
				
				// 曜日を大文字に変換
				$opt = $w_d[$opt];
				
			}
			
		}
		
		// 曜日別オプションが存在しない時
		else{$opt = false;}
		
		// 全体の文字を取得
		$all = $args['access']['all'];
		
		// メニュー用配列
		$menus = array('<a href="' . "$scr_php/graph/timely/$y/$m/" . '">' . $all . '</a>');
		
		// メニュー取得ループ
		while(list($key,$val) = each($args['cal']))
		{
			
			// 配列の末尾にリンクを挿入
			array_push($menus,"\n\t\t\t\t\t\t" . '<a href="' . "$scr_php/graph/timely/$y/$m/$key/" . '">' . $val . '</a>');
			
		}
		
		// メニューリンクを整形
		if(!$d){$w = "\n\t\t\t\t\t\t" . implode(' |',$menus);}
		
		// 日付フィルターが存在する時
		if($opt and $d){$where = "where a_date = '$y-$m-$d'";}
		
		// 平日フィルターが存在する時
		elseif($opt === 'mon-fri'){$where = "where a_wday != 'Sat' and a_wday != 'Sun'";}
		
		// 土日フィルターが存在する時
		elseif($opt === 'sat-sun'){$where = "where a_wday = 'Sat' or a_wday = 'Sun'";}
		
		// 曜日別フィルターが存在する時
		elseif($opt and !$d){$where = "where a_wday = '$opt'";}
		
		// フィルターが存在しない時
		else{$where = '';}
		
		// SQLを定義
		$q = "select * from $l_table $where;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// データ取得ループ
		while($a = $db->fetch($r,true))
		{
			
			// アクセス数合計ループ
			for($i = 0;$i < 24;$i++)
			{
				
				// カラム名を定義
				$u_i = ($i < 10) ? 'u_0' . $i : 'u_' . $i;
				$p_i = ($i < 10) ? 'p_0' . $i : 'p_' . $i;
				
				// ユニーク数にプラス
				$u[$i] = (isset($u[$i])) ? $u[$i] + $a[$u_i] : $a[$u_i];
				
				// PV数にプラス
				$p[$i] = (isset($p[$i])) ? $p[$i] + $a[$p_i] : $a[$p_i];
				
			}
			
		}
		
		// グラフ生成用データを返す
		return array($w,$u,$p,$length,$left);
		
	}
	
	
	//---------------------------------------------------------
	//  日別アクセス推移
	//---------------------------------------------------------
	
	static function daily($db,$y,$m,$d,$l_table)
	{
		
		// 変数を初期化
		$w = '';
		$u = array();
		$p = array();
		
		// 折れ線グラフの設定を定義
		$left   =  9;
		$length = 21;
		
		// SQLを定義
		$q = "select a_date,a_wday,u_td,p_td from $l_table;";
		
		// SQLを実行
		$r = $db->query($q);
		
		// データ取得ループ
		while($a = $db->fetch($r))
		{
			
			// アクセス数を取得
			$u_td = $a['u_td'];
			$p_td = $a['p_td'];
			
			// 日付を取得
			$a_date = $a['a_date'];
			
			// 年月日に日付を分割
			list($y,$m,$d) = explode('-',$a_date);
			
			// 日をキーにセット
			$key = $d + 0;
			
			// ユニーク数にプラス
			$u[$key] = $u_td;
			
			// PV数にプラス
			$p[$key] = $p_td;
			
		}
		
		// グラフ生成用データを返す
		return array($w,$u,$p,$length,$left);
		
	}
	
	
	//---------------------------------------------------------
	//  月別アクセス推移
	//---------------------------------------------------------
	
	static function monthly($db,$y)
	{
		
		// グローバル変数を定義
		global $path;
		
		// 変数を初期化
		$w = '';
		$u = array();
		$p = array();
		
		// 折れ線グラフの設定を定義
		$left   = 28;
		$length = 54;
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// 月ループ
		for($i = 1;$i < 13;$i++)
		{
			
			// 月を2桁に調整
			if($i < 10){$i = '0' . $i;}
			
			// DB名を定義
			$t_db = $prefix . '_' . $y . '_' . $i . '.db';
			
			// DBが存在しない時は次へ
			if(!$db->exists($t_db)){continue;}
			
			// DBに追加接続
			$db->attach($t_db,'i');
			
			// 詳細ログテーブル名を定義
			$l_table = $prefix . '_l_' . $y . '_' . $i;
			
			// SQLを定義
			$q = "select sum(u_td) as sum_u,sum(p_td) as sum_p from $l_table;";
			
			// SQLを実行
			$a = $db->query_fetch($q);
			
			// 月間ログが存在する時
			if($a)
			{
				
				// 月の桁数を調整
				$i += 0;
				
				// ユニーク数にプラス
				$u[$i] = $a['sum_u'];
				
				// PV数にプラス
				$p[$i] = $a['sum_p'];
				
			}
			
			// DBの追加接続を解除
			$db->detach('i');
			
		}
		
		// グラフ生成用データを返す
		return array($w,$u,$p,$length,$left);
		
	}
	
	
	//---------------------------------------------------------
	//  基準<tr>生成
	//---------------------------------------------------------
	
	static function bottom_tr($tmpl,$graph,$y,$m,$s,$e,$j,$mday,$td2)
	{
		
		// グローバル変数を定義
		global $path;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 曜日変換配列2を定義
		$w_d2 = array(1 => 'sun',2 => 'mon',3 => 'tue',4 => 'wed',5 => 'thu',6 => 'fri',7 => 'sat');
		
		// 基準<td>出力ループ
		for($i = $s;$i < $e;$i++)
		{
			
			// 曜日カウントが7の時は0にリセット
			if($j === 7){$j = 0;}
			
			// テンプレート変数を初期化
			$v = array();
			
			// クラス属性を初期化
			$v['class'] = '';
			
			// 左端<td>の時はid属性を設定
			$v['id'] = ($i === $s) ? ' id="td0"' : '';
			
			// 変数を別名で保持
			$s = $i;
			
			// 月別表示の時
			if($graph === 'monthly')
			{
				
				// 月数を2桁に補正
				$m = ($s < 10) ? '0' . $s : $s;
				
				// 月リンクを整形
				$v['s'] = '<a href="' . "$scr_php/graph/daily/$y/$m/" . '">' . $s . '</a>';
				
			}
			
			// 日別表示の時
			elseif($graph === 'daily')
			{
				
				// 日曜日の時
				if($j === 0){$v['class'] = ' class="sun"';}
				
				// 土曜日の時
				elseif($j === 6){$v['class'] = ' class="sat"';}
				
				// 日付が最大値を超えた時は空欄をセット
				if($i > $mday){$v['s'] = '';}
				
				// データが存在する時
				else
				{
					
					// 日を2桁に調整
					$d = ($s < 10) ? '0' . $s : $s;
					
					// 日リンクを整形
					$v['s'] = '<a href="' . "$scr_php/detail/$y/$m/$d/" . '">' . $s . '</a>';
					
				}
				
			}
			
			// 時間別表示の時
			else{$v['s'] = $s;}
			
			// 基準<td>を出力
			$tmpl->view($td2,$v);
			
			// 曜日変数をプラス
			$j++;
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  折れ線グラフ出力
	//---------------------------------------------------------
	
	static function line($pixcel,$u,$p,$s,$e,$tmpl,$td,$td2,$length,$left)
	{
		
		// グローバル変数を定義
		global $path;
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// 空セルを出力
		echo '<td></td>';
		
		// クラスを読み込み
		include($work_dir . '/modules/canvas.php');
		
		// クラスインスタンスを生成
		$graph = new Canvas();
		
		// グラフデータを取得
		$graph_d = $graph->graph(205,$length,$left,$pixcel,$u,$p,$s,$e);
		
		// グラフデータを返す
		return $graph_d;
		
	}
	
	
	//---------------------------------------------------------
	//  画像グラフ出力
	//---------------------------------------------------------
	
	static function bar($pixcel,$u,$p,$s,$e,$tmpl,$td,$td2)
	{
		
		// グローバル変数を定義
		global $path,$conf;
		
		// テンプレート変数を初期化
		$v = array();
		
		// スクリプトディレクトリ名を取得
		$v['scr_dir'] = $path['scr_dir'];
		
		// グラフ画像ディレクトリ名を取得
		$v['bar_color_t'] = $conf['bar_color_t'];
		
		// グラフ<td>出力ループ
		for($i = $s;$i < $e;$i++)
		{
			
			// データが存在しない時
			if(!isset($u[$i]) or !$u[$i])
			{
				
				// 空データをセット
				$v['s']     = '';
				$v['id']    = '';
				$v['class'] = '';
				
				// 空のテンプレートを出力
				$tmpl->view($td2,$v);
				
				// 次へ
				continue;
				
			}
			
			// アクセス数を変数にセット
			$v['u_cnt'] = $u[$i];
			$v['p_cnt'] = $p[$i];
			
			// グラフ画像の高さを変数にセット
			$v['u_h'] = round($v['u_cnt'] * $pixcel);
			$v['p_h'] = round($v['p_cnt'] * $pixcel);
			
			// <td>テンプレートを出力
			$tmpl->view($td,$v);
			
		}
		
		// 空白を返す
		return;
		
	}
	
	
	//----------------------------------------
	//  基準 最大・半分・px 値算出 関数
	//----------------------------------------
	
	static function max_pixcel($max_cnt,$max_px)
	{
		
		// 最大値の桁数を取得
		$figure = strlen($max_cnt);
		
		// 上1桁目を切り出し
		$last_figure = substr($max_cnt,0,1);
		
		// 基準最大値を算出
		$max = ($max_cnt < 10) ? 10 : pow(10,$figure - 1) * ($last_figure + 1);
		
		// 基準ピクセル数を算出
		$pixcel = $max_px / $max;
		
		// 最大値,ピクセル数を返す
		return array($max,$pixcel);
		
	}
	
}

