<?php

echo "rr";
// 처리를 종료하고 출력을 하겠다는 의미. ( 그래서 종료 아니면 return 사용함. )



// php 데이터 타입
// 변수에 저장을 해서 사용함.
$num = 1;           // int
$str = "abc";       // string (문자열)
$arr = [1,2,3];     // array (배열)
$boo = true;        // boolean (참/거짓)
$double = 2.34;     // double (소수)


// 산술 연산자 
1 + 1;
1 - 1;
1 * 1;
1 / 1;
1 % 1;

// 증가/증감 연산자
1++ ;
1-- ;

$num = 1;
echo $num++;    // 1
echo ++$num;    // 2
// ;은 실행단위임. 전위는 단위를 종료하기 전에 더하는것. 후위는 단위를 종료하고 더하는 것.


// 산술 대입 연산자
$num = 1;
$num = $num + 2;    // 3
$num += 2;          // 3
// 둘은 같은 계산임. 단지 줄여썼을 뿐.


// 비교 연산자
1 === "1";    // false (타입까지 완전히 일치해야됨)
1 == "1";     // true


// 논리 연산자
//  &&
//  ||
//  !

if(!(1 === 1)){
    echo "참참참";
}


// () : 최소 연산단위, 조건
// [] : 배열 만들 때
// {} : 연산의 집합 ( 내가 처리하고 싶은 연산들의 집합 )
// ; : 최소 연산 단위 ( 해당 처리를 종료하겠다는 의미 )

// if( $조건 ){
//     // 처리할 내용
// }

// for( $시작값; $종료조건; $루프마다_얼마증가){
//     //처리할 내용
// }

// while($조건){
//     //처리할 내용
// }


// if문 이용 : 90이면 수, 80이면 우, 그 외는 "노력"

$i = 90;

if( $i === 90 ){
    echo "수";
}
else if( $i === 80 ){
    echo "우";
}
else {
    echo "노력";
}

// while문 이용 : 구구단 7단
// 방법1
$dan = 1;
while ( $dan <= 9 ) {
    $mul = 7 * $dan;
    echo "7 X {$dan} = {$mul}\n";
    $dan++;
}

// 방법2
while(true){
    $mul = 7 * $dan;
    echo "7 X {$dan} = {$mul}\n";
    $dan++;
    if($dan === 10){
        break;
    }
}
// while 조건에 true를 주면 무한루프 되기때문에 break 걸어줘야함.



// 배열(array) 
$arr = [1, 2, 3];

$arr2 = [
    "key" => "val1"
    ,"key2" => "val2"
];

echo $arr[2]."\n";
echo $arr2["key2"];
// 연상배열에서 key값은 항상 문자열.
$arr3 = [
    "key1"=>"val1"
    ,"key2"=>[
        "key3"=>"val3"
        ,"key4"=>"val4"
    ]
];
echo $arr3["key2"],["key4"];
print_r($arr2["key2"]);
var_dump($arr2["key2"]);

foreach($arr2["key2"] as $key => $val){
    echo "{$key} : {$val}\n";
}







?>