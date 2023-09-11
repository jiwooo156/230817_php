<?php
// IF로 만들어주세요.
// 성적
//  범위 : 
//      이상 ~ 미만
//      100    : A+
//      90이상 100미만 : A
//      80이상 90미만  : {$grade}
//      70이상 80미만  : C
//      60이상 70미만  : D
//      60미만         : F

// 출력 문구 : "당신의 점수는 XXX점 입니다. <등급>"

// 0~100 입력 받았을 때, "당신의 점수는 XXX점 입니다. <등급>" 라고 출력하고,
// 그 외의 값일 경우 "잘못된 값을 입력 했습니다." 라고 출력해 주세요.

$num = -1000;
$grade = "";
$answer = "당신의 점수는 %u점 입니다. <%s>";
// $answer로 선언해놓고 맨 밑에 sprintf로 출력함.





// 방법1
// if( $num >= 0 && $num <= 100 ){
//     else if( $num === 100 ){
//         $grade = "A+";
//     }
//     else if( $num >= 90 ){
//     /* else if로 작성하면 이미 if문과 묶여있는거기때문에 다른 조건 안주고 >= 90만 줘도 
//     90이상 100미만으로 인식함 */
//         $grade = "A";
//     }
//     else if( $num >= 80 ){
//         $grade = "B";
//     }
//     else if ( $num >= 70 ){
//         $grade = "C";
//     }
//     else if ( $num >= 60 ){
//         $grade = "D";
//     }
//     else { 
//         $grade = "F"; 
//     }
    
//     // echo "당신의 점수는 {$num}점 입니다. <{$grade}>";
    
//     $str = sprintf($answer, $num, $grade);
//     echo $str;
//     // echo문 말고 $str 설정해서 sprintf로 출력해줘도됨.
// }
// else {
//     echo "잘못된 값을 입력 했습니다.";
// }



// 방법2
if( $num === 100 ){
    $grade = "A+";
}
else if( $num >= 90 ){
    $grade = "A";
}
else if( $num >= 80 ){
    $grade = "B";
}
else if ( $num >= 70 ){
    $grade = "C";
}
else if ( $num >= 60 ){
    $grade = "D";
}
else { 
    $grade = "F"; 
}

if( $num >= 0 && $num <= 100){
    $str = sprintf($answer, $num, $grade);
    echo $str;
}
else{
    "잘못된 값을 입력했습니다.";
}

// 따로 if문을 줘서 조건을 줌. 그룹은 따로 묶었지만 변수가 같아서 먹히는 듯.
?>