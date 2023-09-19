<?php

try 
{
	// 예외상황이 발생 할 만한 소스코드 (우리가 처리하고 싶은 소스코드)
	echo "Try 실행\n";
	throw new Exception("강제 예외 발생");		// Exception("에러메세지")
	echo "Try 종료";
} 
catch( Exception $e ) 
{
	// $e라는 변수(파라미터)에 Exception을 담는 것. Exception = type힌트. 
	// 예외상황 발생 시 실행 (rollback 등등의 동작)
	echo "Catch 실행\n";
	echo $e->getMessage(),"\n";				// $e가 Exception을 받아온거니까 Exception에 있는 메세지를 띄움 : 에러메세지 출력하는 방법
} 
finally 
{
	// 정상이든, 예외발생이든 무조건 실행 (데이터베이스 닫기 등 과 같은 무조건 해야하는 동작)
	echo "Finally 실행\n";
}



?>