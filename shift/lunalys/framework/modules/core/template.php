<?php

class Template
{
	
	// テンプレートディレクトリ
	public $tmpl_dir;
	
	
	//---------------------------------------------------------
	//  コンストラクタ
	//---------------------------------------------------------
	
	function __construct($work_dir)
	{
		
		// テンプレートディレクトリ名を定義
		$this->tmpl_dir = $work_dir . '/templates/htm';
		
	}
	
	
	//---------------------------------------------------------
	//  テンプレートの出力
	//---------------------------------------------------------
	
	function view($html,$vars = array())
	{
		
		// 連想配列を変数に展開
		extract($vars);
		
		// テンプレートを出力
		eval("echo <<<_HTML_\n$html\n_HTML_;\n");
		
	}
	
	
	//---------------------------------------------------------
	//  テンプレートの出力（戻り値）
	//---------------------------------------------------------
	
	function res($html,$vars = array())
	{
		
		// 連想配列を変数に展開
		extract($vars);
		
		// テンプレートを変数にセット
		eval("\$eval = <<<_HTML_\n$html\n_HTML_;\n");
		
		// テンプレートを返す
		return $eval;
		
	}
	
	
	//---------------------------------------------------------
	//  テンプレートファイルの読み込み
	//---------------------------------------------------------
	
	function read($file_name,$delimiter = '<!---->')
	{
		
		// テンプレートファイル名を整形
		$tmpl_htm = $this->tmpl_dir  . '/' . $file_name;
		
		// テンプレートファイルが読み込めない時は終了
		if(!is_readable($tmpl_htm) or !filesize($tmpl_htm)){return false;}
		
		// データを読み込み
		$tmpl_d = file_get_contents($tmpl_htm) or die("$tmpl_htm File Read Error");
		
		// デリミタが存在する時は分割してデータを返す
		if($delimiter){return explode($delimiter,$tmpl_d);}
		
		// データを返す
		return $tmpl_d;
		
	}
	
}

