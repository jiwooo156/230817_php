<?php

// include : 해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지하지 않습니다.
include("./02_070_include2.php");
// 불러올 때 에러나도 그냥 다음꺼 실행함


// require : 해당 파일을 불러옵니다. 오류 발생 시 프로그램을 정지합니다.
require("./02_070_include2.php");
// 불러올 때 에러나면 종료시킴


include_once("./02_070_include2.php");
require_once("./02_070_include2.php");
// include/require을 중복으로 써도 한번만 불러옴.

echo "include 111\n";



?>