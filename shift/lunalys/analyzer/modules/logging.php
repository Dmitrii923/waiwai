<?php

class Logging
{
	
	//---------------------------------------------------------
	//  メイン処理
	//---------------------------------------------------------
	
	static function execute($base_dir,$work_dir)
	{
		
		// グローバル変数を定義
		global $conf;
		
		// コンフィグ設定ファイルを解析
		$conf = parse_ini_file($work_dir . '/configs/conf.ini');
		
		// 自分のアクセスをカウントしない時は終了
		if(isset($_COOKIE['ls_login']) and !$conf['admin_count']){return;}
		
		// UA情報が存在する時は取得する
		$ua_full = (isset($_SERVER['HTTP_USER_AGENT'])) ? strip_tags($_SERVER['HTTP_USER_AGENT']) : '';
		
		// ページタイトル取得の時は終了
		if($ua_full === 'Lunalys'){return;}
		
		// フレームワーク設定ファイルを解析
		$fw = parse_ini_file($work_dir . '/configs/fw.ini');
		
		// ディレクトリ＆ファイルパスを定義
		$fw_dir    = $fw['fw_dir'];
		$data_dir  = $base_dir . '/' . $fw['data_dir'];
		$error_log = $data_dir . '/' . $fw['error_log'];
		
		// iniオプションを設定
		ini_set('date.timezone'  ,$fw['date.timezone']);
		ini_set('error_reporting',$fw['error_reporting']);
		ini_set('display_errors' ,$fw['display_errors']);
		ini_set('log_errors'     ,$fw['log_errors']);
		ini_set('error_log'      ,$error_log);
		
		////////////////////////////////////////////////////////////
		
		// クラスを読み込み
		include($work_dir . '/modules/page.php');
		include($work_dir . '/modules/user_agent.php');
		
		// 汎用クラスを読み込み
		include_once($base_dir . '/' . $fw_dir . '/modules/core/db.php');
		
		// 汎用クラスインスタンスを取得
		$db = new DB($data_dir);
		
		////////////////////////////////////////////////////////////
		
		// フラグを初期化
		$flag['uni']      = false;
		$flag['t_ym']     = false;
		$flag['t_date']   = false;
		$flag['vacuum']   = false;
		$flag['page_no']  = false;
		
		// 変数を初期化
		$p          = array();
		$u_td       = 'u_td + 1';
		$p_td       = 'p_td + 1';
		$where      = '';
		$t_date     = '';
		$l_update   = '';
		$t_update   = '';
		$r_update   = '';
		$route_time = '';
		
		// Cookie用変数を初期化
		$id    = '';
		$visit = 0;
		
		// 時差を取得
		$gmt_diff = $fw['gmt_diff'];
		
		// マスターDB名を取得
		$main_db = $fw['main_db'];
		
		// テーブル名プレフィックスを取得
		$prefix = $fw['prefix'];
		
		// 同じIPのUAチェック可否設定を取得
		$ua_check = $conf['ua_check'];
		
		// ユニークPV可否を取得
		$unique_pv = $conf['unique_pv'];
		
		// 別アクセスと判断する空白時間を取得
		$blank_time = $conf['blank_time'];
		
		// 詳細ログローテーション件数を取得
		$detail_rotation = $conf['detail_rotation'];
		
		// アクセスルートの最大保存件数を取得
		$page_route_limit = $conf['page_route_limit'];
		
		// 対象ドメインを取得
		$domain = $conf['domain'];
		
		////////////////////////////////////////////////////////////
		
		// アクション名を取得
		$act = (isset($_GET['act'])) ? $_GET['act'] : '';
		
		// Cookieが存在する時はCookieを解析
		if(isset($_COOKIE['lunalys_id'])){parse_str($_COOKIE['lunalys_id']);}
		
		// Cookieが存在しない時はIDを生成
		else{$id = self::id($act);}
		
		// IPアドレスを取得
		$ip_address = self::ip_address();
		
		// UA,OS,UA種別を取得
		list($ua,$os,$ua_type) = User_Agent::ua_os($ua_full);
		
		// 現在日付を取得する
		list($y,$m,$d,$w,$hh,$mm,$ss) = explode(' ',gmdate('Y m d D H i s',$_SERVER['REQUEST_TIME'] + $gmt_diff * 60 * 60));
		
		// 年/月/日 を定義
		$a_date = $y . '-' . $m . '-' . $d;
		
		// 月/日 を定義
		$a_ym = $y . '-' . $m;
		
		// 曜日を定義
		$a_wday = $w;
		
		// 時/分/秒 を定義
		$l_time = $hh . ':' . $mm . ':' . $ss;
		
		// 時間を修正
		$h = $hh + 0;
		
		// 月間ログテーブル名を定義
		$l_table = $prefix . '_l_' . $y . '_' . $m;
		$d_table = $prefix . '_d_' . $y . '_' . $m;
		$i_table = $prefix . '_i_' . $y . '_' . $m;
		
		// 累計カウントテーブル名を定義
		$t_table = $prefix . '_total';
		
		// 月間DB名を定義
		$monthly_db = $prefix . '_' . $y . '_' . $m . '.db';
		
		////////////////////////////////////////////////////////////
		
		// マスターDBが存在しない時は作成する
		if(!$db->exists($main_db)){self::create_master($work_dir,$db,$main_db,$prefix);}
		
		// 月間DBに接続
		$db->connect($monthly_db);
		
		// マスターDBを追加接続
		$db->attach($main_db,'master');
		
		////////////////////////////////////////////////////////////
		
		// 検索条件を定義
		$where = "where a_date = '$a_date'";
		$order = 'order by l_time desc limit 1';
		
		// UAもチェックする時はwhere句に追記
		if($ua_check){$where .= ' and ua = ' . $db->escape($ua);}
		
		// include以外の時
		if($act)
		{
			
			// where句を定義
			$where2 = $where . " and ip_address = '$ip_address' " . $order;
			
			// add 呼び出しの時はデータを追記
			if($act === 'add')
			{
				
				// クラスを読み込み
				include($work_dir . '/modules/add.php');
				include($work_dir . '/modules/client_size.php');
				
				// 追加パラメータ情報を追記
				exit(Add::add_size($db,$where2,$d_table,$i_table,$id,$visit));
				
			}
			
			// click 呼び出しの時はデータを追記
			elseif($act === 'click')
			{
				
				// クラスを読み込み
				include($work_dir . '/modules/click.php');
				
				// クリック情報を追記
				exit(Click::click_link($db,$where2,$d_table,$i_table,$prefix,$conf));
				
			}
			
			// img呼び出しの時
			elseif($act === 'img')
			{
				
				// 透明gif画像を出力
				self::img();
				
				// 呼び出し元をURLにセット
				if(!isset($_GET['url']) and isset($_SERVER['HTTP_REFERER'])){$_GET['url'] = $_SERVER['HTTP_REFERER'];}
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// PCの時
		if($ua_type === 'PC'){$where_ip = "ip_address = '$ip_address'";}
		
		// PCではない時
		else
		{
			
			// IPアドレスを分割
			$ips = explode('.',$ip_address);
			
			// IPアドレスの末尾を削除
			array_pop($ips);
			
			// 検索条件を定義
			$where_ip = "ip_address like '" . implode('.',$ips) . "%'";
			
		}
		
		// 条件にID一致を追記
		$where .= " and (id = '$id' or " . $where_ip . ')';
		
		// 有効期限時間を算出
		$bh = (int) $hh - $blank_time;
		
		// 現在時間がブランク時間以上の時
		if($ua_type !== 'Robot' and $bh >= 0)
		{
			
			// 時間が10時未満の時は2桁に整形
			if($bh < 10){$bh = '0' . $bh;}
			
			// ブランク時刻を取得
			$b_time = $bh . ':' . $mm . ':' . $ss;
			
			// 検索条件に有効期限を追記
			$where .= " and l_time > '$b_time'";
			
		}
		
		// SQLを定義
		$q2  = "select seq,l_time,page_route,route_time from $d_table $where $order;";
		
		////////////////////////////////////////////////////////////
		
		// トランザクション開始
		$db->begin();
		
		// ページ番号を取得
		$page_no = Page::page_no($db,$prefix,$conf);
		
		// SQLを定義
		$q = "select t_date from $t_table;";
		
		// 日付を取得
		$t_date = $db->query_fetch($q,'t_date');
		
		// ログの日付と現在日付が同じ時
		if($a_date === $t_date){$flag['t_date'] = true;}
		
		// 月が同じ時
		elseif(preg_match("/$a_ym/A",$t_date)){$flag['t_ym'] = true;}
		
		////////////////////////////////////////////////////////////
		
		// 日付が違う場合
		if(!$flag['t_date'])
		{
			
			// ユニーク増加フラグをtrueにセット
			$flag['uni'] = true;
			
			// 日曜日の時はフラグをtrueにする
			if($w === 'Sun'){$flag['vacuum'] = true;}
			
			// 月が違う場合
			if(!$flag['t_ym'])
			{
				
				// クラスを読み込み
				include_once($work_dir . '/modules/sql.php');
				
				// クラスインスタンスを取得
				$obj_sql = new SQL();
				
				// テーブルを生成
				$db->query($obj_sql->create_l_table($l_table));
				$db->query($obj_sql->create_d_table($d_table));
				$db->query($obj_sql->create_i_table($i_table));
				
			}
			
			// SQLを定義
			$q = "insert into $l_table (a_date,a_wday) values ('$a_date','$a_wday');";
			
			// SQLを実行
			$db->query($q);
			
			// 先日日付を取得
			$y_date = gmdate('Y-m-d',strtotime('-1 days') + $gmt_diff * 60 * 60);
			
			// 累計カウントテーブルが存在する時
			if($t_date)
			{
				
				// 年,月,日 にログ日付を分割
				list($t_y,$t_m,$t_d) = explode('-',$t_date);
				
				// SQLを定義
				$t_update  = ",t_date = '$a_date',y_date = '$y_date'";
				
				// ロボット用SQLを定義
				if($ua_type === 'Robot'){$r_update = substr($t_update,1);}
				
			}
			
			// 累計カウントテーブルが存在しない時
			else
			{
				
				// SQLを定義
				$q = "insert into $t_table (t_date,y_date,u_check) values ('$a_date','$y_date',1);";
				
				// SQLを実行
				$db->query($q);
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// 日付が同じ場合
		else
		{
			
			// SQLを実行
			$a = $db->query_fetch($q2);
			
			// IP or IDが存在しない時はフラグをtrueにセット
			if(!$a){$flag['uni'] = true;}
			
			// IP or IDが既に存在している場合
			else
			{
				// ページ番号を分割
				$page_nos = explode('-',$a['page_route']);
				
				// PV総数を取得
				$cnt_ps = count($page_nos);
				
				// 配列の最終indexを算出
				$last_page_no = $cnt_ps - 1;
				
				// リロードの時は終了
				if($page_no === $page_nos[$last_page_no]){return self::close($db,'rollback');}
				
				// ロボットかつ10PV以上の時は終了
				elseif($ua_type === 'Robot' and $cnt_ps >= 10){return self::close($db,'rollback');}
				
				// PVが最大保存件数以上の時は終了
				elseif($cnt_ps >= $page_route_limit){return self::close($db,'rollback');}
				
				// ユニークPVが有効の時
				elseif($unique_pv){while(list(,$page_no_u) = each($page_nos)){if($page_no === $page_no_u){return self::close($db,'rollback');}}}
				
				// シークエンスを取得
				$seq = $a['seq'];
				
				// 経過時間を取得
				list($r_hh,$r_mm,$r_ss) = self::diff_times($a['l_time'],$l_time);
				
				// 時間を2桁に調整
				if($r_hh > 0){$r_mm = 60;$r_ss = '00';}
				
				// ルート時間が存在する時
				if($a['route_time']){$a['route_time'] .= '-';}
				
				// 更新後の値を変数にセット
				$page_route = $a['page_route'] . '-' . $page_no;
				$route_time = $a['route_time'] . $r_mm . ':' . $r_ss;
				
				// SQLを定義
				$q  = "update $d_table set ";
				$q .= "l_time = '$l_time',page_route = '$page_route',route_time = '$route_time' ";
				$q .= "where seq = $seq;";
				
				// SQLを実行
				$db->query($q);
				
			}
			
		}
		
		////////////////////////////////////////////////////////////
		
		// ユニークフラグがtrueの時
		if($flag['uni'])
		{
			
			// 変数を初期化
			$ref_no       = '';
			$referrer     = '';
			$search_words = '';
			$display_size = '';
			$client_size  = '';
			
			// 訪問回数を1増やす
			++$visit;
			
			//////////////////////////////////////////////////////////////////////
			
			// リンク元を取得（JavaScript） 
			if(isset($_GET['referrer'])){$referrer = $_GET['referrer'];}
			
			// リンク元を取得
			elseif(isset($_SERVER['HTTP_REFERER'])){$referrer = $_SERVER['HTTP_REFERER'];}
			
			// サーバーのドメインを取得
			$http_host = $_SERVER['HTTP_HOST'];
			
			// リンク元が同じドメインの時
			if(preg_match("/(http|https):\/\/[^\/]*($http_host)/A",$referrer)){$referrer = '';}
			
			// リンク元が違うドメインの時
			else
			{
				
				// クラスを読み込み
				include($work_dir . '/modules/referrer.php');
				
				// リンク元No,検索語を取得
				list($ref_no,$search_words) = Referrer::ref_words($db,$prefix,$referrer,$conf);
				
			}
			
			//////////////////////////////////////////////////////////////////////
			
			// js呼び出しの時
			if($act === 'js')
			{
				
				// クラスを読み込み
				include($work_dir . '/modules/client_size.php');
				
				// ディスプレイ解像度,ブラウザ表示領域を取得
				list($display_size,$client_size) = Client_Size::size();
				
			}
			
			//////////////////////////////////////////////////////////////////////
			
			// IP/ホスト/ドメイン を取得
			list($remote_host,$host_domain) = self::host_domain($ip_address);
			
			// UA偽装のロボットは受け付けない
			if($ua_type !== 'Robot'){self::spam_check($db,$ip_address,$remote_host,$referrer);}
			
			//////////////////////////////////////////////////////////////////////
			
			// 詳細ログパラメータ配列を定義
			$p['host_domain']  = $host_domain;
			$p['search_words'] = $search_words;
			$p['ua_full']      = $ua_full;
			$p['ua']           = $ua;
			$p['os']           = $os;
			$p['display_size'] = $display_size;
			$p['client_size']  = $client_size;
			
			// 新規詳細ログデータを整形
			$d_t_nd  = "null,'$id','$ip_address','$remote_host',:host_domain,'$a_date','$a_wday','$l_time','$l_time',$visit,'$ref_no','$page_no','','',";
			
			// 新規詳細ログデータにパラメータを追加
			$d_t_nd .= ":search_words,'$ua_type',:ua_full,:ua,:os,:display_size,:client_size";
			
			// SQLを定義
			$q = "insert into $d_table values ($d_t_nd);";
			
			// SQLを実行
			$db->prepare($q,$p);
			
			// SQLに追記
			$l_update = ",u_td = u_td + 1,u_$hh = u_$hh + 1";
			
			// SQLに追記
			$t_update .= ",u_t = u_t + 1";
			
			// UA全文は保存しない
			$p['ua_full'] = '';
			
			// リンク元を追加
			$p['referrer'] = $ref_no;
			
			// JavaScript呼び出しか初回時は訪問回数を追加
			if($act or $visit === 1){$p['visit'] = $visit;}
			
		}
		
		////////////////////////////////////////////////////////////
	
		// ロボットではない時は更新
		if($ua_type !== 'Robot')
		{
			
			// 月間アクセスページログを更新
			if($page_no){$p['page'] = $page_no;}
			
			// SQLを定義
			$q = "update $l_table set p_td = p_td + 1,p_$hh = p_$hh + 1 $l_update where a_date = '$a_date';";
			
			// SQLを実行
			$db->query($q);
			
			// SQLを定義
			$q = "update $t_table set p_t = p_t + 1 $t_update;";
			
			// SQLを実行
			$db->query($q);
			
		}
		
		// ロボットかつ日付が変わった時
		elseif($r_update)
		{
			
			// SQLを定義
			$q = "update $t_table set $r_update;";
			
			// SQLを実行
			$db->query($q);
			
		}
		
		////////////////////////////////////////////////////////////
		
		// トランザクション終了
		$db->commit();
		
		// 月間ログテーブルの更新がない時は終了
		if(!$p){return $db->close();}
		
		// トランザクション開始
		$db->begin('immediate');
		
		// 月間ログテーブルを更新
		self::update_monthly($db,$i_table,$p,$ua_type);
		
		// 詳細ログローテーション
		if($flag['uni'] and $detail_rotation){self::delete_d_table($db,$d_table,$detail_rotation);}
		
		// トランザクション終了
		$db->commit();
		
		// データ領域開放
		if($flag['vacuum']){$db->query('vacuum;');}
		
		// DB接続終了
		$db->close();
		
		// js 呼び出しの時はCookieを発行
		if($act === 'js'){self::set_cookie($id,$visit);}
		
	}
	
	
	//---------------------------------------------------------
	//  マスターテーブル作成
	//---------------------------------------------------------
	
	static function create_master($work_dir,$db,$main_db,$prefix)
	{
		
		// クラスを読み込み
		include($work_dir . '/modules/sql.php');
		
		// クラスインスタンスを取得
		$obj_sql = new SQL();
		
		// マスターDBに接続
		$db->connect($main_db);
		
		// テーブルを生成
		$db->query($obj_sql->create_t_table($prefix . '_total'));
		$db->query($obj_sql->create_n_table($prefix . '_page' ));
		$db->query($obj_sql->create_n_table($prefix . '_click'));
		$db->query($obj_sql->create_n_table($prefix . '_referrer'));
		
		// マスターDBと切断
		$db->close();
		
	}
	
	
	//---------------------------------------------------------
	//  月間項目ログの更新
	//---------------------------------------------------------
	
	static function update_monthly($db,$i_table,$p,$ua_type)
	{
		
		// 月間パラメータの更新ループ
		while(list($key,$val) = each($p))
		{
			
			// データが無い時は次へ
			if(!$val){continue;}
			
			// PC以外のUAの時
			if($key === 'ua' and $ua_type !== 'PC')
			{
				
				// ロボットの時
				if($ua_type === 'Robot'){$key = 'robot';}
				
				// 携帯の時
				elseif($ua_type === 'Mobile'){$key = 'mobile';}
				
				// ゲーム機の時
				elseif($ua_type === 'Game'){$key = 'game';}
				
			}
			
			// 検索語の時
			if($key === 'search_words')
			{
				
				// スペースで単語に分割
				$words = explode(' ',$val);
				
				// 単語取得ループ
				while(list(,$word) = each($words))
				{
					
					// データがある場合は単語で保存
					if($word){self::update_i_table($db,$i_table,'search_word',$word);}
					
				}
				
				// 2語以上ある時
				if(count($words) > 1)
				{
					
					// 月間フレーズログを更新
					self::update_i_table($db,$i_table,'search_words',$val);
					
				}
				
			}
			
			// 検索語以外の時
			else{self::update_i_table($db,$i_table,$key,$val);}
			
		}
		
	}
	
	
	//---------------------------------------------------------
	//  月間項目ログの更新
	//---------------------------------------------------------
	
	static function update_i_table($db,$i_table,$key,$val)
	{
		
		// 値をエスケープ
		$key = $db->escape($key);
		$val = $db->escape($val);
		
		// SQLを定義
		$q = "select count(name) as cnt from $i_table where type = $key and name = $val;";
		
		// SQLを実行
		$cnt = $db->query_fetch($q,'cnt');
		
		// データ更新用SQLを定義
		if($cnt){$q = "update $i_table set cnt = cnt + 1 where type = $key and name = $val;";}
		
		// データ挿入用SQLを定義
		else{$q = "insert into $i_table values ($val,$key,1);";}
		
		// SQLを実行
		$db->query($q);
		
	}
	
	
	//---------------------------------------------------------
	//  詳細ログローテーション
	//---------------------------------------------------------
	
	static function delete_d_table($db,$d_table,$detail_rotation)
	{
		
		// SQLを定義
		$q = "select count(seq) as cnt from $d_table;";
		
		// SQLを実行
		$cnt = $db->query_fetch($q,'cnt');
		
		// 最大保存件数以下の時は何もしない
		if($cnt <= $detail_rotation){return;}
		
		// SQLを定義
		$q = "select seq from $d_table order by seq limit 1;";
		
		// SQLを実行
		$seq = $db->query_fetch($q,'seq');
		
		// SQLを定義
		$q = "delete from $d_table where seq = $seq;";
		
		// SQLを実行
		$db->query($q);
		
	}
	
	
	//---------------------------------------------------------
	//  Cookieの発行
	//---------------------------------------------------------
	
	static function set_cookie($id,$visit)
	{
		
		// 引数を整形
		$c_val = "id=$id&visit=$visit";
		
		// 有効期限を定義
		$c_time = $_SERVER['REQUEST_TIME'] + 3600 * 24 * 365;
		
		// 現在のサーバーホストを分割
		$c_dm = array_reverse(explode('.',$_SERVER['SERVER_NAME']));
		
		// 2nd LD の長さが3以上の時（属性無し）
		if(strlen($c_dm[1]) > 2){$c_host = '.' . $c_dm[1] . '.' . $c_dm[0];}
		
		// 2nd LD の長さが2以下の時（属性有り）
		else{$c_host = '.' . $c_dm[2] . '.' . $c_dm[1] . '.' . $c_dm[0];}
		
		// クロスドメイン用ヘッダーを出力
		header("P3P: CP='UNI CUR OUR'");
		
		// Cookieを発行
		setcookie('lunalys_id',$c_val,$c_time,'/',$c_host);
		
	}
	
	
	//---------------------------------------------------------
	//  経過時間の算出
	//---------------------------------------------------------
	
	static function diff_times($start,$end,$del = ':')
	{
		
		// デリミタで分割
		list($sh,$sm,$ss) = explode($del,$start);
		list($eh,$em,$es) = explode($del,$end);
		
		// 秒数を算出
		$xss = ($sh * 60 * 60) + ($sm * 60) + $ss;
		$xes = ($eh * 60 * 60) + ($em * 60) + $es;
		
		// 総経過時間を算出
		$diff = $xes - $xss;
		
		// 経過分を算出
		$dm = floor($diff / 60);
		
		// 経過秒を算出
		$ds = $diff % 60;
		
		// 一時間以上の時
		if($diff >= 3600)
		{
			
			// 経過時を算出
			$dh = floor($dm / 60);
			
			// 経過分を算出
			$dm = $dm - ($dh * 60);
			
		}
		
		// 一時間未満の時
		else{$dh = 0;}
		
		// 桁数を補正
		if($dh < 10){$dh = '0' . $dh;}
		if($dm < 10){$dm = '0' . $dm;}
		if($ds < 10){$ds = '0' . $ds;}
		
		// 経過時間を返す
		return array($dh,$dm,$ds);
		
	}
	
	
	//---------------------------------------------------------
	//  URL整形
	//---------------------------------------------------------
	
	static function rewrite_url($url,$conf,$out = false)
	{
		
		// カット文字列を取得
		$cut_url = ($out) ? $conf['cut_url_out'] : $conf['cut_url'];
		
		// カット文字列が存在する時
		if($cut_url)
		{
			
			// URLカット文字列を整形
			$cut_url = addcslashes($cut_url,'/?-=^');
			
			// カット文字列以降を削除
			$url = preg_replace("/(.*$cut_url).*/","$1",$url);
			
		}
		
		// 「www.」「:～」「#～」を削除
		$url = preg_replace('/(www\.|:[\d]+|#.*)/','',$url);
		
		// 「index.～」を削除
		$url = preg_replace('/index\.[\w]{2,4}$/','',$url);
		
		// 外部URLの時はURLを返す
		if($out){return $url;}
		
		// URL引数は削除
		if($conf['cut_args']){$url = preg_replace('/[\?&%].*/','',$url);}
		
		// ファイル名がない時は「/」を補正
		if($conf['dir_slash']){$url = preg_replace('/(\/[^\.\/]+$|:\/\/[^\/]+$)/',"$1/",$url);}
		
		// 「/」の連続は「/」に統一
		$url = preg_replace('/[\/]{2,}/','/',$url);
		
		// http:を元に戻す
		$url = preg_replace('/(http|https):/',"$1:/",$url);
		
		// URLを返す
		return $url;
		
	}
	
	
	//---------------------------------------------------------
	//  Webエンコード
	//---------------------------------------------------------
	
	static function web_encode($value,$encoding = 'UTF-8')
	{
		
		// 文字コードが違う時
		if(mb_detect_encoding($value) != $encoding)
		{
			
			// 文字コードを変換
			$value = mb_convert_encoding($value,$encoding,'ASCII,JIS,UTF-8,EUC-JP,SJIS');
			
		}
		
		// 半角カナを全角、全角英数字を半角に変換
		$value = mb_convert_kana($value,'KVa',$encoding);
		
		// 参照文字列に変換
		$value = htmlspecialchars($value);
		
		// 参照文字列に変換（特殊文字）
		$value = preg_replace('/,/','&#44;',$value);
		$value = preg_replace('/\r|\n/','' ,$value);
		
		// &amp;は&に戻す
		$value = preg_replace('/&amp;/','&',$value);
		
		// エンコードデータを返す
		return $value;
		
	}
	
	
	//---------------------------------------------------------
	//  処理終了
	//---------------------------------------------------------
	
	static function close($db,$method = 'commit')
	{
		
		// トランザクション終了
		$db->$method();
		
		// DB接続終了
		$db->close();
		
	}
	
	
	//---------------------------------------------------------
	//  ID取得
	//---------------------------------------------------------
	
	static function id($act)
	{
		
		// 変数を初期化
		$id = '';
		
		// オリジナルのUAを取得
		$org_ua = (isset($_SERVER['HTTP_USER_AGENT'])) ? $_SERVER['HTTP_USER_AGENT'] : '';
		
		// IDを取得
		    if(preg_match('/DoCoMo.+ser([\w]+)/' ,$org_ua,$h)){$id = $h[1];}
		elseif(preg_match('/SoftBank.+SN([\w]+)/',$org_ua,$h)){$id = $h[1];}
		elseif(isset($_SERVER['HTTP_X_DCMGUID']))   {$id = $_SERVER['HTTP_X_DCMGUID'];}
		elseif(isset($_SERVER['HTTP_X_JPHONE_UID'])){$id = $_SERVER['HTTP_X_JPHONE_UID'];}
		elseif(isset($_SERVER['HTTP_X_UP_SUBNO']))  {$id = preg_replace('/\..*/','',$_SERVER['HTTP_X_UP_SUBNO']);}
		elseif($act){$id = uniqid(rand(100,999) . '_');}
		
		// IDを返す
		return $id;
		
	}
	
	
	//---------------------------------------------------------
	//  IPアドレス取得
	//---------------------------------------------------------
	
	static function ip_address()
	{
		
		// デフォルトのIPアドレスを取得
		$ip_address = $_SERVER['REMOTE_ADDR'];
		
		// 環境変数名を配列に格納
		$envs = array('HTTP_FROM','HTTP_CLIENT_IP','HTTP_X_FORWARDED_FOR');
		
		// 環境変数をチェックするループ
		while(list(,$env) = each($envs))
		{
			
			// 環境変数にIPアドレスがセットされている時
			if(isset($_SERVER[$env]) and preg_match('/([\d\.]+)/A',$_SERVER[$env],$h))
			{
				
				// 元のIPアドレスを取得
				$ip_address = $h[1];
				
				// ループを抜ける
				break;
				
			}
			
		}
		
		// IPアドレスを返す
		return $ip_address;
		
	}
	
	
	//---------------------------------------------------------
	//  ホスト/ドメイン 解析
	//---------------------------------------------------------
	
	static function host_domain($ip_address = '')
	{
		
		// IPアドレスを取得
		if(!$ip_address){$ip_address = $_SERVER['REMOTE_ADDR'];}
		
		// IPアドレスをリモートホストに変換
		$remote_host = gethostbyaddr($ip_address);
		
		// 名前解決できない時
		if(!$remote_host or $remote_host === $ip_address){return array($ip_address,'unknown');}
		
		// ローカルホストらのアクセスの時
		elseif($remote_host === 'localhost'){return array($remote_host,$remote_host);}
		
		// リモートホストを分割
		$hosts = explode('.',$remote_host);
		
		// 不正なホスト名の時
		if(count($hosts) < 3){return array($ip_address,$remote_host);}
		
		// 配列を逆順に並べ替え
		$hosts = array_reverse($hosts);
		
		// 2nd LD の長さを取得
		$sld_len = strlen($hosts[1]);
		
		// 2nd LD の長さが3以上の時（属性無し）
		if($sld_len > 2){$host_domain = $hosts[1] . '.' . $hosts[0];}
		
		// 2nd LD の長さが2以下の時（属性有り）
		else{$host_domain = $hosts[2] . '.' . $hosts[1] . '.' . $hosts[0];}
		
		// ホスト,ドメインを返す
		return array($remote_host,$host_domain);
		
	}
	
	
	//---------------------------------------------------------
	//  透明gif画像出力
	//---------------------------------------------------------
	
	static function img()
	{
		
		// 更新日付ヘッダーを出力
		header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
		header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
		
		// キャッシュコントロールヘッダーを出力
		header('Cache-Control: no-store, no-cache, must-revalidate');
		header('Cache-Control: post-check=0, pre-check=0',false);
		
		// Pragmaを出力
		header('Pragma: no-cache');
		
		// imgヘッダーを出力
		header('Content-Type: image/gif');
		
		// 透明gifバイナリを出力
		echo base64_decode('R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==');
		
	}
	
	
	//---------------------------------------------------------
	//  SPAMチェック
	//---------------------------------------------------------
	
	static function spam_check($db,$ip_address,$remote_host,$referrer)
	{
		
		// フラグを初期化
		$spam = false;
		
		// 特定のIPやホスト名はSPAMとみなす
		    if(preg_match('/msnbot/A',$remote_host)){$spam = true;}
		elseif(preg_match('/(amazonaws.com|.com.ua|.net.ua|.org.ua)$/',$remote_host)){$spam = true;}
		//elseif(preg_match('/(kyivstar.net|lv.lv.cox.net|rdns.ubiquityservers.com|static.hostnoc.net|bb.sky.com)$/',$remote_host)){$spam = true;}
		//elseif(preg_match('/92.249.127.111|219.13.76.19|193.106.136/A',$ip_address)){$spam = true;}
		//elseif(preg_match('/122.133.206.204|61.195.142.114|60.236.102/A',$ip_address)){$spam = true;}
		
		// ホスト名が取得出来ない時はSPAMとみなす
		elseif(!$referrer and $remote_host === $ip_address){$spam = true;}
		
		// SPAMではない時は何もしない
		if(!$spam){return;}
		
		// 終了
		exit(self::close($db,'rollback'));
		
	}
	
}

