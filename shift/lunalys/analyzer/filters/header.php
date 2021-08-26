<?php

class Header
{
	
	//---------------------------------------------------------
	//  初期処理
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// 汎用クラスインスタンスを取得
		$date = $obj['date'];
		$tmpl = $obj['tmpl'];
		
		// タイトルiniファイルを解析
		$title_d = parse_ini_file($work_dir . '/templates/ini/title.ini');
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$v     = array();
		$title = array();
		$menu  = array();
		$opt   = '';
		
		// アクション名を取得
		$act = $args['act'];
		
		// テンプレート変数を初期化
		$v['content_date'] = '';
		
		// CSSにアクション名をセット
		$v['act'] = $act;
		
		// タイトルを取得
		$v['title'] = $title_d[$act];
		
		////////////////////////////////////////////////////////////
		
		// 解析トップの時
		if($act === 'index')
		{
			
			// 日付を取得
			$v['content_date'] = self::index($date);
			
			// CSSにグラフをセット
			$v['act'] = 'graph';
			
		}
		
		// 詳細検索の時
		elseif($act === 'detail_search'){$v['act'] = 'detail';}
		
		// 日付及びナビリンクが必要な時
		elseif(preg_match('/param|pie_chart|transition|graph|page_data|^search|shortcut|detail$|diagram/',$act))
		{
			
			// メニューiniファイルを解析
			$menu = parse_ini_file($work_dir . '/templates/ini/menu.ini',true);
			
			// メソッド名を定義
			$method = ($act === 'pie_chart' or $act === 'transition') ? 'param' : $act;
			
			// 可変メソッドを実行
			list($v['title'],$v['content_date']) = self::$method($date,$menu,$v['title'],$title_d);
			
		}
		
		// 詳細検索以外の時は<section>を追記
		if($act !== 'detail_search' and $act !== 'page_data'){$v['content_date'] .= "\n\t\t\t" . '<section id="content_main">';}
		
		////////////////////////////////////////////////////////////
		
		// テンプレートファイルを読み込み
		$header = $tmpl->read('header.htm',false);
		
		// ヘッダーテンプレートを出力
		$tmpl->view($header,array_merge($v,$path));
		
	}
	
	
	//---------------------------------------------------------
	//  解析トップの時
	//---------------------------------------------------------
	
	static function index($date)
	{
		
		// グローバル変数を定義
		global $args;
		
		// インデントタブを定義
		$t1 = "\n\t\t\t";
		$t2 = $t1 . "\t";
		
		// 今日の年月日曜時を取得
		list($args['y'],$args['m'],$args['d'],$w,$args['hh']) = $date->now_date();
		
		// 前日の年月日を取得
		list($args['yy'],$args['ym'],$args['yd']) = $date->back_date();
		
		// 今日の日付を整形
		$nav = $t1 . '<p id="content_date">' . $t2 . '&lt; ' . $args['y'] . '/' . $args['m'] . '/' . $args['d'] . ' &gt;' . $t1 . '</p>';
		
		// 今日の日付を返す
		return $nav;
		
	}
	
	
	//---------------------------------------------------------
	//  アクセス詳細/日間パラメータ統計の時
	//---------------------------------------------------------
	
	static function detail($date,$menu,$title)
	{
		
		// グローバル変数を定義
		global $args;
		
		// アクション名を定義
		$act = 'detail';
		
		// オプション設定を取得
		$opt = (isset($args[4])) ? $args[4] : '';
		
		// 日付リンクを取得
		$content_date = self::create_date_d($act,$date);
		
		// フィルターリンクを取得
		$content_date .= self::create_filter($act,$menu[$act]);
		
		// タイトル補記
		if($opt and $opt !== 'all' and !is_numeric($opt)){$title .= ' : ' . $menu[$act][$opt];}
		
		// テンプレート変数を返す
		return array($title,$content_date);
		
	}
	
	
	//---------------------------------------------------------
	//  アクセス詳細/日間パラメータ統計の時
	//---------------------------------------------------------
	
	static function param_daily($date,$menu,$title,$title_d)
	{
		
		// グローバル変数を定義
		global $args;
		
		// アクション名を定義
		$act = 'param_daily';
		
		// パラメータを取得
		$param = $args[1];
		
		// 日付リンクを取得
		$content_date = self::create_date_d($act,$date);
		
		// フィルターリンクを取得
		$content_date .= self::create_filter($act,$menu[$act]);
		
		// タイトル補記
		if($param !== 'all'){$title .= ' : ' . $title_d[$param];}
		
		// テンプレート変数を返す
		return array($title,$content_date);
		
	}
	
	
	//---------------------------------------------------------
	//  詳細ログ条件検索の時
	//---------------------------------------------------------
	
	static function search($date,$menu,$title)
	{
		
		// アクション名を定義
		$act = 'search';
		
		// 日付リンクを取得
		$content_date = self::create_date_m($act,$date);
		
		// テンプレート変数を返す
		return array($title,$content_date);
		
	}
	
	
	//---------------------------------------------------------
	//  月間パラメータ統計の時
	//---------------------------------------------------------
	
	static function param($date,$menu,$title,$title_d)
	{
		
		// グローバル変数を定義
		global $args;
		
		// アクション名を定義
		$act = $args[0];
		
		// 対象パラメータを取得
		$param = $args[1];
		
		// オプション設定を取得
		$opt = (isset($args[4])) ? $args[4] : '';
		
		// ピックアップ項目を取得
		$pickup = (isset($args[5])) ? $args[5] : '';
		
		// 変数にセット
		$args['opt']    = $opt;
		$args['pickup'] = $pickup;
		
		// タイトルを取得
		$title = $title_d[$param];
		
		// タイトル補記
		if($opt and $opt !== 'none'){$title .= ($pickup and $pickup !== 'all') ? ' : ' . $pickup :  ' : ' . $menu[$param][$opt];}
		
		// リンク元有無オプションの時はデータを保持
		if($opt === 'exists'){$args['exists'] = $menu['exists'];}
		
		// 訪問回数の時はデータを保持
		elseif($param === 'visit'){$args['repeat'] = $menu['repeat'];}
		
		// オプション設定にピックアップ項目を追記
		if($pickup){$opt .= '/' . $pickup;}
		
		// 日付リンクを取得
		$content_date = self::create_date_m($act,$date,$opt,$menu['param']);
		
		// フィルターリンクを取得
		$content_date .= self::create_filter($act,$menu[$param]);
		
		// テンプレート変数を返す
		return array($title,$content_date);
		
	}
	
	
	//---------------------------------------------------------
	//  月間アクセス推移の時
	//---------------------------------------------------------
	
	static function graph($date,$menu,$title,$title_d)
	{
		
		// グローバル変数を定義
		global $args;
		
		// アクション名を定義
		$act = 'graph';
		
		// 対象データを取得
		$graph = $args[1];
		
		// 曜日オプションを取得
		$opt = (isset($args[4])) ? $args[4] : '';
		
		// 日を取得
		$d = (strlen($opt) == 2) ? $opt : '';
		
		// グローバル変数にセット
		$args['d']      = $d;
		$args['graph']  = $graph;
		$args['cal']    = $menu['cal'];
		$args['access'] = $menu['access'];
		
		////////////////////////////////////////////////////////////
		
		// タイトルを取得
		$title = $title_d[$graph];
		
		// 日付リンク（年）を取得
		if($graph == 'monthly'){$content_date = self::create_date_y($act,$date);}
		
		// 日付リンク（年月日）を取得
		elseif($d){$content_date = self::create_date_d($act,$date,'');}
		
		// 日付リンク（年月）を取得
		else{$content_date = self::create_date_m($act,$date,$opt);}
		
		// フィルターリンクを取得
		$content_date .= self::create_filter($act,$menu[$act]);
		
		// 曜日指定が存在する時はタイトルを補記
		if($opt){$title .= ' : ' . $menu['cal'][$opt];}
		
		// テンプレート変数を返す
		return array($title,$content_date);
		
	}
	
	
	//---------------------------------------------------------
	//  ページ番号管理
	//---------------------------------------------------------
	
	static function page_data($date,$menu,$title)
	{
		
		// グローバル変数を定義
		global $args;
		
		// グローバル変数にデータをセット
		$args['menu'] = $menu;
		
		// オプションを取得
		$opt = (isset($args[1])) ? $args[1] : '';
		
		// リンク元の時はタイトルに追記
		if($opt === 'referrer' or $opt === 'click'){$title .= ' : ' . $menu['page_data'][$opt];}
		
		// テンプレート変数を返す
		return array($title,'');
		
	}
	
	
	//---------------------------------------------------------
	//  月間アクセス推移の時
	//---------------------------------------------------------
	
	static function shortcut($date,$menu,$title,$title_d)
	{
		
		// グローバル変数を定義
		global $args;
		
		// アクション名を定義
		$act = 'shortcut';
		
		// 表示種別（モード）を取得
		$type = $args[1];
		
		// パラメータ種別を取得
		$param = $args[2];
		
		// タイトルを取得
		$title = (preg_match('/param$|graph|pie_chart|transition/',$type)) ? $title_d[$param] : $title_d[$type];
		
		// 日付リンクを取得
		$content_date = (preg_match('/detail|daily/',$type)) ? self::create_date_m($act,$date) : self::create_date_y($act,$date);
		
		// グローバル変数に配列をセット
		$args['menu']  = $menu;
		$args['title'] = $title_d;
		
		// テンプレート変数を返す
		return array($title,$content_date);
		
	}
	
	
	//---------------------------------------------------------
	//  日付リンク生成（年月日）
	//---------------------------------------------------------
	
	static function create_date_d($act,$date)
	{
		
		// グローバル変数を定義
		global $args,$path;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 年引数のインデックスを定義
		$y_i = 2;
		
		// オプション引数のインデックスを定義
		$opt_i = 5;
		
		// 詳細ログの時
		if($act === 'detail'){$y_i--;$opt_i--;}
		
		// グラフ、日間統計の時
		elseif($act === 'graph' or $act === 'param_daily'){$act .= '/' . $args[1];}
		
		// オプションを取得
		$opt = (isset($args[$opt_i])) ? $args[$opt_i] : '';
		
		// 引数が存在する時
		if(isset($args[$y_i]))
		{
			
			// インデックスを1増加
			$m_i = $y_i + 1;
			$d_i = $m_i + 1;
			
			// 指定年月日を取得
			$y = $args[$y_i];
			$m = $args[$m_i];
			$d = $args[$d_i];
			
		}
		
		// 現在の年月日曜時を取得
		else{list($y,$m,$d) = $date->now_date();}
		
		// 年月日をグローバル変数にセット
		$args['y'] = $y;
		$args['m'] = $m;
		$args['d'] = $d;
		
		// オプションをグローバル変数にセット
		$args['opt'] = $opt;
		
		////////////////////////////////////////////////////////////
		
		// インデントタブを定義
		$t1 = "\n\t\t\t";
		$t2 = $t1 . "\t";
		
		// 前日リンクを取得
		$prev_d = '<a href="' . "$scr_php/$act/" . self::get_ymd('prev',$date,$y,$m,$d,$opt) . '">&lt;</a>';
		
		// 次日リンクを取得
		$next_d = '<a href="' . "$scr_php/$act/" . self::get_ymd('next',$date,$y,$m,$d,$opt) . '">&gt;</a>';
		
		// 日付ジャンプリンクを定義
		$this_d = '<a href="' . "$scr_php/shortcut/$act/$y/$m/" . '" title="' . "$y/$m" . '">' . "$y/$m/$d" . '</a>';
		
		// 先月/次月へのリンクを整形
		$link = $t2 . $prev_d . $t2 . $this_d . $t2 . $next_d . $t1;
		
		// 先月/次月へのリンクを付け足す
		$nav = $t1 . '<nav id="content_date">' . $link . '</nav>';
		
		// メニューリンクを返す
		return $nav;
		
	}
	
	
	//---------------------------------------------------------
	//  日付リンク生成（年月）
	//---------------------------------------------------------
	
	static function create_date_m($act,$date,$opt = '',$menu = '')
	{
		
		// グローバル変数を定義
		global $args,$path;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 変数を初期化
		$y_i = 1;
		$nav = '';
		
		// パラメータ統計 or グラフ or ショートカットの時
		if(preg_match('/param|pie_chart|transition|graph|shortcut/',$act)){$y_i++;$act .= '/' . $args[1];}
		
		// ダイアグラムの時
		elseif($act === 'diagram'){$y_i++;$act .= (isset($args[1])) ? '/' . $args[1] : '/xx';}
		
		// ショートカットの時
		if(isset($args[1]) and $args[1] === 'param_daily'){$y_i++;$act .= '/' . $args[2];}
		
		// 年月の指定が存在する時
		if(isset($args[$y_i]))
		{
			
			// 引数のインデックスを1増加
			$m_i = $y_i + 1;
			
			// 年を取得
			$y = $args[$y_i];
			
			// 月を取得
			$m = $args[$m_i];
			
		}
		
		// 現在の年月日曜時を取得
		else{list($y,$m) = $date->now_date();}
		
		////////////////////////////////////////////////////////////
		
		// 前月の年月を算出
		$ly = $y;
		$lm = $m - 1;
		
		// 前月が12月の時は前年を算出
		if($lm == 0){$lm = 12;$ly--;}
		
		// 月が2桁になるよう補正
		elseif($lm < 10){$lm = 0 . $lm;}
		
		// 次月の年月を算出
		$ny = $y;
		$nm = $m + 1;
		
		// 次月が1月の時は来年を算出
		if($nm == 13){$nm = '01';$ny++;}
		
		// 月が2桁になるよう補正
		elseif($nm < 10){$nm = 0 . $nm;}
		
		// グローバル変数にデータをセット
		$args['y']  = $y;
		$args['m']  = $m;
		$args['ly'] = $ly;
		$args['lm'] = $lm;
		
		// オプションが存在する時は/を追記
		if($opt){$opt .= '/';}
		
		////////////////////////////////////////////////////////////
		
		// インデントタブを定義
		$t1 = "\n\t\t\t";
		$t2 = $t1 . "\t";
		
		// 月間パラメータ統計の時
		if(preg_match('/param|pie_chart|transition/A',$act))
		{
			
			// 一時配列を初期化
			$links = array();
			
			// 配列にリンクを格納
			foreach($menu as $key => $val){array_push($links,'<a href="' . "$scr_php/$key/" . $args[1] . "/$y/$m/$opt" . '">' . $val . '</a>');}
			
			// メニューを整形
			$nav =  $t1 . '<nav id="content_mode">' . $t2 . implode(" |$t2",$links) . $t1 . '</nav>';
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 前月へのリンクを整形
		$prev_m = '<a href="' . "$scr_php/$act/$ly/$lm/$opt" . '" title="' . "$ly/$lm" . '">&lt;</a>';
		
		// 次月へのリンクを整形
		$next_m = '<a href="' . "$scr_php/$act/$ny/$nm/$opt" . '" title="' . "$ny/$nm" . '">&gt;</a>';
		
		// ジャンプリンクを定義
		$this_m = (!preg_match('/^shortcut/',$act)) ? '<a href="' . "$scr_php/shortcut/$act/$y/$m/$opt" . '" title="' . $y . '">' . "$y/$m" . '</a>' : "$y/$m";
		
		// 先月/次月へのリンクを整形
		$link = $t2 . $prev_m . $t2 . $this_m . $t2 . $next_m . $t1;
		
		// 先月/次月へのリンクを付け足す
		$nav .= $t1 . '<nav id="content_date">' . $link . '</nav>';
		
		// メニューリンクを返す
		return $nav;
		
	}
	
	
	//---------------------------------------------------------
	//  日付リンク生成（年）
	//---------------------------------------------------------
	
	static function create_date_y($act,$date)
	{
		
		// グローバル変数を定義
		global $args,$path;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 引数のインデックスを初期化
		$y_i = 1;
		
		// アクション名を定義
		$acts = 'param|graph|pie_chart|transition';
		
		// パラメータ統計 or グラフの時
		if(preg_match("/$acts|shortcut/",$act)){$y_i++;$act .= '/' . $args[1];}
		
		// ショートカットの時
		if(preg_match("/$acts/",$args[1])){$y_i++;$act .= '/' . $args[2];}
		
		// 年月の指定が存在する時
		if(isset($args[$y_i]))
		{
			
			// 引数のインデックスを1増加
			$m_i = $y_i + 1;
			
			// 年を取得
			$y = $args[$y_i];
			
			// 月を取得
			$m = $args[$m_i];
			
		}
		
		// 現在の年月日曜時を取得
		else{list($y,$m) = $date->now_date();}
		
		////////////////////////////////////////////////////////////
		
		// 前年を算出
		$ly = $y - 1;
		
		// 翌年を算出
		$ny = $y + 1;
		
		// グローバル変数にデータをセット
		$args['y']  = $y;
		$args['m']  = $m;
		
		////////////////////////////////////////////////////////////
		
		// インデントタブを定義
		$t1 = "\n\t\t\t";
		$t2 = $t1 . "\t";
		
		// 前月へのリンクを整形
		$prev_m = '<a href="' . "$scr_php/$act/$ly/$m/" . '" title="' . "$ly" . '">&lt;</a>';
		
		// 次月へのリンクを整形
		$next_m = '<a href="' . "$scr_php/$act/$ny/$m/" . '" title="' . "$ny" . '">&gt;</a>';
		
		// ジャンプリンクを定義
		$this_m = (!preg_match('/^shortcut/',$act)) ? '<a href="' . "$scr_php/shortcut/$act/$y/$m/" . '" title="' . $y . '">' . "$y" . '</a>' : $y;
		
		// 先月/次月へのリンクを整形
		$link = $t2 . $prev_m . $t2 . $this_m . $t2 . $next_m . $t1;
		
		// 先月/次月へのリンクを付け足す
		$nav = $t1 . '<nav id="content_date">' . $link . '</nav>';
		
		// メニューリンクを返す
		return $nav;
		
	}
	
	
	//---------------------------------------------------------
	//  フィルターリンク生成
	//---------------------------------------------------------
	
	static function create_filter($act,$ini_d)
	{
		
		// グローバル変数を定義
		global $args,$path;
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// 変数を初期化
		$ymd = '';
		$opt = '';
		$end = '';
		
		// 年月日を取得
		$y = (isset($args['y'])) ? $args['y'] : '';
		$m = (isset($args['m'])) ? $args['m'] : '';
		$d = (isset($args['d'])) ? $args['d'] : '';
		
		// パラメータ統計の時
		if($act === 'param' or $act === 'pie_chart' or $act === 'transition'){$ymd =  $args[1] . "/$y/$m/";}
		
		// グラフの時
		elseif($act === 'graph'){$opt = "/$y/$m";}
		
		// 詳細の時
		elseif($act === 'detail'){$ymd = "$y/$m/$d/";}
		
		// 日間詳細の時
		elseif($act === 'param_daily'){$opt = "/$y/$m/$d";}
		
		// ページ情報の時
		elseif($act === 'page_data' and isset($args[2]) and $args[2] === 'csv'){$opt = "/csv";}
		
		// エラー＆ページ情報ではない時
		elseif($act !== 'error' and $act !== 'page_data'){$ymd = "$y/$m/";}
		
		// 一時配列を初期化
		$links = array();
		
		// iniファイル読み込みループ
		foreach($ini_d as $key => $val)
		{
			
			// 基本の時はkeyを空欄にする
			if($key === 'base'){$key = '';$end = '';}
			
			// オプションが存在する時は「/」を追記
			else{$end = '/';}
			
			// 配列にメニューリンクを入れる
			array_push($links,'<a href="' . "$scr_php/$act/$ymd$key$opt$end" . '">' . $val . '</a>');
			
		}
		
		// インデントタブを定義
		$t1 = "\n\t\t\t";
		$t2 = $t1 . "\t";
		
		// メニューを整形
		$nav =  $t1 . '<nav id="content_filter">' . $t2 . implode(" |$t2",$links) . $t1 . '</nav>';
		
		// メニューリンクを返す
		return $nav;
		
	}
	
	
	//---------------------------------------------------------
	//  前日翌日リンク生成
	//---------------------------------------------------------
	
	static function get_ymd($nop,$date,$y,$m,$d,$opt)
	{
		
		// 日付の0を削除
		$m += 0;
		$d += 0;
		
		// 前日の時
		if($nop === 'prev')
		{
			
			// チェック＆変更用変数をセット
			$check_d  = 1;
			$check_m  = 1;
			$change_m = 12;
			$pm = -1;
			
		}
		
		// 翌日の時
		else
		{
			
			// チェック＆変更用変数をセット
			$check_d  = $date->month_days($y,$m);
			$check_m  = 12;
			$change_m = 1;
			$pm = 1;
			
		}
		
		// 日チェック
		if($d == $check_d)
		{
			
			// 月チェック
			if($m == $check_m){$y += $pm;$m = $change_m;}
			
			// 月増減
			else{$m += $pm;}
			
			// 日セット
			$d = ($nop === 'prev') ? $date->month_days($y,$m) : 1;
			
		}
		
		// 日増減
		else{$d += $pm;}
		
		// 月日が1桁の時は2桁に整形
		if($m < 10){$m = '0' . $m;}
		if($d < 10){$d = '0' . $d;}
		
		// 日付指定オプションの時
		if($opt === 'timely'){$opt = $d;$d = 'timely';}
		
		// オプションが存在する時は/を追記
		if($opt){$opt .= '/';}
		
		// リンクを整形
		$link = "$y/$m/$d/$opt" . '" title="' . "$y/$m/$d";
		
		// リンクを返す
		return $link;
		
	}
	
}

