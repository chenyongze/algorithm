<?php
//希尔排序
function shell_sort($arr){
	$n = count($arr);
	for($gap = floor($n / 2); $gap > 0; $gap = floor($gap /= 2)){
		for($i = $gap; $i < $n; ++ $i){
			for($j = $i - $gap; $j >= 0 && $arr[$j + $gap] < $arr[$j]; $j -= $gap){
				$temp = $arr[$j];
				$arr[$j] = $arr[$j + $gap];
				$arr[$j + $gap] = $temp;
			}
		}
	}
	
	return $arr;
}


//$array = array(11, -3, 51, -7, 9, 100, 2, -56, 32, 21);

//正向排序极端情况：
$array = array(-56,  -7,  -3,  2, 9,  11,  21,  32,  51, 100);

//逆向排序极端情况：
$array = array(100, 51, 32, 21, 11, 9, 2, -3, -7, -56);

//部分是正确排序的情况：
$array = array(-7, -3, -56, 2, 9,  11,  21,  32,  51, 100);


$sort_total_num = 0;
$srot_arr = shell_sort($array);
foreach($srot_arr as $value){
	echo $value . '&nbsp ';
}
echo "总共比较了：".$sort_total_num."次<br>";