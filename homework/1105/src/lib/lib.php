<?php
// ---------------------------------
// 함수명   : my_db_conn
// 기능     : DB Connect
// 파라미터 : PDO   &$conn
// 리턴     : boolen
// ---------------------------------
function my_db_conn( &$conn ) {
	$db_host	= "localhost"; // host
	$db_user	= "root"; // user id
	$db_pw		= "php504"; // password
	$db_name	= "mini_board"; // DB name
	$db_charset	= "utf8mb4"; // charset
	$db_dns		= "mysql:host=".$db_host.";dbname=".$db_name.";charset=".$db_charset;

	try {
		$db_options	= [
			PDO::ATTR_EMULATE_PREPARES		=> false
			,PDO::ATTR_ERRMODE				=> PDO::ERRMODE_EXCEPTION 
			,PDO::ATTR_DEFAULT_FETCH_MODE	=> PDO::FETCH_ASSOC
		];

		// PDO Class로 DB 연동
		$conn = new PDO($db_dns, $db_user, $db_pw, $db_options);
		return true;
	} catch (Exception $e) {
		$conn = null; // DB 파기
		return false;
	}
}


?>