<?php

class Footer
{
	
	//---------------------------------------------------------
	//  終了処理
	//---------------------------------------------------------
	
	static function execute()
	{
		
		// グローバル変数を定義
		global $obj,$args,$path;
		
		// 汎用クラスインスタンスを取得
		$tmpl = $obj['tmpl'];
		
		// 変数を別名で保持
		$v = $path;
		
		// 全件表示リンクを取得
		$v['content_all'] = (isset($args['content_all'])) ? $args['content_all'] : '';
		
		// テンプレートファイルを読み込み
		$footer = $tmpl->read('footer.htm',false);
		
		// フッターテンプレートを出力
		$tmpl->view($footer,$v);
		
	}
	
}

