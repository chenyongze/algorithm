<?php

//冒泡排序（改进）思路分析：法如其名，就是像冒泡一样，每次从数组当中 冒一个最大的数出来。 
function bubble_sort($array){
	$sort_total_num = 0;
	//该层循环控制 需要冒泡的轮数
	for($i = 1; $i < count($array); $i ++){

		$flag = false;
		for($j = 0; $j < count($array) - $i; $j ++){//循环比较第n次，排好倒数第n个位置
			if($array[$j] > $array[$j + 1]){//和相邻的元素比较，从小到大排序
				$temp = $array[$j];
				$array[$j] = $array[$j + 1];
				$array[$j + 1] = $temp;
				$flag = true;//如果交换过位置,flag=true
			}
			$sort_total_num++;
		}
		
		if(! $flag){//如果有比较过程中，根本没有交换过位置, 说明现在所有元素位置都是正确的,已经是排好序的，就不需要再比较了
			break;
		}
	}

	echo "总共比较了：".$sort_total_num."次<br>";
	return $array;
}

$array = array(11, - 3, 51, -7, 9, 100, 2, -56, 32, 21);

//正向排序极端情况：
$array = array(-56,  -7,  -3,  2, 9,  11,  21,  32,  51, 100);

//逆向排序极端情况：
$array = array(100, 51, 32, 21, 11, 9, 2, -3, -7, -56);

//部分是正确排序的情况： 
//$array = array(-7, -3, -56, 2, 9,  11,  21,  32,  51, 100);

$srot_arr = bubble_sort($array);
foreach($srot_arr as $value){
	echo $value . '&nbsp ';
}