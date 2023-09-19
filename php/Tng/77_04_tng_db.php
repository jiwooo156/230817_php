<?php




// 3. DB에 저장될 것

// 1. titles 테이블에 데이터가 없는 사원을 검색
function db_conn( &$result ){
	$db_host = "localhost";  
	$db_user = "root";  
	$db_pw = "php504";  
	$db_name = "employees";  
	$db_charset = "utf8mb4";  
	$db_dns = "mysql:host=".$db_host.";dbname=".$db_name.";chartset=".$db_charset;   

	$db_options = [
		PDO::ATTR_EMULATE_PREPARES 		=> false					
		,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION
		,PDO::ATTR_DEFAULT_FETCH_MODE  	=> PDO::FETCH_ASSOC
	];
	$result = new PDO($db_dns, $db_user, $db_pw, $db_options);
}

$conn = null;
db_conn($conn);


$sql =
" SELECT "
."		emp.* " 
." FROM "
."		employees emp " 
."	LEFT JOIN "
."		titles tit "
."	ON "
."		emp.emp_no = tit.emp_no "
." WHERE "
."		tit.title IS NULL"
;

$stmt = $conn->prepare($sql);	
$stmt->execute();
$result = $stmt->fetchAll();
var_dump($result);


// 2. [1]번에 해당하는 사원의 직책정보를 insert
// 	2-1. 직책은 "green", 시작일은 현재시간, 종료일은 99990101
foreach($result as $key => $val)
	{
		$emp_no = $val["emp_no"];
		$sql = " INSERT INTO titles ( "
	."		emp_no " 
	."		,title "
	."		,from_date "
	."		,to_date "
	." 		) "
	." VALUES ( "
	."		:emp_no "
	."		,:title "
	."		,NOW() "
	."		,:to_date "
	." 		) ";

	$arr_ps = [
		":emp_no" => $emp_no
		,":title" => "green"
		,":to_date" => 99990101
	];

	$stmt = $conn -> prepare($sql);
	$result = $stmt -> execute($arr_ps);
	$result = $stmt -> fetchAll(); 
	$conn -> commit();
	print_r($result);
	}

	



?>