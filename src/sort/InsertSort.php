<?php
//插入排序思路：将要排序的元素插入到已经 假定排序号的数组的指定位置。 
function insert_sort($array){
	for($i = 1; $i < count($array); $i ++){//从第二个元素开始排序，从小到大排序
		$insertVal = $array[$i];
		$insertIndex = $i - 1;
		while($insertIndex >= 0 && $insertVal < $array[$insertIndex]){
			//依次和前面已经排好序的元素进行比较，比这个元素小就把元素后移，一旦比元素大就完成排序，放好该元素的位置了
			$array[$insertIndex + 1] = $array[$insertIndex];
			$insertIndex --;
		}
		$array[$insertIndex + 1] = $insertVal;
	}
	
	return $array;
}


$array = array(11, -3, 51, -7, 9, 100, 2, -56, 32, 21);

//正向排序极端情况：
//$array = array(-56,  -7,  -3,  2, 9,  11,  21,  32,  51, 100);

//逆向排序极端情况：
//$array = array(100, 51, 32, 21, 11, 9, 2, -3, -7, -56);

//部分是正确排序的情况：
//$array = array(-7, -3, -56, 2, 9,  11,  21,  32,  51, 100);

$srot_arr = insert_sort($array);
foreach($srot_arr as $value){
	echo $value . '&nbsp ';
}

