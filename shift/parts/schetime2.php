<?php
//整数に変換
	$edittime = (int)$edittime;
//日付切り替え設定

	//出勤入力日が本日の場合（そのまま表示）
	if ($edittime == $tdy) {
		$start1disp = $start1;
		$end1disp = $end1;
		$start2disp = $start2;
		$end2disp = $end2;
		$start3disp = $start3;
		$end3disp = $end3;
		$yotei1disp = $yotei1;
		$yotei2disp = $yotei2;
		$yotei3disp = $yotei3;
	//出勤入力日が昨日の場合（出勤を1日ずらして表示）
	} elseif ($edittime == $ytd) {
		$start1disp = $start2;
		$end1disp = $end2;
		$start2disp = $start3;
		$end2disp = $end3;
		$start3disp = '未定';
		$end3disp = '未定';
		$yotei1disp = $yotei2;
		$yotei2disp = $yotei3;
		$yotei3disp = $empty;
	//出勤入力日が一昨日の場合（出勤を3日ずらして表示）
	} elseif ($edittime == $dby) {
		$start1disp = $start3;
		$end1disp = $end3;
		$start2disp = '未定';
		$end2disp = '未定';
		$start3disp = '未定';
		$end3disp = '未定';
		$yotei1disp = $yotei3;
		$yotei2disp = $empty;
		$yotei3disp = $empty;
	}
?>