<?php
// 별만들기
$i = 1;
while($i < 6) {
	$j = 1;
	$z = 0;
	while($j < 6 - $i ){
		echo " ";
		$j++;
	}
	while($z < 6 - $j){
		echo "*";
		$z++;
	}
	$i++;
	echo "\n";
}

// 구구단 1~9단까지

$i = 1;

while($i <= 9){
	$j = 1;
	
	echo "{$i}단\n";
	
	while($j <= 9){
		$goo = $j * $i;
		echo "{$i} * {$j} = {$goo}\n";	
		$j++;
	}
	$i++;
}
?>