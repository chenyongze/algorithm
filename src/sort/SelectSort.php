<?php

//选择排序：每次选择一个相应的元素，然后将其放到指定的位置 
function select_sort($array){
	$sort_total_num = 0;
	//实现思路 双重循环完成，外层控制轮数，当前的最小值。内层 控制的比较次数
	for($i = 0; $i < count($array) - 1; $i ++){
		for($j = $i + 1; $j < count($array); $j ++){//每次循环找出第n个位置的正确元素
			if($array[$j] < $array[$i]){//从小到大排序
				$temp = $array[$i];
				$array[$i] = $array[$j];
				$array[$j] = $temp;
			}
			
			$sort_total_num++;
		}
	}
	
	echo "总共比较了：".$sort_total_num."次<br>";
	return $array;
}


$array = array(11, -3, 51, -7, 9, 100, 2, -56, 32, 21);

//正向排序极端情况：
//$array = array(-56,  -7,  -3,  2, 9,  11,  21,  32,  51, 100);

//逆向排序极端情况：
//$array = array(100, 51, 32, 21, 11, 9, 2, -3, -7, -56);

//部分是正确排序的情况：
//$array = array(-7, -3, -56, 2, 9,  11,  21,  32,  51, 100);

$srot_arr = select_sort($array);
foreach($srot_arr as $value){
	echo $value . '&nbsp ';
}