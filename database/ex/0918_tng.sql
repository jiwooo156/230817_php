-- 부서번호가 'D010', 부서명이 'PHP504'데이터 INSERT

-- SELECT * FROM departments;
-- -- 
-- FLUSH PRIVILEGES;  -- DBMS를 재시작없이 변경한 설정을 적용하는 명령어


-- DELETE FROM departments WHERE dept_no = 'd010';



-- SELECT * FROM employees WHERE emp_no = 500005;
-- 
-- FLUSH PRIVILEGES;

SELECT 
	emp.emp_no 
	,sal.salary 
	,
FROM 
	employees AS emp 
	JOIN salaries AS sal 
	ON emp.emp_no = sal.emp_no 
	AND to_date >= NOW()
WHERE sal.salary >= 80000;
