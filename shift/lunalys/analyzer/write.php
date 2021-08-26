<?php

// 接続が途切れても実行する
ignore_user_abort(1);

// オリジナルディレクトリ名を取得
$org_dir = getcwd();

// ワークディレクトリ名を取得
$work_dir = dirname(__FILE__);

// ベースディレクトリ名を取得
$base_dir = dirname($work_dir);

// カレントディレクトリを移動
chdir($work_dir);

// クラスを読み込み
include($work_dir . '/modules/logging.php');

// 処理実行
Logging::execute($base_dir,$work_dir);

// カレントディレクトリを移動
chdir($org_dir);

