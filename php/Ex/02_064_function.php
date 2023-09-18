<?php

// 두 숫자를 받아서 더해주는 함수를 만들어봅시다.
// 리턴이 없는 함수
// function my_sum($a, $b){
//     echo $a + $b;
// }

// my_sum(5, 4);  //호출해서 쓸수있다

// 리턴이 있는 함수
// function my_sum2($a, $b) {
//     return $a + $b;
// }
// $result = my_sum2(1, 2);
// echo $result;


// 두 수를 받아서 - * / %를 리턴하는 함수를 만들어 주세요.
// function my_sub($a, $b){
//     return $a - $b;
// }
// $result = my_sub(5, 9);
// echo $result;

// function my_mul($a, $b){
//     return $a * $b;
// }
// $result = my_mul(5, 9);
// echo $result;

// function my_div($a, $b){
//     return $a / $b;
// }
// $result = my_div(5, 9);
// echo $result;

// function my_rem($a, $b){
//     return $a % $b;
// }
// $result = my_rem(5, 9);
// echo $result;
// 파라미터들은 함수내에서만 사용되기때문에 중복을 피하기 위해서 굳이 다른이름으로 설정할 필요 없음


// 파라미터의 기본값이 설정되어 있는 함수
// function my_sum3($a, $b = 5){
//     return $a + $b;
//     // 기본값을 설정해줄 파라미터는 뒤쪽에 적는다. 그리고 여러개 올 수 있다.
// }
// echo my_sum3(3);
// // 두번째 아규먼트를 안주면 설정되어 있는 기본값이 대입돼서 답은 8 나옴.
// echo my_sum3(3,1); 
// 두번째 아규먼트의 기본값 말고 따로 설정해주면 설정값으로 계산함. 답은 4 나옴.

// php-5.5 이하에서 사용방법
// function my_args_param() {
//     $items = func_get_args();
//     print_r($items);
// }

// echo "\n";
// // 가변 파라미터
// // php-5.6 이상 가능
// function my_args_param(...$items){
//     //echo $items[1]; // b
//     return $items[1]; 
// }

// echo my_args_param("a", "b", "c", "d", "g");


// 재귀 함수 (내가 나를 호출하는 함수)
// 1 + 2 + 3 + ... + 자기자신
// function my_ap($i){
//     $sum = 0;
//     for($i; $i > 0; $i--){
//         $sum += $i;
//     }
//     return $sum;
// }
// echo my_ap(10000);


// function my_recursion($i){
//     if($i === 0){
//         return $sum;
//     }
//     return $i + my_recursion($i - 1);
// }
// echo my_recursion(3);



// 레퍼런스 파라미터
function test1( $str ) {
    $str = "함수 test1";
    return $str;
}
function test2( &$str ) {       // 레퍼런스 파라미터 = 주소값을 보내줌?
    $str = "함수 test2";
    return $str;
}

// $str = "???";       // 함수는 호출해야 실행되므로 얘가 먼저 실행됨.
// $result = test1( $str );    //함수의 $str을 대입 // ???
// echo $str, "\n";            //main의 $str을 출력
// echo $result;               //함수의 $str.  // 함수test1

$string = "???";                   // 함수에 &$str과 메인의 $string이 같은애임. 그래서 함수에서 새로운 값을 대입해주면 main의 변수에도 대입이됨.
$result = test2( $string );    
echo $string, "\n";          
echo $result; 


?>
