<?php

class File
{
	
	//---------------------------------------------------------
	//  ファイルの読み込み
	//---------------------------------------------------------
	
	function read($file_name,$opt = false)
	{
		
		// ファイルが読み込めない or データがない時は終了
		if(!is_readable($file_name) or !filesize($file_name)){return false;}
		
		// オプションがtrueの時はデータを一気に読み込み
		if($opt){$data = file_get_contents($file_name) or die("$file_name File Read Error");}
		
		// オプションがfalseの時
		else
		{
			
			// 変数を初期化
			$data = array();
			
			// ファイルをオープン
			$fh = fopen($file_name,'r') or die("$file_name File Read Error");
			
			// ファイルロック開始
			flock($fh,LOCK_SH);
			
			// データを配列に格納
			while($line = fgets($fh)){array_push($data,$line);}
			
			// ファイルロック終了
			flock($fh,LOCK_UN);
			
			// ファイルをクローズ
			fclose($fh);
			
		}
		
		// データを返す
		return $data;
		
	}
	
	
	//---------------------------------------------------------
	//  ファイルの保存
	//---------------------------------------------------------
	
	function write($file_name,$data)
	{
		
		// ファイルが存在する時
		if(file_exists($file_name))
		{
			
			// 書き込めない時は終了
			if(!is_writable($file_name)){return false;}
			
		}
		
		// ファイルが存在しない時
		else
		{
			
			// ファイルを作成
			$tof = touch($file_name);
			
			// 作成出来なかった時は終了
			if(!$tof){return false;}
			
			// パーミッションを書き込み可能に変更
			chmod($file_name,0606);
			
		}
		
		// データが配列の時は文字列に結合
		if(is_array($data)){$data = implode('',$data);}
		
		// ファイルをオープン
		$fh = fopen($file_name,'rb+') or die("$file_name File Write Error");
		
		// ファイルロック開始
		flock($fh,LOCK_EX);
		
		// ファイルバッファを有効に
		set_file_buffer($fh,0);
		
		// 既存データを削除
		ftruncate($fh,0);
		
		// データを書き込み
		fwrite($fh,$data);
		
		// ファイルロック終了
		flock($fh,LOCK_UN);
		
		// ファイルをクローズ
		fclose($fh);
		
		// trueを返す
		return true;
		
	}
	
	
	//---------------------------------------------------------
	//  ファイルの作成
	//---------------------------------------------------------
	
	function create($file_name)
	{
		
		// ファイルが存在する時は終了
		if(file_exists($file_name)){return;}
		
		// ファイルを作成
		$tof = touch($file_name);
		
		// 作成出来なかった時は終了
		if(!$tof){return false;}
		
		// パーミッションを書き込み可能に変更
		chmod($file_name,0606);
		
	}
	
	
	//---------------------------------------------------------
	//  ファイルの削除
	//---------------------------------------------------------
	
	function delete($file_name)
	{
		
		// ファイルが存在しない時は終了
		if(!file_exists($file_name)){return;}
		
		// ファイルを削除
		unlink($file_name);
		
	}
	
	
	//---------------------------------------------------------
	//  ディレクトリの読み込み
	//---------------------------------------------------------
	
	function read_dir($dir_name)
	{
		
		// ディレクトリが読み込めない時は終了
		if(!is_readable($dir_name)){return false;}
		
		// 変数を初期化
		$file_names = array();
		
		// ディレクトリを読み込み
		$dir = dir($dir_name);
		
		// ファイルリストを読み込むループ
		while(($file_name = $dir->read()))
		{
			
			// 「.」「..」以外のファイル名を配列に格納
			if($file_name != '.' and $file_name != '..'){array_push($file_names,$file_name);}
			
		}
		
		// ファイルリストを返す
		return $file_names;
		
	}
	
	
	//---------------------------------------------------------
	//  ディレクトリの作成
	//---------------------------------------------------------
	
	function create_dir($dir)
	{
		
		// ディレクトリが存在する時は終了
		if(file_exists($dir)){return;}
		
		// ディレクトリを作成
		mkdir($dir,0707);
		
	}
	
	
	//---------------------------------------------------------
	//  ディレクトリの削除
	//---------------------------------------------------------
	
	function delete_dir($dir)
	{
		
		// ディレクトリが存在しない時は終了
		if(!file_exists($dir)){return;}
		
		// ディレクトリを削除
		system("rm -rf $dir");
		
	}
	
	
	//---------------------------------------------------------
	//  ファイルのロック
	//---------------------------------------------------------
	
	function lock($file_name)
	{
		
		// 一時ファイルをオープン
		$fh = fopen($file_name,'w');
		
		// ファイルロック開始
		flock($fh,LOCK_EX);
		
		// ファイルハンドラを返す
		return $fh;
		
	}
	
	
	//---------------------------------------------------------
	//  ファイルのアンロック
	//---------------------------------------------------------
	
	function unlock($file_name,$fh)
	{
		
		// ファイルロックを解除
		flock($fh,LOCK_UN);
		
		// 一時ファイルをクローズ
		fclose($fh);
		
		// 一時ファイルを削除
		unlink($file_name);
		
	}
	
}

