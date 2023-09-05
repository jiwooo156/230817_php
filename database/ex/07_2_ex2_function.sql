-- CASE ~ WHEN ~ ELSE ~ END : 다중 분기를 위해 사용합니다.
-- 예) CASE 체크하려는 수식1
-- 		WHEN 분기수식1 THEN 결과1  
--  		WHEN 분기수식2 THEN 결과2 
--  		WHEN 분기수식3 THEN 결과3
-- 		ELSE 결과4
-- 	END

SELECT e.emp_no
	,e.gender
	,CASE e.gender
		WHEN 'M' THEN '남자'
		ELSE '여자'
	END AS ko_gender
FROM employees AS e;

SELECT * FROM titles ORDER BY EMP_NO DESC;

UPDATE titles
SET to_date = NULL
WHERE emp_no = 500000;
SELECT * FROM titles ORDER BY emp_no DESC;
COMMIT;

-- 직책 테이블의 모든 정보를 출력해 주세요
-- 단, to_date가 NULL 또는 9999-01-01인 경우는 '현재직책'
-- 그 외는 '지금은아님'

SELECT 
	* 
	,CASE tit.to_date 
		WHEN 'NULL' THEN '현재직책' 
		WHEN 99990101 THEN '현재직책' 
		ELSE '지금은 아님' 
	END as to_date2 
FROM titles AS tit;

SELECT 
	* 
	,case DATE(IFNULL(to_date, 99990101)) 
		when 99990101 then '현재직책' 
		ELSE '지금은 아님' 
	END AS ko_to_date 
FROM titles 
ORDER BY emp_no DESC;


SELECT * FROM titles WHERE to_date IS not NULL;
-- NULL은 아예 존재하지 않는 값이기 때문에 부등호(=)를 쓰지않고 is / is not을 쓴다.





-- 3. 문자열 함수
-- CONCAT(문자열1, 문자열2, ...) : 문자열을 이어줍니다.
SELECT CONCAT('안녕','하세요');
-- CONCAT_WS(구분자, 문자열1, 문자열2, ...) : 문자열 사이에 구분자를 넣어 이어줍니다.
SELECT CONCAT_WS('/','딸기','바나나','토마토','수박');
-- FORMAT(숫자,소숫점 자릿수) : 숫자에 3자리마다 ','를 넣어주고, 소수점 자릿수까지 표현합니다.
SELECT FORMAT(123456,2);
-- LEFT(문자열, 길이) : 문자열을 왼쪽부터 길이만큼 잘라 반환합니다.
SELECT LEFT ('1234567',3);
-- RIGHT(문자열, 길이) : 문자열을 오른쪽부터 길이만큼 잘라 반환합니다.
SELECT RIGHT ('1234567',3);
-- UPPER(문자열) : 소문자를 대문자로 변경합니다.
SELECT UPPER('abcd');
-- LOWER(문자열) : 대문자를 소문자로 변경합니다.
SELECT LOWER('ABCD');
-- LPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 왼쪽에 넣어서 채운다.
SELECT LPAD('1', 10, '0');
-- RPAD(문자열, 길이, 채울 문자열) : 문자열을 포함해 길이만큼 채울 문자열을 오른쪽에 넣어서 채운다.
SELECT RPAD('1',10 ,'0');
-- TRIM(문자열) : 좌우 공백을 제거합니다.
SELECT ' 1234 ', TRIM(' 1234 ');
-- LTRIM(문자열) : 왼쪽 공백을 제거합니다.
SELECT LTRIM(' 1234 ');
-- RTRIM(문자열) : 오른쪽 공백을 제거합니다.
SELECT RTRIM(' 1234 ');
-- TRIM(방향 문자열1 FROM 문자열2) : 방향을 지정해 문자열2에서 문자열1을 제거합니다.
-- 		** 방향을 LEADING(좌),BOTH(좌우),TRAILING(우)
SELECT TRIM(LEADING 'abc' FROM 'abcdefg');
-- SUBSTRING(문자열, 시작위치, 길이) : 문자열을 시작위치에서 길이만큼 잘라서 반환합니다.
SELECT SUBSTRING('abcdef', 3, 2);
-- SUBSTRING_INDEX(문자열, 구분자, 횟수) : 왼쪽부터 구분자가 횟수 번째가 나오면 그 이후는 잘라낸다.
SELECT SUBSTRING_INDEX('ab.cd.ef.gh', '.', 2);



-- 4. 수학함수
-- CEILING(숫자) : 올림합니다.
SELECT CEILING(1.4);
-- FLOOR(숫자) : 버림합니다.
SELECT FLOOR(1.9);
-- ROUND(숫자) : 반올림합니다.
SELECT ROUND(1.5), ROUND(1.4);
-- TRUNCATE(숫자, 정수) : 소수점 기준으로 정수만큼만 구하고 나머지는 버립니다.
SELECT TRUNCATE(1.11, 1);



-- 5. 날짜 및 시간 함수
-- NOW() : 현재 날짜/시간을 구합니다. (YYYY-MM-DD HH:MM:DD)
SELECT NOW(), DATE(NOW()), DATE(99990101);
-- ADDDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 더한 날짜를 구합니다. (양수:더하기, 음수:빼기)
SELECT ADDDATE(99990101, INTERVAL 1 MONTH);
-- SUBDATE(날짜1, INTERVAL 날짜2) : 날짜1에서 날짜2를 뺀 날짜를 구합니다. (양수:빼기, 음수:더하기)
SELECT SUBDATE(99990101, INTERVAL 1 DAY);
-- ADDTIME(날짜/시간, 시간) : 날짜/시간에서 시간을 더한 날짜/시간을 구합니다.
SELECT ADDTIME(20230101000000, '-01:00:00');
-- SUBTIME(날짜/시간, 시간) : 날짜/시간에서 시간을 뺀 날짜/시간을 구합니다.
SELECT SUBTIME(20230101000000,'01:00:00');

SELECT DATE(SUBDATE(NOW(), INTERVAL 1 YEAR));



-- 6. 순위함수
-- RANK() OVER(ORDER BY 속성명 DESC/ASC) : 순위를 매깁니다.
SELECT emp_no, salary, RANK() OVER(ORDER BY salary DESC) AS RANK FROM salaries LIMIT 10;
-- ROW_NUMBER() OVER(ORDER BY 속성명 DESC/ASC) : 레코드에 순위를 매깁니다.
SELECT emp_no, salary, ROW_NUMBER() OVER(ORDER BY salary DESC) AS num FROM salaries LIMIT 10;
-- 속도가 느림. 주의해서 사용해야함.