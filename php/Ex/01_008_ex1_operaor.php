<?php
// 1. 산술연산자
echo "더하기 : 1 + 1 = ", 1 + 1,"\n";
// (에코에 나열하려면 ,로 끊어줘야함.)
echo "빼기 : 1 - 1 = ", 1 - 1;
echo "곱하기 : 2 x 3 = ", 2 * 3;
echo "나누기 : 2 ÷ 3 = ", 2 / 3;
echo 10 - 5 * 8 / 10;
echo "나머지 : 2 % 3 = ", 2 % 3;



// 2. 증가/감소 연산자 (증감 연산자)
$num1 = 8;
$num1++;
echo $num1;
$num1--;
echo $num1;
--$num1;
echo $num1;



// 3. 산술 대입 연산자 (줄여서 쓰고싶어서 씀)
$num = 5;
$num = $num + 2;
$num += 2;
$num -= 2;
$num *= 2;
$num /= 2;
$num = 5;
$num %= 6;

echo $num;

// 산술 연산자를 이용해서 계산해주세요 (각각의 과정을 출력해 주세요)
$tng_num = 10;
// $tng_num에 10을 더해주세요
echo $tng_num += 10;
// $tng_num에 5로 나눠주세요
echo $tng_num /= 5;
// $tng_num에 4를 빼주세요
echo $tng_num -= 4;
// $tng_num에 7로 나눈 나머지를 구해주세요
echo $tng_num %= 7;
// $tng_num에 3을 곱해주세요
echo $tng_num *= 3;



// 4. 비교 연산자
$num = 1;
$str = '1';
var_dump( 1 > 0 );
var_dump( 1 < 0 );
var_dump( 1 <= 0 );
var_dump( 1 >= 0 );
// (개발상에서만 씀. 모든 정보를 표시하기 때문에)

var_dump($num == $str); // 값의 형태만 비교 (불완전비교)
var_dump($num === $str); // 값의 데이터 타입까지 비교 (완전비교)
var_dump($num != $str); // 값의 형태만 비교 (불완전비교)
var_dump($num !== $str); // 값의 데이터 타입까지 비교 (완전비교)
// (되도록이면 완전비교를 사용)



// 5. 논리 연산자
//  and 연산자
var_dump( 1 === 1 && 2 === 2 );
var_dump( 1 === 1 && 2 === 1 );

// or 연산자
var_dump( 1 === 1 || 2 === 2 );
var_dump( 1 === 1 || 2 === 1 );
var_dump( 1 === 2 || 2 === 1 );

// not 연산자
var_dump( !( 1 === 1 ) );
// (연산의 결과를 반대로 뒤집음.)


?>