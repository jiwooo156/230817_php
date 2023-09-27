-- 1. 짝궁의 인적사항을 사원테이블에 삽입해주세요.
INSERT INTO employees 
VALUES (
	800000
	, 20011206
	,'Minkyeong'
	,'Park'
	,'F'
	, NOW()
	, NULL
);

SELECT * FROM employees WHERE emp_no = 800000;

-- 2. 1번에서 삽입한 짝궁의 월급을 삽입해주세요.
INSERT INTO salaries
VALUES (
	800000
	,2000000
	,20230927
	,99990101
);

SELECT * FROM salaries WHERE emp_no = 800000;

-- 3. 이름이 'Sachin'인 사람의 성별을 'F', 생일을 1970-01-01로 변경해주세요.
UPDATE 
	employees
SET 
	birth_date = 19700101
	,gender = 'F'
WHERE first_name = 'Sachin';

SELECT * FROM employees WHERE first_name = 'Sachin';

-- 4. 짝궁의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = 800000;

SELECT * FROM employees WHERE emp_no = 800000;
