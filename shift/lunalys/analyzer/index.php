<?php

// ワークディレクトリ名を取得
$work_dir = dirname(__FILE__);

// ベースディレクトリ名を取得
$base_dir = dirname($work_dir);

// コントローラクラスを読み込み
include($base_dir . '/framework/modules/core/controller.php');

// 処理実行
Controller::execute($base_dir,$work_dir);

