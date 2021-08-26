<?php

class Transition
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
	//  ヘルプ表示
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$path,$args;
		
		// 汎用クラスインスタンスを取得
		$db   = $obj['db'];
		$tmpl = $obj['tmpl'];
		
		// ワークディレクトリを取得
		$work_dir = $path['work_dir'];
		
		// スクリプト名を取得
		$scr_php = $path['scr_php'];
		
		// テーブル名プレフィックスを取得
		$prefix = $path['prefix'];
		
		// ジャンプパスを定義
		$jump_php = 'http://act.st/api/jump.php/';
		//$jump_php = $scr_php . '/jump/';
		
		////////////////////////////////////////////////////////////
		
		// 色配列を定義
		$colors[1]  = '60,60,255';
		$colors[2]  = '175,0,255';
		$colors[3]  = '255,50,50';
		$colors[4]  = '100,185,50';
		$colors[5]  = '125,125,255';
		$colors[6]  = '200,100,255';
		$colors[7]  = '255,150,150';
		$colors[8]  = '255,100,0';
		$colors[9]  = '255,200,0';
		$colors[10] = '0,150,0';
		
		// 変数を初期化
		$ranks  = array();
		$left_plus  = 41;
		$top_plus   = 23;
		$start_left = 12;
		$table  = '';
		$rects  = '';
		$lines  = '';
		
		////////////////////////////////////////////////////////////
		
		// アクション名を取得
		$act = $args['act'];
		
		// 項目種別を取得
		$param = $args[1];
		
		// フィルター設定を取得
		$opt = $args['opt'];
		
		// ピックアップ項目を取得
		$pickup = $args['pickup'];
		
		// 年を取得
		$y = $args['y'];
		
		// 月を取得
		$m = $args['m'];
		
		// DB名を定義
		$t_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		// DBが存在しない時は終了
		if(!$db->exists($t_db)){return;}
		
		////////////////////////////////////////////////////////////
		
		// クラスを読み込み
		include($work_dir . '/actions/param.php');
		
		// クラスインスタンスを生成
		$obj_param = new Param();
		
		// テンプレートを分割
		list($head,$main,$foot) = $tmpl->read('param_daily.htm');
		
		// ヘッダー,メイン,フッター テンプレートを取得
		list($c_head,$c_line,$c_rect,$c_foot) = $tmpl->read('transition.htm');
		
		// 変数を初期化
		$column  = 'name,cnt';
		$column1 = 'sum(cnt) as sum,count(distinct name) as rows';
		$column2 = '';
		$order   = 'cnt';
		$ua_type = '';
		$replace = '';
		$from    = '';
		$where   = "type = '$param'";
		$group   = '';
		$limit   = '';
		$opt2    = '';
		$slash   = '/';
		
		// 表示件数を設定
		$param_limit = 10;
		
		// 定数を定義
		define('max_len',22);
		define('jump_php',$jump_php);
		define('left_plus',$left_plus);
		
		////////////////////////////////////////////////////////////
		
		// 有無フィルターの時
		if($opt === 'exists'){$replace = 'replace_opt_exists';}
		
		// ドメインフィルターの時
		elseif($opt === 'domain' or $opt === 'search'){list($replace,$column2,$from,$where) = $obj_param->domain($prefix);}
		
		// 統合フィルターの時
		elseif($opt === 'arrange'){list($replace,$where) = $obj_param->opt_arrange($scr_php,$act,$param,$where,$y,$m);}
		
		// ページ,リンク先,リンク元の時
		elseif($param === 'page' or $param === 'click' or $param === 'referrer'){list($replace,$column2,$from,$where,$param,$opt,$slash) = $obj_param->page($db,$param,$opt,$prefix);}
		
		// 検索キーワードの時
		elseif($param === 'search_words'){list($replace,$where,$param,$opt,$opt2) = $obj_param->search_words($param,$opt);}
		
		// 訪問回数の時
		elseif($param === 'visit'){$replace = ($opt === 'repeat') ? 'replace_opt_repeat' : 'replace_visit';}
		
		// OSの時
		elseif($param === 'os'){list($replace,$where,$opt) = $obj_param->os($opt,$pickup);}
		
		// UAの時
		elseif($param === 'ua'){list($replace,$column,$param,$where,$group,$opt,$ua_type,$order,$pickup) = $obj_param->ua($opt,$pickup);}
		
		// ホストドメインの時
		elseif($param === 'host_domain'){list($replace,$where,$opt) = $obj_param->host_domain($opt);}
		
		////////////////////////////////////////////////////////////
		
		// 最終年月を算出
		$ey = $y + 0;
		$em = $m + 0;
		
		// 最初年月を算出
		if($em === 12){$sm = 1;$sy = $y;}
		else{$sm = $em + 1;$sy = $y - 1;}
		
		// 変数を別名で保持
		$y = $sy;
		$m = $sm;
		
		// 変数を初期化
		$v = array();
		$c = array();
		$pers  = array();
		$items = array();
		
		// テンプレート変数を初期化
		$c['pers']  = array();
		$c['items'] = array();
		
		// カウンターを初期化
		$k = 0;
		
		// インテントタブを設定
		$t1 = "\n\t\t\t\t";
		$t2 = $t1 . "\t";
		$t3 = $t2 . "\t";
		
		// ヘッダーテンプレートを追記
		$table  = $head;
		$table2 = "\t\t\t\t" . '<table id="month">' . $t2 . '<tr>';
		
		////////////////////////////////////////////////////////////
		
		// テーブル名取得ループ
		for($j = 0;$j < 12;$j++)
		{
			
			// 月の桁数を補正
			$m = ($m < 10) ? '0' . $m : $m;
			
			// 統計ログテーブル名を定義
			$i_table = $prefix . '_i_' . $y . '_' . $m;
			
			// DB名を定義
			$t_db = $prefix . '_' . $y . '_' . $m . '.db';
			
			// 月<table>に追記
			$table2 .= $t3 . "<td>$m</td>";
			
			// DBが存在しない時は次へ
			if(!$db->exists($t_db)){list($y,$m,$start_left) = self::to_next($y,$m,$start_left);continue;}
			
			// DBに接続
			$db->attach($t_db,'a' . $j);
			
			// SQLを定義
			$q = "select $column1 from $i_table $from where $where;";
			
			// SQLを実行
			$a = $db->query_fetch($q);
			
			// 総カウント数を取得
			$total_cnt = $a['sum'];
			
			// 総件数を取得
			$all_rows = $a['rows'];
			
			// データがない時は次へ
			if(!$all_rows){list($y,$m,$start_left) = self::to_next($y,$m,$start_left);continue;}
			
			// SQLを定義
			$q = "select $column $column2 from $i_table $from where $where $group order by $order desc $limit;";
			
			// SQLを実行
			$r = $db->query($q);
			
			// フィルター設定が存在する時
			if($opt){list($opt_d,$total_cnt,$all_rows) = $obj_param->opt_filter($db,$param,$opt,$r,$total_cnt,$i_table);$opt2 = '/';}
			
			// 携帯フィルターの時はフィルターに追記
			elseif($ua_type){$opt2 = $ua_type . '/';}
			
			// 最大表示件数を定義
			$limit_cnt = $all_rows;
			
			////////////////////////////////////////////////////////////
			
			// レコードデータ表示ループ
			for($i = 1;;$i++)
			{
				
				// フィルターが存在しない時
				if(!$opt)
				{
					
					// データを取得
					$v = $db->fetch($r);
					
					// データが無い時はループ終了
					if(!$v){break;}
					
				}
				
				// フィルターが存在する時
				else
				{
					
					// データが無い時はループ終了
					if($i > $limit_cnt){break;}
					
					// データを取得
					list($v['name'],$v['cnt']) = each($opt_d);
					
				}
				
				// 表示文字列を置換
				if($replace){$v['name'] = $obj_param->$replace($v,$param);}
				
				// 項目名を取得
				$name = $v['name'];
				
				// 順位を配列にセット
				$ranks[$k][$name] = $i;
				
			}
			
			////////////////////////////////////////////////////////////
			
			// 月を増加
			list($y,$m) = self::to_next($y,$m);
			
			// カウンターを1増加
			$k++;
			
			// レコード取得をリセット
			$db->reset($r);
			
			// DBとデタッチ
			$db->detach('a' . $j);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 最終月の配列を取得
		$z = ($ranks) ? $ranks[$k - 1] : array();
		$y = count($z);
		
		// カウンターを初期化
		$i = 1;
		
		// 最大表示件数+1 を算出
		$x = ($y > 10) ? 11 : $y + 1;
		
		// インデントタブを定義
		$tab = "\n\t\t\t\t\t";
		
		////////////////////////////////////////////////////////////
		
		// 名前+順位取得ループ
		while(list($name,$val) = each($z))
		{
			
			// 変数を初期化
			$left = $start_left;
			
			// 色を取得
			$v['color'] = $colors[$i];
			
			// 折れ線を追記
			if($i != 1){$lines .= $tmpl->res($c_line,$v);}
			
			// 連結点を追記
			$rects .= $tmpl->res($c_rect,$v);
			
			// 月間順位取得ループ
			for($j = 0;$j < $k;$j++)
			{
				
				// 12位以下の時は11位に設定
				if(!isset($ranks[$j][$name]) or $ranks[$j][$name] > $x){$ranks[$j][$name] = $x;}
				
				// 上座標を算出
				$top = $top_plus * $ranks[$j][$name];
				
				// 一番最初の時
				if($left == $start_left){$lines .= $tab . "v.moveTo($left,$top);";}
				
				// 二番目以降の時
				else{$lines .= $tab . "v.lineTo($left,$top);";}
				
				// 矩形の座標を調整
				$rect_left = $left - 4;
				$rect_top  = $top  - 4;
				
				// 矩形描画メソッドを追記
				$rects .= $tab . "v.fillRect($rect_left,$rect_top,7,7);";
				
				// 左座標を移動
				$left += $left_plus;
				
			}
			
			// 表示用に項目名を整形
			if($param === 'host_domain'){$name = preg_replace('/\(.+/','',$name);}
			elseif($opt2  === 'mobile/'){$name = preg_replace('/^([\S]+) ([\S]+) .+/',"$1 $2",$name);}
			
			// テンプレート変数をセット
			$v['i']    = $i;
			$v['name'] = $name;
			$v['cnt']  = '';
			$v['tr']   = 'b' . $i;
			
			// メインテンプレートを出力
			$table .= $tmpl->res($main,$v);
			
			// 10位に達したら終了
			if($i == 10){break;}
			
			// 順位を1増加
			$i++;
			
		}
		
		////////////////////////////////////////////////////////////
		
		// キャンバスを出力
		echo $c_head . $lines . $rects . $c_foot;
		
		// フッターテンプレートを追記
		$table  .= $foot;
		$table2 .= $t2 . '</tr>' . $t1 . '</table>' . "\n";
		
		// 項目テーブルを出力
		echo $table2 . $table;
		
	}
	
	
	//---------------------------------------------------------
	//  次への処理
	//---------------------------------------------------------
	
	static function to_next($y,$m,$start_left = '')
	{
		
		// 月を増加
		$m++;
		
		// 12月までいったら年を繰り越し
		if($m == '13'){$y++;$m = 1;}
		
		// 初期位置をずらす
		if($start_left){$start_left += left_plus;}
		
		// 年月、初期位置を返す
		return array($y,$m,$start_left);
		
	}
	
}

