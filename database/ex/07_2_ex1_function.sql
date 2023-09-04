-- 1. 데이터 타입 변환 함수
-- 	**둘다 같은 기능을 합니다**
--  	CAST( 값 AS 데이터형식 )
-- 	CONVERT( 값, 데이터형식 )

SELECT CAST(1234 AS CHAR(4));
SELECT CONVERT(1234, CHAR(4));

-- 2. 제어 흐름 함수
-- IF( 수식, 참일때, 거짓일때) : 수식이 참 또는 거짓에 따라 결과를 분기하는 함수
SELECT IF(0 = 1,'참','거짓');
SELECT e.emp_no, IF(e.gender = 'M','남자','여자') AS gender FROM employees e;

-- IFNULL(수식1, 수식2) : 수식1이 NULL이면 수식2를 반환하고, 수식1이 NULL이 아니면 수식1를 반환한다.
SELECT IFNULL('','수식2');
-- NULL = 아예 등록되지 않은 값. 공백 = 공백, 0 = 0 

-- NULLIF(수식1,수식2) : 수식1과 수식2가 같으면 NULL을 반환하고, 다르면 수식1을 반환한다.
SELECT NULLIF(1,1);
SELECT NULLIF(1,2);