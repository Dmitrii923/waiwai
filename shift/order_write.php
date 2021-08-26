<?php
$order_data='';
//order取得 女の子IDをセット
$order = split(",",$_REQUEST['order']);
//CSV列を$linesに$name2で連想配列セット
$fp=fopen("data.csv", "r");
$i2=1;
while ($line3 = fgets($fp)) {
    $ln=split(",", $line3);
    $lines[$ln[2]]=$line3; $i2++;
}
fclose($fp);
for($i=0; $i<$i2; $i++) {
//    $data2=$data2 . $lines[$order[$i]];
 
    $line4=$lines[$order[$i]];        //追加
    $line5=split(',',$line4);        //追加
    if($line5[0] != '') {            //追加
    array_splice($line5,0,1,"$i");    //追加
    $line4=join(',',$line5);        //追加
    $data2=$data2 . $line4;            //追加
    }                                //追加
}
 
//CSVファイルへ書き込み
$filename = 'data.csv';
$handle = fopen($filename , 'w');
flock($handle , LOCK_EX);
fwrite($handle , $data2);
fclose($handle);
?>