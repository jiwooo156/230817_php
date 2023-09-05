-- 0. JOIN이란?
--  두개 이상의 테이블을 묶어서 하나의 결과 집합으로 출력하는 것입니다.

-- 1. INNER JOIN의 구조 (공통된 부분만 가져옴)
-- 	SELECT 컬럼1, 컬럼2
-- 	FROM 테이블1 INNER JOIN 테이블2
-- 		ON 조인 조건
-- 	[WHERE 검색조건]
-- (필수적으로 알아야함 완전 중요!!)
SELECT 
	emp.emp_no
	,emp.first_name
	, emp.last_name
	, dp.dept_no
FROM employees AS emp
	INNER JOIN dept_emp AS dp
		ON emp.emp_no = dp.emp_no
		AND dp.to_date >= NOW();
-- on은 join의 조건을 설정할때 씀. where가 쓰였다면, join에 쓰인게 아니고 전체로 쓰인것.
-- on에서 pk 끼리 부등호(=)로 엮어줌.

-- 2. OUTER JOIN
--  -기준이 디는 테이블의 레코드는 조인의 조건에 만족되지 않아도 출력
-- SELECT 컬럼1, 컬럼2...
-- FROM 테이블1
-- 	[ LEFT | RIGHT ] OUTER JOIN 테이블2
-- 		ON 조인 조건
-- WHERE 검색조건;
-- (통계 낼때 씀)
SELECT emp.emp_no, emp.first_name, dm.dept_no
FROM employees emp
	LEFT OUTER JOIN dept_manager dm
		ON emp.emp_no = dm.emp_no
		AND dm.to_date >= NOW()
WHERE emp.emp_no >= 110000;



-- 3. UNION / UNION ALL :
-- 	- 두 쿼리의 결과를 합칩니다.
-- 	- UNION은 중복 값을 제거하고 출력하고, UNION ALL은 중복값도 출력합니다.
-- SELECT ... FROM ...
-- UNION
-- SELECT ... FROM ...
-- UNION ALL
-- SELECT ... FROM ...
-- (잘 사용하지 않음)
SELECT * FROM employees WHERE emp_no = 100001 OR emp_no = 10005
UNION 
SELECT * FROM employees WHERE emp_no = 10005;



-- 4. SELF JOIN : 자기 자신을 조인
-- SELECT 컬럼1, 컬럼2 ...
-- FROM 테이블1
-- 	INNER JOIN 테이블1
-- WHERE 검색조건;

-- 슈퍼바이저인 사원의 모든 정보를 출력해 주세요.
SELECT emp2.*
FROM employees emp1
	INNER JOIN employees emp2
		ON emp1.sup_no = emp2.emp_no;

ALTER TABLE employees ADD COLUMN sup_no INT(11);


