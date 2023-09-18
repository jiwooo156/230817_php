<?php
// try-catch문 : 예외처리를 하기위한 문법

require_once("./04_107_fnc_db_connect.php");

$conn = null;


try{ 
	// 우리가 실행하고 싶은 소스코드를 작성
	my_db_conn($conn);
	$sql = "SELECT * FROM employees WHERE emp_no = :emp_no";
	$arr_ps = [
		":emp_no" => 10004
	];
	$stmt = $conn->prepare($sql);
	$stmt->execute($arr_ps);
	$result = $stmt->fetchAll();
	print_r($result);
	db_destroy_conn($conn);
} catch( Exception $e ){
	// 예외가 발생 했을 때 실행되는 소스코드를 작성
	echo "예외 발생 : {$e->getMessage()}";
} finally {
	// 정상처리 또는 예외처리에 관계없이 무조건 실행되는 소스코드를 작성
	// db 파기
	db_destroy_conn($conn);
	echo "파이널리";
}


?>