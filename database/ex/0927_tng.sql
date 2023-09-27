-- 1. 직책테이블의 모든 정보를 조회해주세요.
SELECT * FROM titles;

-- 2. 급여가 60,000 이하인 사원의 사번을 조회해 주세요.
SELECT emp_no, salary FROM salaries WHERE salary <= 60000;

-- 3. 급여가 60,000에서 70,000인 사원의 사번을 조회해 주세요.
SELECT emp_no, salary FROM salaries WHERE salary >= 60000 AND salary <= 70000;

-- 4. 사원번호가 10001, 10005인 사원의 모든 정보를 조회해 주세요
-- SELECT * FROM employees WHERE emp_no = "10001" OR emp_no = "10005";

-- SELECT emp.emp_no, sal.salary, tit.title, dp.dept_name 
-- FROM (SELECT emp_no FROM employees WHERE emp_no = 10001 OR emp_no = 10005)
-- JOIN dept_emp dept
-- ON dept.emp_no = emp.emp_no
-- JOIN departments dp
-- ON dept.dept_no = dp.dept_no
-- JOIN salaries sal
-- ON sal.emp_no = emp.emp_no
-- AND to_date = NOW()
-- JOIN titles tit
-- ON tit.emp_no = emp.emp_no
-- AND to_date = NOW();

SELECT 
	emp.*
	,dmp.dept_no
	,dept.dept_name
	,tit.title
	,sal.salary
FROM employees emp
	JOIN dept_emp dmp
		ON emp.emp_no = dmp.emp_no 
		AND dmp.to_date >= NOW()
	JOIN departments dept
		ON dmp.dept_no = dept.dept_no
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
		AND sal.to_date >= NOW()
WHERE 
	emp.emp_no = 10001 OR emp.emp_no = 10005
;

-- 5. 직급명에 "Engineer"가 포함된 사원의 사번과 직급을 조회해 주세요.
-- SELECT emp_no, title FROM titles WHERE title = "Engineer";

SELECT 
	emp.emp_no
	,tit.title
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
WHERE tit.title LIKE '%Engineer%'
	AND to_date >= NOW();

-- 6. 사원 이름을 오름차순으로 정렬해서 조회해 주세요.
SELECT concat(first_name, last_name) AS name FROM employees ORDER BY name ASC;

-- 7. 사원별 급여의 평균을 조회해 주세요.
SELECT emp_no, ceil(AVG(salary)) avgsal FROM salaries GROUP BY emp_no;

-- 8. 사원별 급여의 평균이 30,000 ~ 50,000인 사원번호와 평균급여를 조회해 주세요.
SELECT emp_no, AVG(salary) 
FROM salaries 
GROUP BY emp_no 
	HAVING AVG(salary) >= 30000 
	AND AVG(salary) <= 50000;

-- 9. 사원별 급여 평균이 70,000이상인 사원의 사번, 이름, 성, 성별을 조회해 주세요.
SELECT emp.emp_no, CONCAT(emp.first_name," ",emp.last_name), emp.gender, sal.avgsal
FROM employees emp
	JOIN (SELECT 
				emp_no, ceil(AVG(salary)) AS avgsal 
			FROM salaries 
			GROUP BY emp_no 
			HAVING AVG(salary) >= 70000) sal
	ON emp.emp_no = sal.emp_no;
	
SELECT 
	emp.emp_no
	, emp.first_name
	, emp.last_name
	, emp.gender
	, ceil(AVG(sal.salary))
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
GROUP BY sal.emp_no 
HAVING ceil(AVG(sal.salary)) >= 70000;


-- 10. 현재 직책이 "Senior Engineer"인, 사원의 사원번호와 성을 조회해 주세요.
SELECT emp.emp_no, emp.last_name, tit.title
FROM employees emp 
	JOIN titles tit 
	ON emp.emp_no = tit.emp_no 
WHERE tit.title = "Senior Engineer";
