-- 1. 사원 정보테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500525
	,20160825
	,'JIWOO'
	,'JEONG'
	,'F'
	,20200101
);

-- 2. 월급, 직책, 소속부서 테이블에 각자의 정보를 적절하게 넣어주세요.
INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500525
	,100000000
	,20200101
	,99990101
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)

VALUES (
	500525
	,'CEO'
	,20200101
	,99990101
);

SELECT * FROM titles WHERE emp_no = 500525;


INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)

VALUES (
	500525
	,'d001'
	,20200101
	,99990101
);

-- 3. 짝꿍의 [1,2]것도 넣어주세요.
INSERT INTO employees (
	emp_no
	,birth_date
	,first_name
	,last_name
	,gender
	,hire_date
)
VALUES (
	500326
	,19990326
	,'minjoo'
	,'Kim'
	,'F'
	,20240202
);

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500326
	,100000
	,20240202
	,99990101
);

INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)

VALUES (
	500326
	,'Engineer'
	,20240101
	,99990101
);

INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)

VALUES (
	500326
	,'d005'
	,20240101
	,99990101
);

SELECT * FROM titles WHERE emp_no = 500326;

-- 4. 나와 짝꿍의 소속부서를 d009로 변경해 주세요.
-- UPDATE dept_emp
-- SET dept_no = 'd009'
-- WHERE emp_no = 500525
-- 	OR emp_no = 500326;
-- 
-- SELECT * FROM dept_emp WHERE emp_no = 500525;	

UPDATE dept_emp
SET to_date = NOW()
WHERE emp_no = 500525 AND dept_no = 'd001'
-- (to_date를 오늘 날짜로 update해줌)

INSERT INTO dept_emp
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500525
	,'d009'
	,NOW()
	,99990101
);
-- (update로 바꾸면 이력이 남지 않으니 insert로 추가해줌)

-- 5. 짝꿍의 모든 정보를 삭제해 주세요.
DELETE FROM employees
WHERE emp_no = 500326;
-- (dept_emp에서 삭제해줄려면 pk가 2개이므로 where에 둘다 해줘야됨)

-- 6. 'd009'부서의 관리자를 나로 변경해 주세요.
UPDATE dept_manager 
SET to_date = 20230907
WHERE emp_no = 111939;

INSERT INTO  dept_manager (
 	dept_no
	,emp_no
	,from_date
	,to_date 
)
VALUES (
	'd009'
	,500525
	,20230907
	,99990101
);

SELECT * FROM dept_emp WHERE dept_no = 'd009';

-- 7. 오늘 날짜부로 나의 직책을 'Senior Engineer'로 변경해 주세요.
UPDATE titles
SET title = 'Senior Engineer'
WHERE emp_no = 500525;

UPDATE titles
SET from_date = 20230907
WHERE emp_no = 500525;

SELECT * FROM titles WHERE emp_no = 500525;

-- 8. 최고 연봉 사원과 최저 연봉 사원의 사번과 이름을 출력해 주세요.
SELECT emp.emp_no, emp.first_name, sal.salary
FROM employees emp
	JOIN salaries sal
		ON emp.emp_no = sal.emp_no
WHERE
		sal.salary = (SELECT min(salary) FROM salaries)
		OR 
		sal.salary = (SELECT max(salary) FROM salaries)
;

CREATE INDEX idx_test ON salaries(salary);

-- 9. 전체 사원의  평균 연봉을 출력해 주세요.
SELECT AVG(salary) FROM salaries;

-- 10. 사번이 499975인 사원의 지금까지 평균 연봉을 출력해 주세요.
SELECT emp_no, AVG (salary) 
FROM salaries 
WHERE emp_no = 499975;