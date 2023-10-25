<?php
define("ROOT", $_SERVER["DOCUMENT_ROOT"]."/1105/src/"); // 루트 상수 선언
require_once(ROOT."lib/lib.php");

$conn = null;
// DB 연동
try {
   if(!my_db_conn($conn)) {
    throw new Exception("DB Error : PDO Instance");
    }; 
    
} catch(Exception $e) {
    header("Location: /1105/src/error.php/?err_msg={$e->getMessage()}");
    exit;
} finally {
    db_destroy_conn($conn); // DB 파기
}




?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/1105/src/css/common.css">
    <title>리스트페이지</title>
</head>
<body>
    
</body>
</html>