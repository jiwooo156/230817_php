<?php

// 구구단 1~9단을 반복문을 이용해서 작성해 주세요.
// 1단
// 1 X 1 = 1
// ...
// 2단
// 2 X 1 = 2
// ...
// 9단

for($dan = 1; $dan <= 9; $dan++){
    echo "{$dan}단\n";
    for($z = 1; $z <= 9; $z++){
        $mul = $dan * $z;
        echo "{$dan} X {$z} = {$mul}\n";
    }
}



// 1~9단 중 2~8단 제외하고 1단,9단만 출력
// for($i = 1; $i <= 9; $i++){
//     if($i >= 2 && $i <= 8){
//         continue;
//     }
//     echo "{$i}단\n";
//     for($z = 1; $z <= 9; $z++){
//         $mul = $i * $z;
//         echo "{$i} X {$z} = {$mul}\n";
//     }
// }

// 1~9단 중 짝수단 제외하고 출력 (홀수만 뜨게 함)
// for($i = 1; $i <= 9; $i++){
//     if($i % 2 === 0){
//         continue;
//     }
//     echo "{$i}단\n";
//     for($z = 1; $z <= 9; $z++){
//         $mul = $i * $z;
//         echo "{$i} X {$z} = {$mul}\n";
//     }
// }

for($dan = 1; $dan <= 2000; $dan++){
    if($dan % 2 === 0){
        continue;
    }
    echo "{$dan}단\n";
    for($i = 1; $i <= 9; $i++){
        $mul = $dan * $i;
        echo "{$dan} X {$i} = {$mul}\n";
    }
}


?>