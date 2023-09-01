-- SELECT [컬럼명] FROM [테이블명];
SELECT * FROM employees;
SELECT * FROM dept_emp;

-- 
SELECT first_name, last_name FROM employees;
SELECT emp_no, title FROM titles;

-- select [컬럼명] from [테이블명] where [쿼리조건];
-- [쿼리조건] : 컬럼명 [기호] 조건값
SELECT * from employees WHERE emp_no = 10009;
-- 회원번호가 10009번인 정보만 가져옴. (where절=where문=조건절)
SELECT * FROM employees WHERE emp_no >= 10009;
-- 회원번호가 10009번 보다 큰 회원의 정보만 가져옴.
SELECT * FROM employees WHERE first_name = 'Mary';
SELECT * FROM employees WHERE birth_date < 19600101;

-- and 연산자 
SELECT * 
FROM employees 
WHERE birth_date <= 19700101 
  AND birth_date >= 19650101;
-- 길어지면 이렇게 절마다 끊어줄수도있다.
SELECT * FROM employees WHERE first_name = 'Mary' AND last_name = 'piazza';
SELECT * FROM employees WHERE first_name = 'mary' OR last_name = 'piazza';

--
SELECT * FROM employees WHERE emp_no >= 10005 AND emp_no <= 10010;
SELECT * FROM employees WHERE emp_no BETWEEN 10005 and 10010;
-- 두 줄 모두 같은말임. 근데 between절이 더 느리다. 연산자를 쓰는게 더 빠름.

-- 회원번호가 10005 또는 10010인 회원 찾기
SELECT * FROM employees WHERE emp_no = 10005 OR emp_no = 10010;
SELECT * FROM employees WHERE emp_no IN(10005,10010);
-- 두 줄 모두 같은 말. 근데 in이 더 느리다.

-- 이름이 Ge로 시작하는 사람 찾기
SELECT * FROM employees WHERE first_name LIKE('Ge%'); 
-- 이름이 Ge로 끝나는 사람 찾기
SELECT * FROM employees WHERE first_name LIKE('%Ge');
-- 이름에 Ge가 들어가는 사람 찾기
SELECT * FROM employees WHERE first_name LIKE('%Ge%');
-- title에 staff가 들어가는 사람 찾기
SELECT * FROM titles WHERE title LIKE('%staff%');

-- Ge앞에 두글자가 있는 회원 찾기
SELECT * FROM employees WHERE first_name LIKE('__ge_');

-- ORDER BY로 정렬하여 조회
SELECT * FROM employees ORDER BY birth_date ASC;
-- birth_date 기준으로 오름차순 정렬
selelct * FROM employees ORDER BY birth_date DESC;
-- birth_date 기준으로 내림차순 정렬


-- birth_date 오름차순으로 정렬하고, birth_date가 같은사람은 다시 first_name을 알파벳 순으로 정렬함.
SELECT * FROM employees ORDER BY birth_date, first_name;
SELECT * FROM employees ORDER BY birth_date, first_name, last_name;


-- 성을 내림차순으로 정렬하고, 이름을 오름차순으로 정렬하고, 생일을 오름차순으로 정렬하기
SELECT * FROM employees ORDER BY last_name DESC, first_name, birth_DATE;

-- DISTINCT로 중복되는 레코드 없이 조회하기
SELECT DISTINCT emp_no FROM salaries;
SELECT DISTINCT emp_no, salary FROM salaries WHERE emp_no = 10001;
-- 레코드단위에서 중복을 거르는 것이므로, emp_no랑 salary를 따로 보는게 아니라 묶어서 레코드 중복만 걸러냄.

INSERT INTO salaries VALUES (10001, 60117, 19860627, 19870626);
COMMIT;

-- 집계 함수 (DBMS마다 조금씩 다름.)(데이터의 합계, 평균 등을 구하는 기능)
-- 함수 : 미리 만들어 놓은 기능
SELECT SUM(salary) FROM salaries;
-- 현재 받고있는 급여만 조회하기
SELECT * FROM salaries WHERE to_date = 99990101;
SELECT * FROM salaries WHERE to_date >= 20230901;
-- 둘다 같은의미임. 현재날짜보다만 크면 됨.
-- sum(합계), min(최솟값), max(최댓값), avg(평균) 
SELECT SUM(salary) FROM salaries WHERE to_date >= 20230901;
SELECT MAX(salary) FROM salaries WHERE to_date >= 20230901;
SELECT MIN(salary) FROM salaries WHERE to_date >= 20230901;
SELECT AVG(salary) FROM salaries WHERE to_date >= 20230901;
-- 사원수 구하기
SELECT COUNT(*) FROM employees;
-- 이름이 Mary인 사람의 수를 구해라
SELECT COUNT(*) FROM employees WHERE first_name = 'mary';

-- 그룹으로 묶어서 조회 : GROUP BY 컬럼명 [HAVING 집계함수조건]
SELECT title, COUNT(title) FROM titles GROUP BY title;
SELECT COUNT(*) FROM titles WHERE title = 'assistant engineer';
-- having : 그룹을 어떤 조건으로 묶을지를 나타낸다.
SELECT title, COUNT(title) FROM titles GROUP BY title HAVING title = 'staff';
-- having에는 group by로 묶은 그룹만만 사용할 수 있다.
-- 현재 재직중인 직원들의 직급별 수를 구해라
SELECT title, COUNT(title) FROM titles WHERE to_date >= 20230901 GROUP BY title;
SELECT title, COUNT(title) FROM titles GROUP BY title HAVING title LIKE('%staff%');

-- 원래 컬럼명과 달라지면 속성명에 AS를 사용하여 별칭을 줄 수 있음.(column 뒤에 적으면됨.)
SELECT title, COUNT(title) AS cnt FROM titles WHERE to_date >= 20230901 GROUP BY title;


-- CONCAT() : 문자열을 합쳐주는 함수
SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM employees;

-- 여자사원의 사번, 생일, 풀네임을 출력해라
SELECT 
	emp_no, 
	birth_date, 
	CONCAT(first_name, ' ', last_name) AS full_name 
FROM employees 
WHERE gender = 'f' 
ORDER BY full_name;

-- LIMIT으로 출력개수를 제한하여 조회
-- LIMIT n : n 개만큼 출력
-- LIMIT n OFFSET n : n번째부터 n개만큼 출력
SELECT * FROM employees ORDER BY emp_no LIMIT 10;
SELECT * FROM employees ORDER BY emp_no LIMIT 10 OFFSET 10;
-- 재직중인 사원들 중 급여가 상위 5위까지 출력해라
SELECT * FROM salaries where to_date >= 20230901 ORDER BY salary desc LIMIT 5;


-- 서브쿼리(SubQuery) : 쿼리 안에 또다른 쿼리가 있는 형태
-- d002 부서의 현재 매니저의 정보을 가져오고 싶다.
SELECT * FROM employees
WHERE emp_no = (SELECT emp_no FROM dept_manager WHERE to_date >= 20230901 AND dept_no = 'd002');
-- 현재 급여가 가장 높은 사원의 사번과 풀네임을 출력해 주세요.
SELECT emp_no FROM salaries ORDER BY salary LIMIT 1;
SELECT emp_no, CONCAT(first_name, ' ', last_name) AS full_name FROM employees WHERE emp_no = (SELECT emp_no FROM salaries WHERE to_date >= 20230901 ORDER BY salary desc LIMIT 1);

-- 서브쿼리의 결과가 복수일 때 사용방법
-- d001 부서에 속한적이 있는 사원의 사번과 풀네임을 출력
SELECT 
  emp_no, 
  CONCAT(first_name, ' ', last_name) AS full_name 
FROM employees 
WHERE emp_no IN (
	SELECT emp_no 
	FROM dept_manager 
	WHERE dept_no = 'd001'
);

-- 현재 직책이 Senior Engineer인 사원의 사번과 생일을 출력해라
SELECT emp_no, birth_date FROM employees WHERE emp_no IN (SELECT emp_no FROM titles WHERE title = 'Senior Engineer' AND to_date >= 20230901);


-- 다중열 서브쿼리
-- 현재 부서장인 사람의 소속부서테이블의 모든 정보를 출력해주세요.
SELECT * FROM dept_emp WHERE (dept_no, emp_no) IN (SELECT dept_no, emp_no FROM dept_manager WHERE to_date >= NOW());


-- SELECT절에 사용하는 서브쿼리
-- 사원의 현재 급여, 현재급여를 받기 시작한 일자,풀네임을 출력해라
SELECT 
	sal.salary, sal.from_date, (
	SELECT CONCAT(emp.first_name, ' ',emp.last_name)
	FROM employees AS emp 
	WHERE sal.emp_no = emp.emp_no 
	) 
	AS full_name
	FROM salaries AS sal 
	WHERE to_date >= NOW();


-- FROM절에 오는 서브쿼리
SELECT emp.* FROM (SELECT * FROM employees WHERE gender = 'M') AS emp;
