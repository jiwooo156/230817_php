-- 1. 스토어드 함수 (stored Function)란?
-- 	- 개발자가 필요에 따라 직접 만들어서 사용하는 함수

-- 2. 스토어드 함수의 특징
-- 	- 스토어드 프로 시저와 달리 파라미터에 IN,OUT 등이 사용 불가
-- 	- 파라미터는 모두 입력 파라미터로 사용
-- 	- RETURN문으로 반환 할 값의 데이터 

-- 3. 스토어드 함수 조회
SHOW FUNCTION STATUS;

-- 4. 스토어드 함수 생성
-- DELIMITER $$
-- CREATE FUNCTION my_sum(num INT, num INT)
-- 	RETURN INT
-- BEGIN
-- 	RETURN num1 + num2;
-- END $$
-- DELIMITER ;
-- 
DELIMITER $$
CREATE FUNCTION my_sum(num1 INT, num2 INT)
	RETURNS INT
BEGIN
	RETURN num1 + num2;
END $$
DELIMITER ;


-- 5. 스토어드 함수 실행
SELECT my_sum(1,2);

-- 6. 스토어드 함수 삭제
DROP FUNCTION my_sum;