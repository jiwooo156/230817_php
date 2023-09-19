<?php

// . db_conn 이라는 함수를 만들어주세요.
// 		1 - 1. 기능 : db설정 및 pdo객체  생성
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



// 2. 현재 급여가 80,000이상인 사원을 조회하기
$conn = null;
db_conn($conn);

$sql =
" SELECT "
."		emp_no "
."		,salary "
." FROM "
."		salaries"
." WHERE "
."		to_date >= NOW() "
."  AND salary >= :salary "
; 

$arr_ps = [
	":salary" => 80000 
];
$stmt = $conn->prepare($sql);	// 쿼리를 실행하기 위한 준비. conn이라는 클래스에 prepare메소드를 실행해서 sql 세팅을 해둠.
$stmt->execute($arr_ps);		// execute 메소드로 실행함 (데이터베이스에서 데이터를 우리한테 보내줌)
$result = $stmt->fetchAll();	// 저장해 둔 데이터( 메소드를 실행한 클래스 )를 보기 쉽게 연상배열로 패치해줌. (원래 값은 연상배열 형태가 아님.)
print_r($result);				// 패치한 $result를 출력함 (연상배열로 출력됨)


// 3. 조회한 데이터를 루프하면서 급여가 100,000이상인 사원 번호 출력해주세요.
// 2.에서 이미 데이터베이스에서 데이터를 가져왔음. 가져온 데이터에서 추가로 설정한 조건을 충족하는 데이터를 출력하고싶은것임.
// 연상배열 형태로 만들어준 $result 배열에서 원하는 값을 가져오는 foreach문을 만들줌. 
foreach($result as $item) {
	// key 필요없어서 안넣어줫음
	if( $item["salary"] >= 100000 ) {
		echo $item["emp_no"]."\n";
	}
}


?>