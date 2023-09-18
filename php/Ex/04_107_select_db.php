<?php
// ***********************
// 파일명	: 04_107_fnc_db_connect.php
// 기능		: DB 연동 관련 함수
// 버전		: v001  new Jeong .jw 230918
// 			  v002 dbconn 설정 변경 Jeong.jw 230918
// ***********************

// 함수명	 : my_db_conn
// 기능		 : DB Connect
// 파라미터	 : PDO	&$conn
// 리턴		 : 없음


require_once("./04_107_fnc_db_connect.php");
$conn = null;

my_db_conn($conn);


// SQL 작성
$sql = "SELECT * FROM employees WHERE emp_no = :emp_no";

// Prepared Statement 셋팅
$arr_ps = [
	":emp_no" => 10004
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();

print_r($result);

db_destroy_conn($conn);

?>