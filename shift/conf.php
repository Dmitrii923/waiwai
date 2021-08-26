<?php

//「''」内を変更。IDとパスワード設定
$login_id = 'waiwai';	//ログインID
$login_pass = '1234';	//ログインパスワード

//「''」内を変更。サイトURL
$site_url = '';

//「''」内を変更。モバイル版URL
$mobile_url = '';

//「''」内を変更。スマフォ版URL
$smart_url = '';

//「''」内を変更。出勤情報日付切り替えの時間差設定　※-2で2時間遅れで日付切り替え
$jisa = '-3';

//写真サイズ※固定サイズは「変更不可」のところにｱﾘ
$photo_m = 240;	//携帯ページ用メイン
$photo_t = 73;	//スケジュールサムネイル
$photo_s = 65;	//携帯スケジュール、在籍サムネイル
$photo_p = 104;	//ブログサムネイル
$photo_b = 300;	//プロフィールページメイン
$photo_g = 115;	//プロフィールページサムネイル
$photo_z = 176;	//在籍サムネイル
//掲示板用写真サイズ
$photo_bbs = 200;
$photo_bbss = 100;

//写真クオリティー
$quality = 90;

//【携帯ページ】キャストリスト表示件数（1ページの最大表示件数）
$page_lmt = '20';

//【携帯ページ】掲示板表示件数（1ページの最大表示件数）
$page_lmt_bbs = '10';

//管理者用コピーライト
$copyright = 'Copyright &copy; ICD';
$copyright_url = 'http://www.i-c-design.net';

/*////////// 変更はここまで //////////*/


/*////////// 以下変更不可　 //////////*/

//写真サイズ
$photo_l = 46;	//出勤管理ページの最小写真(固定)

$php_disp =	'index2.php';					//登録・一覧表示ページ
$php_write = 'write.php';					//新規書込み
$php_rewrite = 'rewrite.php';				//編集書込み
$php_edit = 'edit.php';						//編集ページ
//出勤編集画面色設定
$base_color = '#FF6699';
//出勤日切り替え用日付
$tdy = date('md' , time() + $jisa*3600);
$ytd = date('md' , time() + (-24+$jisa)*3600);
$dby = date('md' , time() + (-48+$jisa)*3600);
$twdby = date('md' , time() + (-72+$jisa)*3600);
$thdby = date('md' , time() + (-96+$jisa)*3600);
$fodby = date('md' , time() + (-120+$jisa)*3600);
$fidby = date('mb' , time() + (-144+$jisa)*3600);
//表示期限日比較用
$tdy_8dig = date('Ymd' , time() + $jisa*3600);
//プロフィール登録日用
$yobi8 = date('YmdHis');
//曜日の日本語表記用
$week = array('日','月','火','水','木','金','土');
//日付（本日から6日間分）
$day1 = date('n月j日' , time() + $jisa*3600);
$day2 = date('n月j日' , time() + (24+$jisa)*3600);
$day3 = date('n月j日' , time() + (48+$jisa)*3600);
$day4 = date('n月j日' , time() + (72+$jisa)*3600);
$day5 = date('n月j日' , time() + (96+$jisa)*3600);
$day6 = date('n月j日' , time() + (120+$jisa)*3600);
$day7 = date('n月j日' , time() + (144+$jisa)*3600);
$week1 = $week[date('w' , time() + $jisa*3600)];
$week2 = $week[date('w' , time() + (24+$jisa)*3600)];
$week3 = $week[date('w' , time() + (48+$jisa)*3600)];
$week4 = $week[date('w' , time() + (72+$jisa)*3600)];
$week5 = $week[date('w' , time() + (96+$jisa)*3600)];
$week6 = $week[date('w' , time() + (120+$jisa)*3600)];
$week7 = $week[date('w' , time() + (144+$jisa)*3600)];
//空データ
$empty = '';

//イベントデータ
$now_year = date("Y"); //現在の年を取得
$now_month = date("n"); //現在の月を取得
$next_month = date("n", strtotime(date('Y-m-1').' +1 month')) ; //翌月の月を取得
$next_year = date("Y", strtotime('+1 year'));//来年の年を取得


?>