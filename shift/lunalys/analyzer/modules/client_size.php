<?php

class Client_Size
{
	
	//---------------------------------------------------------
	//  ディスプレイ解像度,ブラウザ表示領域取得
	//---------------------------------------------------------
	
	static function size()
	{
		
		// 変数を初期化
		$display_size = '';
		$client_size  = '';
		
		// ディスプレイ解像度が存在する時
		if(isset($_GET['display_width']) and isset($_GET['display_height']))
		{
			
			// ディスプレイ解像度を取得
			$display_width  = intval($_GET['display_width']);
			$display_height = intval($_GET['display_height']);
			
			// ディスプレイ解像度を整形
			$display_size = $display_width . ' x ' . $display_height;
			
		}
		
		// ブラウザ表示領域を取得
		if(isset($_GET['client_width']) and isset($_GET['client_height']))
		{
			
			// ブラウザ表示領域を取得
			$client_width  = self::half_adjust($_GET['client_width'] ,$display_width);
			$client_height = self::half_adjust($_GET['client_height'],$display_height);
			
			// ブラウザ表示領域を整形
			$client_size = $client_width . ' x ' . $client_height;
			
		}
		
		// ディスプレイ解像度,ブラウザ表示領域を取得
		return array($display_size,$client_size);
		
	}
	
	
	//---------------------------------------------------------
	//  ブラウザ表示領域 四捨五入
	//---------------------------------------------------------
	
	static function half_adjust($client,$display)
	{
		
		// 整数に変換
		$client = intval($client);
		
		// 解像度より大きい時は調整
		if($client > $display){$client = $display;}
		
		// 下2桁目の位置を取得
		$len = strlen($client) - 2;
		
		// 2桁以下の時は「100」を返す
		if($len < 1){return 100;}
		
		// 下3桁目以上を取得
		$s = substr($client,0,$len);
		
		// 下2桁を取得
		$e = substr($client,$len);
		
		// 下2桁が50以上の時は3桁目を繰り上げ
		if($e > 49){$s++;}
		
		// 四捨五入した数値を整形
		$client = intval($s . '00');
		
		// 解像度より大きい時は調整
		if($client > $display){$client -= 100;}
		
		// 四捨五入した数値を返す
		return $client;
		
	}
	
}

