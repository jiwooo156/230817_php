<?php
// 몇개일지 모르는 숫자를 다 더해주는 함수를 만들어주세요.

function my_sum(...$num){
    $sum=0;
    foreach($num as $val){
        $sum += $val;
    }
    return $sum;
}
echo my_sum(1, 3, 4, 6);



// 숫자로 이루어진 문자열을 하나 받습니다.
// 이 문자열의 모든 숫자를 더해주세요.
// 예) "3421"일 경우, 3+4+2+1해서 10이 리턴되는 함수




?>