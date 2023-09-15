<?php
// 숫자 맞추기 게임

// 1. 1~100의 랜덤한 숫자를 맞추는 게임입니다.
// 2. 총 5번의 기회를 제공합니다.	  
// 3. 입력한 숫자가 정답보다 클 경우 "더 큼" 출력	    
// 4. 입력한 숫자가 정답보다 작을 경우 "더 작음" 출력    
// 5. 정답일 경우 "정답" 출력하고 게임종료			     
// 6. 5번의 기회를 다 썼을 경우 정답과 "실패"를 출력	  


$computer = rand(1,100);
$i = 0;
var_dump($computer);

while($i < 6){
	
	$user = (int)trim(fgets(STDIN));
	// if($i === 5){
	// 	echo "정답은 : {$computer} 실패";
	// 	break;
	// }
	$i++;

	if($user > $computer){
		echo "더 작음\n";
	}
	else if($user < $computer){
		echo "더 큼\n";
	}
	else if($user === $computer){
		echo "정답입니다\n";
		break;
	}

	if($i === 5){
		echo "정답은 : {$computer} 실패\n";
		break;
	}
}




?>