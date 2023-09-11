<?php
// int : 숫자
$num = 1;


// string : 문자열
$str = "sssss";


// array : 배열
$arr = [1, 2, 3];


// double : 실수
$double = 2.343;


// boolean : 논리 (참/거짓)
$bool = true;
$bool = false;


// NULL
$obj = null;


// gettype() : 변수의 타입을 리턴
// echo gettype($str);


// 형변환 : 변수 앞에 (데이터타입)$num
$num = 1;
$str1 = "1";

echo $num + $str1;  //2

echo gettype((int)$str1);  //integer





?>