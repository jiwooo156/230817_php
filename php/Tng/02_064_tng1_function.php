<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.

// function my_sum(...$num){
//     $sum=0;
//     foreach($num as $val){
//         $sum += $val;
//     }
//     return $sum;
// }
// echo my_sum(1, 3, 4, 6);



// 숫자로 이루어진 문자열을 하나 받습니다.
// 이 문자열의 모든 숫자를 더해주세요.
// 예) "3421"일 경우, 3+4+2+1해서 10이 리턴되는 함수

// $str = "34215";
// function my_test(string $str){
    // $len = mb_strlen($str);
    // for($idx = 0; $idx <= $len - 1; $idx++){
    // $sum += (int)mb_substr($str, $idx, 1);
    // }

    // 문자열을 배열로 만든 후 처리하는 방법
    // $arr = str_sprit($str);
    // $sum = 0;
    // foreach($arr as $val){
    //     $sum += $val
    // }

    // php 함수 이용해서 배열의 값을 다 더하는 방법
    // return array_sum($arr);  //array_sum() : 배열안에 있는 거 다 더해줌
// }
// echo my_test($str);


// 반복문을 이용해서 아래처럼 출력해주세요.
// *
// **
// ***
// ****
// *****

// 방법1
// for($i = 0; $i <= 4; $i++){
//     for($z = 0; $z <= $i; $z++){
//         echo "*";
//     }
//     echo "\n";
// }

// 방법2
// $int_line = 1;
// $int_star = 1;
// while($int_line <= 5){
//     while($int_star <= $int_line){
//         echo "*";
//         $int_star++;
//     }
//     $int_star = 1;
//     echo"\n";
//     $int_line++; 
// }


// for($i = 1; $i <= 5; $i++){
//     for($z = 5; $z >= $i; $z--){
//         echo " ";
//     }
//     for($a = 1; $a <= $i; $a++){
//         echo "*";
//     }
//     echo "\n";
// }




?>