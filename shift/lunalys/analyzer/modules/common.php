<?php

class Common
{
	
	//---------------------------------------------------------
	//  文字数の制限
	//---------------------------------------------------------
	
	function len_check($str,$len,$opt = false)
	{
		
		// 文字が制限バイト数より小さい時
		if(!isset($str{$len})){return $str;}
		
		// 文字を別名で保持
		$tmpl_str = $str;
		
		// title無しオプションが存在しない時
		if(!$opt)
		{
			
			// title属性を整形
			$title = ' title="' . $tmpl_str . '"';
			
			// 文字を指定バイト数に切り詰め
			$tmpl_str = substr($tmpl_str,0,$len) . '...';
			
			// title属性を付加
			$str = '<span' . $title . '>' . $tmpl_str . '</span>';
			
		}
		
		// title無しオプションが存在する時
		else
		{
			
			// 改行用にスペースを挿入
			$tmpl_str  = substr($str,0,$len) . ' ';
			
			// 前後を付け足す
			$tmpl_str .= substr($str,$len);
			
			// 別名をオリジナルにセット
			$str = $tmpl_str;
			
		}
		
		// 文字を返す
		return $str;
		
	}
	
	
	//---------------------------------------------------------
	//  日付リンク生成（年月日）
	//---------------------------------------------------------
	
	function create_date_d($act,$date)
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
		$prev_d = '<a href="' . "$scr_php/$act/" . $this->get_ymd('prev',$date,$y,$m,$d,$opt) . '">&lt;</a>';
		
		// 次日リンクを取得
		$next_d = '<a href="' . "$scr_php/$act/" . $this->get_ymd('next',$date,$y,$m,$d,$opt) . '">&gt;</a>';
		
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
	
	function create_date_m($act,$date,$opt = '',$menu = '')
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
	
	function create_date_y($act,$date)
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
	
	function create_filter($act,$ini_d)
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
	
	function get_ymd($nop,$date,$y,$m,$d,$opt)
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
	
	
	//---------------------------------------------------------
	//  #形式からRGBへ変換
	//---------------------------------------------------------
	
	function color($vg_color_u,$vg_color_p,$plus = 0)
	{
		
		// 16進数を10進数に変換
		$ur = hexdec(substr($vg_color_u,1,2)) + $plus;
		$ug = hexdec(substr($vg_color_u,3,2)) + $plus;
		$ub = hexdec(substr($vg_color_u,5,2)) + $plus;
		$pr = hexdec(substr($vg_color_p,1,2)) + $plus;
		$pg = hexdec(substr($vg_color_p,3,2)) + $plus;
		$pb = hexdec(substr($vg_color_p,5,2)) + $plus;
		
		// 線の色を定義
		$u_color = "$ur,$ug,$ub";
		$p_color = "$pr,$pg,$pb";
		
		// 線の色を返す
		return array($u_color,$p_color);
		
	}
	
}

