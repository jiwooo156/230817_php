<?php

// $i = 1;
// while( $i <= 9 ){
//     echo "{$i}단\n";
//     for($dan = 1; $dan <= 9; $dan++){
//         $mul = $i*$dan;
//         echo "{$i} X {$dan} = {$mul}\n";
//     }
//     $i++;
// }



// 1. 반복문을 이용하여 숫자를 1~10까지 출력해주세요.
// $i = 1;
// while($i < 11){
//     echo $i;
//     $i++;
// }





// 2. 구구단 1~8단을 출력해 주세요.
// while($i <= 8){
//     for($dan = 1; $dan <= 9; $dan++){
//         $mul = $i * $dan;
//         echo "{$i} X {$dan} = {$mul}\n";
//     }
//     $i++;
// }





// 3. 19단을 출력해 주세요.
// while($dan <= 9){
//     $mul = 19 * $dan;
//     echo "19 X {$dan} = {$mul}\n";
//     $dan++;
// }





// 4. 두 숫자를 더해주는 함수를 만들어 주세요.
// function sum($num1,$num2){
//     $sum = $num1 + $num2;
//     echo $sum;
// }
// sum(77, 15);





// 5. 짜장면이면 중식, 비빔밥이면 한식, 그 외는 양식으로 출력해 주세요.

// $food = "짜장면";
// $food_arr = ["짜장면", "마라탕", "탕후루", "탕수육", "짬뽕"];
// foreach($food_arr as $all)
// {
//     if($food === $all)
//     {
//         $val = $all;
//     }

//     if( $food === $val ){
//         echo "중식";
//     }
//     else if($food === "비빔밥"){
//         echo "한식";
//     }
//     else{
//         echo "양식";
//     }
// }

$food = "리조또";
$food_arr = ["짜장면", "마라탕", "탕후루", "탕수육", "짬뽕"];


// if(in_array($food, $food_arr)){
//     echo "중식";
// }
// else if(in_array($food, $food_arr1)){
//     echo "한식";
// }
// else{
//     echo "양식";
// }
    
// switch ( $food ) {
//     case "파스타":
//       echo "양식";
//       break;
//     case "짜장면":
//       echo "중식";
//       break;
//     default:
//         echo "그 외";
//         break;
//   }

// 짜장면 = 중식. 으로 하는게 아니라 조건 여러개 주고싶으면 배열로 줌. 배열에서 value 하나하나씩 꺼내쓰려고 in_array함수 사용.
    if(in_array($food, $food_arr)){
        echo "중식";
    }
    else if(in_array($food, $food_arr1)){
        echo "한식";
    }
    else{
        echo "양식";
    }

?>