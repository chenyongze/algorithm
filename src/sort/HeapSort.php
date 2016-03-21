<?php
//堆排序
function heapsort(&$arr){
	// 求最后一个元素位
	$last = count($arr);
	// 堆排序中通常忽略$arr[0]
	array_unshift($arr, 0);
	// 最后一个非叶子节点
	$i = $last >> 1;
	// 整理成大顶堆,最大的数整到堆顶,并将最大数和堆尾交换,并在之后的计算中忽略数组后端的最大数(last),直到堆顶(last=堆顶)
	while(true){
		adjustnode($i, $last, $arr);
		if($i > 1){
			// 移动节点指针,遍历所有非叶子节点
			$i --;
		}else{
			// 临界点last=1,既所有排序完成
			if($last == 1)
				break;
				// 当i为1时表示每一次的堆整理都将得到最大数(堆顶,$arr[1]),重复在根节点调整堆
			swap($arr[$last], $arr[1]);
			// 在数组尾部按大小顺序保留最大数,定义临界点last,以免整理堆时重新打乱数组后面已排序好的元素
			$last --;
		}
	}
	// 弹出第一个数组元素
	array_shift($arr);
}

// 整理当前树节点($n),临界点$last之后为已排序好的元素
function adjustnode($n, $last, &$arr){
	$l = $n << 1; // $n的左孩子位
	if(! isset($arr[$l]) || $l > $last)
		return;
	$r = $l + 1; // $n的右孩子位
	             // 如果右孩子比左孩子大,则让父节点的右孩子比
	if($r <= $last && $arr[$r] > $arr[$l])
		$l = $r;
		// 如果其中子节点$l比父节点$n大,则与父节点$n交换
	if($arr[$l] > $arr[$n]){
		// 子节点($l)的值与父节点($n)的值交换
		swap($arr[$l], $arr[$n]);
		// 交换后父节点($n)的值($arr[$n])可能还小于原子节点($l)的子节点的值,所以还需对原子节点($l)的子节点进行调整,用递归实现
		adjustnode($l, $last, $arr);
	}
}

// 交换两个值
function swap(&$a, &$b){
	$a = $a ^ $b;
	$b = $a ^ $b;
	$a = $a ^ $b;
}