<?php


// $in_str = fgets(STDIN);

// $result = "입력값 : {$in_str}";


// $user = fgets(STDIN);

// $a = ["a", "b", "c"];
// $b = array_rand($a);
// $c = $a[$b];

// $result = $c;

// $randNum = rand(1, 3);
// $gawibawibo = '';

// switch ($randNum) {
//   case 1:
//     $gawibawibo = '가위';
//     break;
//   case 2:
//     $gawibawibo = '바위';
//     break;
//   case 3:
//     $gawibawibo = '보';
//     break;
//   default:
//     $gawibawibo = '';
//     break;
// }

// $result = "컴퓨터의 선택은 : {$gawibawibo}";




// 가위:0, 바위:1, 보:2
$computer = mt_rand(0, 2); // 컴퓨터 가위바위보 획득
$user = 0; // 유저입력값(숫자로 변환)

// 유저 입력값 숫자로 변환

$input = strtoupper( trim(fgets(STDIN)) );
$echo = "입력값 : {$input}";

if( $input === "S" ) {
	$user = 0;
} else if( $input === "R" ) {
	$user = 1;
} else {
	$user = 2;
}
var_dump($input);


// 무승부: 0,  승: 1,  패: 2 
if ( $computer === 0 ){
	if( $user === 0 ){
		$result = 0;
	}
	else if( $user === 1 ){
		$result = 2;
	}
	else{
		$result = 1;
	}
}
else if( $computer === 1 ){
	if( $user === 0 ){
		$result = 1;
	}
	else if( $user === 1){
		$result = 0;
	}
	else{
		$result = 2;
	}
}
else {
	if( $user === 0 ){
		$result = 2;
	}
	else if( $user === 1 ){
		$result = 1;
	}
	else {
		$result = 0;
	}
}
$result_str = "";
switch($result){
	case 0;
	$result_str = "무승부";
	break;
}
switch($result){
	case 1;
	$result_str = "승";
	break;
}
switch($result){
	case 2;
	$result_str = "패";
	break;
}

printf($result_str);

?>