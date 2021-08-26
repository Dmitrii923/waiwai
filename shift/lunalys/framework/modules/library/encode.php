<?php

class Encode
{
	
	//---------------------------------------------------------
	//  Webエンコード
	//---------------------------------------------------------
	
	function web_encode($value,$encoding = 'UTF-8')
	{
		
		// 文字コードが違う時
		if(mb_detect_encoding($value) != $encoding)
		{
			
			// 文字コードを変換
			$value = mb_convert_encoding($value,$encoding,'ASCII,JIS,UTF-8,EUC-JP,SJIS');
			
		}
		
		// 参照文字列に変換
		$value = htmlspecialchars($value);
		
		// 参照文字列に変換（特殊文字）
		$value = preg_replace('/,/','&#44;',$value);
		$value = preg_replace('/\r/','',$value);
		$value = preg_replace('/\n/','<br />',$value);
		
		// エンコードデータを返す
		return $value;
		
	}
	
	
	//---------------------------------------------------------
	//  Webデコード
	//---------------------------------------------------------
	
	function web_decode($value)
	{
		
		// 参照文字列を変換
		$value = html_entity_decode($value);
		
		// 改行を変換
		$value = preg_replace('/<br \/>/',"\n",$value);
		
		// デコードデータを返す
		return $value;
	
	}
	
	
	//---------------------------------------------------------
	//  リンクエンコード
	//---------------------------------------------------------
	
	function link_encode($value)
	{
		
		// Aタグを削除
		$value = preg_replace('/&lt;a .+&gt;(.+)&lt;\/a&gt;/i',"$1",$value);
		
		// リンクを整形
		$value = preg_replace('/(http:\/\/[\w\.\/\-=&%?,;#]*)/',"<a href=\"$1\" target=\"_blank\">$1</a>",$value);
		
		// エンコードデータを返す
		return $value;
		
	}
	
	
	//---------------------------------------------------------
	//  リンクデコード
	//---------------------------------------------------------
	
	function link_decode($value)
	{
		
		// Aタグを削除
		$value = preg_replace('/(<a href="http:\/\/)(.+)(" target="_blank">)(http:\/\/)([^<>]+)(<\/a>)/',"$4$5",$value);
		
		// デコードデータを返す
		return $value;
		
	}
	
}

