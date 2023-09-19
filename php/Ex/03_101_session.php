<?php

// session : 데이터를 웹서버에 저장, 쿠키보다 보안성과 속도가 좋다. (그래도 민감정보는 데이터베이스에 저장해두고 씀)
// *** 주의사항 ***
// 개인정보, 민감한 정보들은 되도록 저장하지 말아야한다.

//  session 시작
session_name("green");				//특정 세션명으로 시작하려면 이름 정의?해줘야됨
session_start();
$_SESSION["green"] = "PHP";
$_SESSION["green2"] = "JAVA";

// unset($_SESSION["green"]);		// 특정 세션 삭제

session_destroy();				// 모든 세션 삭제 (웹서버에서 삭제가 됨)

print_r($_SESSION);






?>