-- 1. 사원의 사원번호, 풀네임, 직책명을 출력해 주세요.
SELECT emp.emp_no, concat(emp.first_name, emp.last_name) AS full_name, tit.title 
FROM employees emp
	INNER JOIN titles tit
		ON emp.emp_no = tit.emp_no;

		
-- 2. 사원의 사원번호, 성별, 현재 월급을 출력해 주세요.
SELECT emp.emp_no, emp.gender, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
-- 	AND to_date >= NOW()
WHERE sal.to_date >= 20230905;
-- ON 아랫줄에 AND로 조건을 붙이면 JOIN에 조건을 붙여주는것임.
-- 이 조건에 맞는 애들만 조인하겠냐, 아니면 조인해놓고 조건에 맞는 애들을 출력하겠냐. 이 차이임.
-- 속도는 AND가 빠름. 조건에 맞는 데이터만 조인해주면되니까.

		
-- 3. 10010 사원의 풀네임, 과거부터 현재까지 월급 이력을 출력해 주세요.
SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE emp.emp_no = 10010;


-- 4. 사원의 사원번호, 풀네임 소속부서명을 출력해 주세요
SELECT emp.emp_no, CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, dept.dept_name
FROM employees emp
	INNER JOIN dept_emp depe
		ON emp.emp_no = depe.emp_no
		AND depe.to_date >= NOW()
	INNER JOIN departments dept
		ON depe.dept_no = dept.dept_no;


-- 5. 현재 월급의 상위 10위까지 사원의 사번, 풀네임, 월급을 출력해 주세요.
SELECT emp.emp_no, CONCAT(emp.first_name,' ',emp.last_name) AS full_name, sal.salary
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date >= NOW() 
ORDER BY sal.salary DESC 
LIMIT 10;


SELECT RNK.*
FROM(
	emp.emp_no
	, CONCAT(emp.first_name,' ',emp.last_name) AS full_name
	, sal.salary
	,RANK () OVER(ORDER BY sal.salary DESC) AS rn
FROM employees emp
	INNER JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE sal.to_date >= NOW() 
	) RNK
WHERE RNK.rn <= 10;


-- 6. 현재 각 부서의 부서장의 부서명, 풀네임, 입사일을 출력해 주세요.
SELECT dept.dept_name, CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, emp.hire_date
FROM employees emp
	INNER JOIN dept_manager man
		ON emp.emp_no = man.emp_no
	INNER JOIN departments dept
		ON man.dept_no = dept.dept_no
WHERE man.to_date >= NOW();


-- 7. 현재 직책이 "staff"인 사원의 전체 평균 월급을 출력해 주세요.
SELECT tit.title, AVG(sal.salary) AS avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND sal.to_date >= NOW
		AND tit.title = 'Staff'
GROUP BY tit.title;

-- 8. 부서장직을 역임했던 모든 사원의 풀네임과 입사일, 사번, 부서번호를 출력해 주세요.
SELECT CONCAT(emp.first_name, ' ', emp.last_name) AS full_name, emp.hire_date, emp.emp_no, depm.dept_no
FROM employees emp
	INNER JOIN dept_manager depm
		ON emp.emp_no = depm.emp_no;

		
-- 9. 현재 각 직급별 평균월급 중 60,000이상인 직급의 직급명, 평균월급(정수)를 내림차순으로 출력해 주세요.
SELECT tit.title, floor(AVG(sal.salary)) AS avg_sal
FROM titles tit
	JOIN salaries sal
		ON tit.emp_no = sal.emp_no
		AND tit.to_date >= NOW()
		AND sal.to_date >= NOW()
GROUP BY tit.title HAVING avg_sal >= 60000
ORDER BY avg_sal DESC;


-- 10. 성별이 여자인 사원들의 직급별 사원수를 출력해 주세요.
SELECT tit.title, COUNT(*)
FROM employees emp
	JOIN titles tit
		ON emp.emp_no = tit.emp_no
		AND tit.to_date >= NOW()
		AND emp.gender = 'F'
GROUP BY tit.title;


-- 11. 퇴사한 여직원의 수
SELECT emp.gender, COUNT(*)
FROM employees emp
	INNER JOIN (
			SELECT emp_no
			FROM titles t
			GROUP BY t.emp_no HAVING MAX(t.to_date) != 99990101
		) tit
		ON emp.emp_no = tit.emp_no
GROUP BY emp.gender HAVING emp.gender = 'F';

-- != 은 같지않다는 의미.