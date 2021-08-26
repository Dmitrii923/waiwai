<?php

class Canvas
{
	
	//---------------------------------------------------------
	//  ベクターグラフィックス生成（canvas）
	//---------------------------------------------------------
	
	function index($height,$length,$left,$pixcel,$t_cnt,$y_cnt,$hh)
	{
		
		// グローバル変数を定義
		global $obj,$conf;
		
		// 汎用クラスインスタンスを取得
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$cnt    = '';
		$canvas = '';
		$u_line = '';
		$p_line = '';
		$u_rect = '';
		$p_rect = '';
		
		// 連結点の色補正を定義
		$plus = 40;
		
		// テンプレート変数を初期化
		$v = array();
		
		// インデントタブを定義
		$tab = "\n\t\t\t\t\t\t";
		
		// 折れ線グラフの色を取得
		$u_color = $conf['line_color_u'];
		$p_color = $conf['line_color_p'];
		
		// 連結点の色を定義
		$ru_color = $this->color_plus($u_color,$plus);
		$rp_color = $this->color_plus($p_color,$plus);
		
		// 不透明度を定義
		$alpha = 0.5;
		
		////////////////////////////////////////////////////////////
		
		// テンプレートファイルを読み込み
		list($header,$main,$main2,$main3,$main4,$footer) = $tmpl->read('canvas.htm');
		
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
				
				// 今日のカウントをセット
				$u_cnt = $t_cnt[$u_i];
				$p_cnt = $t_cnt[$p_i];
				
			}
			
			// 現在時間以上の時
			else
			{
				
				// 現在時間 + 1時間の時
				if($i == $hh + 1)
				{
					
					// テンプレートを変更
					$main3 = $main4;
					
					// 左座標を一時的に戻す
					$left -= $length;
					
					// 不透明度を設定
					$u_line .= $main . "v.moveTo($left,$u_top);";
					$u_line .= $tab  . "v.strokeStyle = 'rgba($u_color,$alpha)';";
					$p_line .= $main . "v.moveTo($left,$p_top);";
					$p_line .= $tab  . "v.strokeStyle = 'rgba($p_color,$alpha)';";
					$u_rect .= $main . "v.fillStyle = 'rgba($ru_color,$alpha)';";
					$p_rect .= $main . "v.fillStyle = 'rgba($rp_color,$alpha)';";
					
					// 左座標を進める
					$left += $length;
					
				}
				
				// 今日のカウントをセット
				$u_cnt = $y_cnt[$u_i];
				$p_cnt = $y_cnt[$p_i];
				
			}
			
			// 高さを取得
			$u_top = $height - round($u_cnt * $pixcel);
			$p_top = $height - round($p_cnt * $pixcel);
			
			// 一番最初の時
			if($i == 0)
			{
				
				// 移動メソッドを追記
				$u_line .= $tab . "v.moveTo($left,$u_top);";
				$p_line .= $tab . "v.moveTo($left,$p_top);";
				
			}
			
			// 二番目以降の時
			else
			{
				
				// 折れ線描画メソッドを追記
				$u_line .= $tab . "v.lineTo($left,$u_top);";
				$p_line .= $tab . "v.lineTo($left,$p_top);";
				
			}
			
			// 矩形の座標を調整
			$rect_left  = $left  - 4;
			$rect_u_top = $u_top - 4;
			$rect_p_top = $p_top - 4;
			
			// 矩形描画メソッドを追記
			$u_rect .= $tab . "v.fillRect($rect_left,$rect_u_top,7,7);";
			$p_rect .= $tab . "v.fillRect($rect_left,$rect_p_top,7,7);";
			
			// テンプレート変数にセット
			$v['u_cnt'] = $u_cnt;
			$v['p_cnt'] = $p_cnt;
			$v['left']  = $left  - 6 . 'px';
			$v['u_top'] = $u_top - 4 . 'px';
			$v['p_top'] = $p_top - 4 . 'px';
			
			// 連結点を追記
			$cnt .= $tmpl->res($main3,$v);
			
			// 左座標を増やす
			$left += $length;
			
		}
		
		// 影を設定
		//$shadow = "v.shadowColor = '#cccccc';v.shadowOffsetX = 2;v.shadowOffsetY = 2;";
		
		// キャンバスを整形
		$canvas .= $tmpl->res($header,$v) . "v.strokeStyle = 'rgb($u_color)';";
		$canvas .= $u_line . $main . "v.strokeStyle = 'rgb($p_color)';";
		$canvas .= $p_line . $main . "v.fillStyle = 'rgb($ru_color)';";
		$canvas .= $u_rect . $main . "v.fillStyle = 'rgb($rp_color)';";
		$canvas .= $p_rect . $main2 . $cnt . $footer;
		
		// キャンバスを返す
		return $canvas;
		
	}
	
	
	//---------------------------------------------------------
	//  ベクターグラフィックス生成（canvas）
	//---------------------------------------------------------
	
	function graph($height,$length,$left,$pixcel,$u,$p,$s,$e)
	{
		
		// グローバル変数を定義
		global $obj,$conf;
		
		// 汎用クラスインスタンスを取得
		$tmpl = $obj['tmpl'];
		
		////////////////////////////////////////////////////////////
		
		// 変数を初期化
		$cnt    = '';
		$canvas = '';
		$u_line = '';
		$p_line = '';
		$u_rect = '';
		$p_rect = '';
		
		// 連結点の色補正を定義
		$plus = 40;
		
		// テンプレート変数を初期化
		$v = array();
		
		// インデントタブを定義
		$tab = "\n\t\t\t\t\t\t";
		
		// 折れ線グラフの色を取得
		$u_color = $conf['line_color_u'];
		$p_color = $conf['line_color_p'];
		
		// 連結点の色を定義
		$ru_color = $this->color_plus($u_color,$plus);
		$rp_color = $this->color_plus($p_color,$plus);
		
		// 不透明度を定義
		$alpha = 0.5;
		
		////////////////////////////////////////////////////////////
		
		// テンプレートファイルを読み込み
		list($header,$main,$main2,$main3,$main4,$footer) = $tmpl->read('canvas.htm');
		
		// データ取得ループ
		for($i = $s;$i < $e;$i++)
		{
			
			// データが無い時は終了
			if(!isset($p[$i])){$left += $length;continue;}
			
			// 今日のカウントをセット
			$u_cnt = $u[$i];
			$p_cnt = $p[$i];
			
			// 高さを取得
			$u_top = $height - round($u_cnt * $pixcel);
			$p_top = $height - round($p_cnt * $pixcel);
			
			// 一番最初の時
			if(!$p_line)
			{
				
				// 移動メソッドを追記
				$u_line .= $tab . "v.moveTo($left,$u_top);";
				$p_line .= $tab . "v.moveTo($left,$p_top);";
				
			}
			
			// 二番目以降の時
			else
			{
				
				// 折れ線描画メソッドを追記
				$u_line .= $tab . "v.lineTo($left,$u_top);";
				$p_line .= $tab . "v.lineTo($left,$p_top);";
				
			}
			
			// 矩形の座標を調整
			$rect_left  = $left  - 4;
			$rect_u_top = $u_top - 4;
			$rect_p_top = $p_top - 4;
			
			// 矩形描画メソッドを追記
			$u_rect .= $tab . "v.fillRect($rect_left,$rect_u_top,7,7);";
			$p_rect .= $tab . "v.fillRect($rect_left,$rect_p_top,7,7);";
			
			// テンプレート変数にセット
			$v['u_cnt'] = $u_cnt;
			$v['p_cnt'] = $p_cnt;
			$v['left']  = $left  - 6 . 'px';
			$v['u_top'] = $u_top - 4 . 'px';
			$v['p_top'] = $p_top - 4 . 'px';
			
			// 連結点を追記
			$cnt .= $tmpl->res($main3,$v);
			
			// 左座標を増やす
			$left += $length;
			
		}
		
		// 変数を初期化
		$v = array();
		
		// 影を設定
		//$shadow = "v.shadowColor = '#cccccc';v.shadowOffsetX = 2;v.shadowOffsetY = 2;";
		
		// canvasを整形
		$canvas .= $tmpl->res($header,$v) . "v.strokeStyle = 'rgb($u_color)';";
		$canvas .= $u_line . $main . "v.strokeStyle = 'rgb($p_color)';";
		$canvas .= $p_line . $main . "v.fillStyle = 'rgb($ru_color)';";
		$canvas .= $u_rect . $main . "v.fillStyle = 'rgb($rp_color)';";
		$canvas .= $p_rect . $main2 . $cnt . $footer;
		
		// キャンバスを返す
		return $canvas;
		
	}
	
	
	//---------------------------------------------------------
	//  色補正
	//---------------------------------------------------------
	
	function color_plus($color,$plus)
	{
		
		// RGBに分割
		list($r,$g,$b) = explode(',',$color);
		
		// 補正値を足す
		$r += $plus;
		$g += $plus;
		$b += $plus;
		
		// 補正後の色を返す
		return "$r,$g,$b";
		
	}
	
}

