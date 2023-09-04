-- INSERT
-- INSERT INTO 테이블명 [(속성1, 속성2)]
-- 	[]는 생략이 가능하다는 의미임.
-- VALUES (속성값1, 속성값2)

-- 500000 신규회원데이터 추가하기
INSERT INTO employees (
	emp_no 
	,birth_date
	,first_name 
	,last_name 
	,gender 
	,hire_date
)
VALUES (
	500000
	,NOW()
	,'Meerkat'
	,'Green'
	,'M'
	,NOW()
);

SELECT * FROM employees WHERE emp_no = 500000;

--  500000번 사원의 급여 데이터를 삽입해 주세요.

INSERT INTO salaries (
	emp_no
	,salary
	,from_date
	,to_date
)
VALUES (
	500000
	,500000
	,20000101
	,99990101
);

SELECT * FROM salaries WHERE emp_no = 500000;
SELECT MAX(salary) FROM salaries;

-- 500000번 사원의 소속 부서 데이터를 삽입해 주세요.
INSERT INTO dept_emp (
	emp_no
	,dept_no
	,from_date
	,to_date
)
VALUES (
	500000
	,'d001'
	,20000101
	,99990101
);

SELECT * FROM dept_emp WHERE;

-- 500000번 사원의 직책 데이터를 삽입해 주세요.
INSERT INTO titles (
	emp_no
	,title
	,from_date
	,to_date
)
VALUES (
	500000
	,'ceo'
	,20000101
	,99990101
);
ROLLBACK;
-- 마지막으로 저장된것으로 다시 돌아감.

SHOW VARIABLES LIKE 'autocommit%';
-- autocommit의 상황을 알려줌. off = autocommit 꺼져있는거. = 일일히 수동저장해야됨.
SELECT * FROM titles WHERE emp_no = 500000;