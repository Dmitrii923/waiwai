<?php
$id = $line[0];
$name = $line[1];
$name2 = $line[2];
$age = $line[3];
$height = $line[4];
$weight = $line[5];
$bust = $line[6];
$cup = $line[7];
$waist = $line[8];
$hip = $line[9];
$comment = $line[10];
$comment2 = $line[11];
$profinfo1 = $line[12];
$profinfo2 = $line[13];
$profinfo3 = $line[14];
$profinfo4 = $line[15];
$profinfo5 = $line[16];
$profinfo6 = $line[17];
$profinfo7 = $line[18];
$profinfo8 = $line[19];
$profinfo9 = $line[20];
$profinfo10 = $line[21];
$option1 = $line[22];
$option2 = $line[23];
$option3 = $line[24];
$option4 = $line[25];
$option5 = $line[26];
$option6 = $line[27];
$option7 = $line[28];
$option8 = $line[29];
$option9 = $line[30];
$option10 = $line[31];
$option11 = $line[32];
$option12 = $line[33];
$option13 = $line[34];
$option14 = $line[35];
$option15 = $line[36];
$option16 = $line[37];
$option17 = $line[38];
$option18 = $line[39];
$option19 = $line[40];
$option20 = $line[41];
$option21 = $line[42];
$option22 = $line[43];
$option23 = $line[44];
$option24 = $line[45];
$option25 = $line[46];
$option26 = $line[47];
$option27 = $line[48];
$option28 = $line[49];
$option29 = $line[50];
$option30 = $line[51];
$option31 = $line[52];
$option32 = $line[53];
$option33 = $line[54];
$option34 = $line[55];
$option35 = $line[56];
$option36 = $line[57];
$option37 = $line[58];
$option38 = $line[59];
$option39 = $line[60];
$option40 = $line[61];
$photo1 = $line[62];
$photo2 = $line[63];
$photo3 = $line[64];
$photo4 = $line[65];
$photo5 = $line[66];
$photo6 = $line[67];
$photo7 = $line[68];
$photo8 = $line[69];
$photo9 = $line[70];
$photo10 = $line[71];
//曜日で入れ替え
if($week1 == '月'){
	$yotei1 = $line[72];
	$yotei2 = $line[75];
	$yotei3 = $line[78];
	$yotei4 = $line[81];
	$yotei5 = $line[84];
	$yotei6 = $line[87];
	$yobi4 = $line[93];
	
	$start1 = $line[73];
	$start2 = $line[76];
	$start3 = $line[79];
	$start4 = $line[82];
	$start5 = $line[85];
	$start6 = $line[88];
	$yobi5 = $line[94];
	
	$end1 = $line[74];
	$end2 = $line[77];
	$end3 = $line[80];
	$end4 = $line[83];
	$end5 = $line[86];
	$end6 = $line[89];
	$yobi6 = $line[95];
	
}elseif($week1 == '火'){
	$yotei1 = $line[75];
	$yotei2 = $line[78];
	$yotei3 = $line[81];
	$yotei4 = $line[84];
	$yotei5 = $line[87];
	$yotei6 = $line[93];
	$yobi4 = $line[72];
	
	$start1 = $line[76];
	$start2 = $line[79];
	$start3 = $line[82];
	$start4 = $line[85];
	$start5 = $line[88];
	$start6 = $line[94];
	$yobi5 = $line[73];
	
	$end1 = $line[77];
	$end2 = $line[80];
	$end3 = $line[83];
	$end4 = $line[86];
	$end5 = $line[89];
	$end6 = $line[95];
	$yobi6 = $line[74];

}elseif($week1 == '水'){
	$yotei1 = $line[78];
	$yotei2 = $line[81];
	$yotei3 = $line[84];
	$yotei4 = $line[87];
	$yotei5 = $line[93];
	$yotei6 = $line[72];
	$yobi4 = $line[75];
	
	$start1 = $line[79];
	$start2 = $line[82];
	$start3 = $line[85];
	$start4 = $line[88];
	$start5 = $line[94];
	$start6 = $line[73];
	$yobi5 = $line[76];
	
	$end1 = $line[80];
	$end2 = $line[83];
	$end3 = $line[86];
	$end4 = $line[89];
	$end5 = $line[95];
	$end6 = $line[74];
	$yobi6 = $line[77];

}elseif($week1 == '木'){
	$yotei1 = $line[81];
	$yotei2 = $line[84];
	$yotei3 = $line[87];
	$yotei4 = $line[93];
	$yotei5 = $line[72];
	$yotei6 = $line[75];
	$yobi4 = $line[78];
	
	$start1 = $line[82];
	$start2 = $line[85];
	$start3 = $line[88];
	$start4 = $line[94];
	$start5 = $line[73];
	$start6 = $line[76];
	$yobi5 = $line[79];
	
	$end1 = $line[83];
	$end2 = $line[86];
	$end3 = $line[89];
	$end4 = $line[95];
	$end5 = $line[74];
	$end6 = $line[77];
	$yobi6 = $line[80];

}elseif($week1 == '金'){
	$yotei1 = $line[84];
	$yotei2 = $line[87];
	$yotei3 = $line[93];
	$yotei4 = $line[72];
	$yotei5 = $line[75];
	$yotei6 = $line[78];
	$yobi4 = $line[81];
	
	$start1 = $line[85];
	$start2 = $line[88];
	$start3 = $line[94];
	$start4 = $line[73];
	$start5 = $line[76];
	$start6 = $line[79];
	$yobi5 = $line[82];
	
	$end1 = $line[86];
	$end2 = $line[89];
	$end3 = $line[95];
	$end4 = $line[74];
	$end5 = $line[77];
	$end6 = $line[80];
	$yobi6 = $line[83];

}elseif($week1 == '土'){
	$yotei1 = $line[87];
	$yotei2 = $line[93];
	$yotei3 = $line[72];
	$yotei4 = $line[75];
	$yotei5 = $line[78];
	$yotei6 = $line[81];
	$yobi4 = $line[84];
	
	$start1 = $line[88];
	$start2 = $line[94];
	$start3 = $line[73];
	$start4 = $line[76];
	$start5 = $line[79];
	$start6 = $line[82];
	$yobi5 = $line[85];
	
	$end1 = $line[89];
	$end2 = $line[95];
	$end3 = $line[74];
	$end4 = $line[77];
	$end5 = $line[80];
	$end6 = $line[83];
	$yobi6 = $line[86];
	
}elseif($week1 == '日'){
	$yotei1 = $line[93];
	$yotei2 = $line[72];
	$yotei3 = $line[75];
	$yotei4 = $line[78];
	$yotei5 = $line[81];
	$yotei6 = $line[84];
	$yobi4 = $line[87];
	
	$start1 = $line[94];
	$start2 = $line[73];
	$start3 = $line[76];
	$start4 = $line[79];
	$start5 = $line[82];
	$start6 = $line[85];
	$yobi5 = $line[88];
	
	$end1 = $line[95];
	$end2 = $line[74];
	$end3 = $line[77];
	$end4 = $line[80];
	$end5 = $line[83];
	$end6 = $line[86];
	$yobi6 = $line[89];
}
	
#$yotei1 = $line[72];
#$start1 = $line[73];
#$end1 = $line[74];
#$yotei2 = $line[75];
#$start2 = $line[76];
#$end2 = $line[77];
#$yotei3 = $line[78];
#$start3 = $line[79];
#$end3 = $line[80];
#$yotei4 = $line[81];
#$start4 = $line[82];
#$end4 = $line[83];
#$yotei5 = $line[84];
#$start5 = $line[85];
#$end5 = $line[86];
#$yotei6 = $line[87];
#$start6 = $line[88];
#$end6 = $line[89];
$yobi1 = $line[90]; //ピックアップ
$yobi2 = $line[91]; //その他
$yobi3 = $line[92];
#$yobi4 = $line[93];	//yotei7
#$yobi5 = $line[94];	//start7
#$yobi6 = $line[95];	//end7
$yobi7 = $line[96];	//表示期限日
$yobi8 = $line[97]; //登録日
$yobi9 = $line[98]; //新人・オススメ
$yobi10 = $line[99];
$edittime = $line[100];

$edittime = str_replace("\r\n" , "" , $edittime); //改行コードを削除
?>