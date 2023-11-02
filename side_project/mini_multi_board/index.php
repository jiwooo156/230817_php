<?php
// 닫는 태그 안적고 작성함. 닫는부분이 애매하기 때문에 잘못 닫았다가는 에러날 수 있음
// echo "멀티보드 인덱스: ".$_GET["url"];

require_once("config.php"); // 설정파일 불러오기
require_once("autoload.php");  // 오토로드 파일 불러오기



// 라우터 호출 (클래스 호출)
new router\Router();








