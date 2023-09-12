<?php

// foreach : 배열의 길이만큼 루프하는 문법
// $arr = [1,2,3];
// echo count($arr);        //3 (= 배열의 길이)
// echo count($arr) - 1;    //2 (= 배열의 길이 -1 = 인덱스 번호)

// for($i = 0; $i <= count($arr) - 1; $i++){
//     echo $arr[$i];
// }

$arr2 = [
    "현희" => "불고기"
    ,"호철" => "김치"
    ,"휘야" => "못정함"
];

foreach($arr2 as $key => $val){
    echo "{$key} : {$val}\n";
}
    // foreach(루프하고싶은 배열, 해당 키, 값){}

    
// foreach($arr2 as $val){
//     echo "{$val}\n";
// }
    // key값 필요없으면 생략할 수 도 있음. (value를 생략할순없음)





?>