<?php
// PDO클래스를 이용해서 아래 쿼리를 실행해 주세요.




// 4. 자신의 정보를 삭제해 주세요.

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

// $obj_conn = new PDO($db_dns, $db_user, $db_pw, $db_options);

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
."		,hire_date ) "
." VALUES( "
."		:emp_no " 
."		,:birth_date " 
."		,:first_name " 
."		,:last_name " 
."		,:gender " 
."		,:hire_date ) ";

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





// 3. 자신의 정보를 출력해 주세요.
// $sql = SELECT * FROM employees AS emp WHERE emp.emp_no = :emp_no;









?>