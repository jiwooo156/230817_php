<?php
// PDO클래스를 이용해서 아래 쿼리를 실행해 주세요.
// 5. PDO 클래스 사용법 숙지

// $db_host = "localhost"; 
// $db_user = "root";  
// $db_pw = "php504";  
// $db_name = "employees";  
// $db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";chartset=".$db_charset;   

// $db_options = [
// 	PDO::ATTR_EMULATE_PREPARES 		=> false
// 	,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
// 	,PDO::ATTR_DEFAULT_FETCH_MODE  	=> PDO::FETCH_ASSOC
// ];

// $conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

require_once("../ex/04_107_fnc_db_connect.php");

$conn = null;
my_db_conn($conn);

// 1. 자신의 사원 정보를 employees테이블에 등록해 주세요.
$sql =
" INSERT INTO employees ( "
."		emp_no "
."		,birth_date "
."		,first_name "
."		,last_name "
."		,gender "
."		,hire_date "
." ) "
." VALUES( "
."		:emp_no " 
."		,:birth_date " 
."		,:first_name " 
."		,:last_name " 
."		,:gender " 
."		,:hire_date "
." ) ";

$arr_ps = [
	":emp_no" => 500005
	,":birth_date" => 20200101
	,":first_name" => 'JIWOO'
	,":last_name" => 'JEONG'
	,":gender" => 'F'
	,":hire_date" => 20230101
];
$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$conn->commit(); 
var_dump($result);
$conn = null; 




// 2. 자신의 이름을 "둘리", 성을 "호이"로 변경해주세요.
$conn = null;			//1.에서 마지막에 초기화를 해줬지만 다시 해줌. 원래 보통 파일 시작할때 해줌
my_db_conn($conn);

$sql =
" UPDATE employees "
." SET "
."		 first_name = :first_name "
."		 ,last_name = :last_name "
." WHERE "
."		 emp_no = :emp_no ";

$arr_ps = [
	":first_name" => 'dooly'
	,":last_name" => 'hoi'
	,":emp_no" => 500005
];

$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$conn->commit(); 
var_dump($result);
$conn = null; 



// 3. 자신의 정보를 출력해 주세요.
$conn = null; 
my_db_conn($conn);

$sql = 
" SELECT "
."		* "
." FROM "
."		employees AS emp "
." WHERE "
."		emp.emp_no = :emp_no ";

$arr_ps = [
	":emp_no" => 500005
];

$stmt = $conn->prepare($sql);
$stmt->execute($arr_ps);
$result = $stmt->fetchAll();		//execute한 것을 연상배열로 패치해줌. 그리고 return해준다.
print_r($result);

// 4. 자신의 정보 삭제
$conn = null; 
my_db_conn($conn);

$sql =
" DELETE FROM employees "
." WHERE emp_no = :emp_no ";

$arr_ps = [
	":emp_no" => 500005
];

$stmt = $conn->prepare($sql);
$result = $stmt->execute($arr_ps);
$res_cnt = $stmt->rowCount();	
if($res_cnt >= 2){					
	$conn->rollBack();
} else {
	$conn->commit();
}





?>