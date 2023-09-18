<?php

$db_host = "localhost";  // host (ip)
$db_user = "root";  // user
$db_pw = "php504";  // password
$db_name = "employees";  // DB name
$db_charset = "utf8mb4";  // charset
$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";chartset=".$db_charset;   // 바뀔 수 있는 부분을 변수로

$db_options = [
	// DB의 Prepared Statement 기능을 사용하도록 설정
	PDO::ATTR_EMULATE_PREPARES 		=> false					// static 변수라서 instance(클래스 생성) 안해줘도 클래스 사용가능
	// PDO Exception을 Throws하도록 설정
	,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
	// 연상배열로 Fetch를 하도록 설정
	,PDO::ATTR_DEFAULT_FETCH_MODE  	=> PDO::FETCH_ASSOC
];

// PDO Class로 DB 연동
$obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);


// 10004번 사원테이블의 사원정보를 출력해주세요. // SQL 작성
// $sql = " SELECT "
// 	." * "
// 	."	FROM "
// 	."		EMPLOYEES "
// 	."	WHERE "
// 	."		emp_no = :emp_no "  // 매직넘버, ?, :컬럼명 셋 중 하나로 작성하면 됨
// 	;		// 가독성, 유지보수를 위해서 세로로 작성하기도함.(공백 잘 넣어줘야됨)

// Prepared Statement 셋팅 
// $arr_ps = [
// 	":emp_no" => 10004
// ];

// Prepared Statement 생성
// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps);		// 쿼리 실행
// $result = $stmt->fetchAll(); 	// 쿼리 결과를 fetch
// print_r($result);


// SELECT 예제
// 사번 10001, 10002의 현재 연봉과 사번, 생일을 가져오는 쿼리를 작성해서 출력해주세요.
// $sql = " SELECT "
// ."		sal.salary, emp.emp_no, emp.birth_date "
// ." FROM employees AS emp "
// ."	JOIN salaries AS sal "
// ."	 ON emp.emp_no = sal.emp_no "
// ."WHERE "
// ."		sal.to_date >= NOW() "
// ." AND ( "
// ."		emp.emp_no = :emp_no1 "
// ."		OR emp.emp_no = :emp_no2 "
// ."  ) ";

// $arr_ps = [
// 	":emp_no1" => 10001
// 	,":emp_no2" => 10002
// ];

// $stmt = $obj_conn->prepare($sql);
// $stmt->execute($arr_ps);
// $result = $stmt->fetchAll(); 
// print_r($result);





// insert 
// 부서번호가 'd010', 부서명이 'php504'인 데이터 insert하기
// $sql =
// " INSERT INTO departments( "
// ."		 dept_no "
// ." 		, dept_name "
// ." ) "
// ." VALUES( "
// ."		:dept_no "
// ."		, :dept_name "
// ." ) ";

$arr_ps = [
	":dept_no" => "d010"
    , ":dept_name" => "php504"
];

// $stmt = $obj_conn->prepare($sql);
// $result = $stmt->execute($arr_ps);
// $obj_conn->commit();  //커밋 메소드
// var_dump($result);
// $obj_conn = null;  // pdo클래스가 담긴 건데 내용 다 비워줌. (DB 파기) (하고나면 new PDO 다시 해줘야댐)





// delete
// 부서번호가 'd010', 부서명이 'php504'인 데이터 delete 하기
$sql = 
" DELETE FROM " 
." departments "
." WHERE "
." dept_no = :dept_no ";

$arr_ps = [
	":dept_no" => "d010"
];

$stmt = $obj_conn->prepare($sql);
$result = $stmt->execute($arr_ps);

$res_cnt = $stmt->rowCount();		// 영향받은 행이 몇개인지 확인
if($res_cnt >= 2){					// 영향받은 행이 2개 이상이면 롤백.
	$obj_conn->rollBack();
} else {
	$obj_conn->commit();
}


// // if( !$result ){
// // 	$obj_conn->rollback();	//롤백
// // } else {
// 	$obj_conn->commit();	//커밋
// // }
$obj_conn = null;		// DB 파기



?>