<?php

//快排：将数组的元素跟第一个元素比较，每次小的做左边，大的放右边，递归多次，汇总得出
function quick_sort($arr){
	global $sort_total_num;
	if(count($arr) < 1){
		return $arr;
	}
	
	$key = $arr[0];//每次跟数组的第一个元素比较
	$left_arr = array();
	$right_arr = array();
	
	for($i = 1; $i < count($arr); $i ++){
		if($arr[$i] <= $key){//小的放左边，大的右边，从小到大排序
			$left_arr[] = $arr[$i];
		}else{
			$right_arr[] = $arr[$i];
		}
		
		$sort_total_num++;
	}
	
	$left_arr = quick_sort($left_arr);
	$right_arr = quick_sort($right_arr);
	return array_merge($left_arr, array($key), $right_arr);
}


//$array = array(11, -3, 51, -7, 9, 100, 2, -56, 32, 21);

//正向排序极端情况：
$array = array(-56,  -7,  -3,  2, 9,  11,  21,  32,  51, 100);

//逆向排序极端情况：
$array = array(100, 51, 32, 21, 11, 9, 2, -3, -7, -56);

//部分是正确排序的情况：
$array = array(-7, -3, -56, 2, 9,  11,  21,  32,  51, 100);


static $sort_total_num = 0;
$srot_arr = quick_sort($array);
foreach($srot_arr as $value){
	echo $value . '&nbsp ';
}
echo "总共比较了：".$sort_total_num."次<br>";