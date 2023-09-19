-- INSERT INTO employees
-- VALUES (
-- 	700000
-- 	,20000101
-- 	,'first'
-- 	,'last'
-- 	,'M'
-- 	,20230919
-- 	,null
-- );
-- COMMIT;

-- SELECT * FROM titles WHERE emp_no = 700000;


-- SELECT * 
-- FROM employees emp 
-- 	LEFT JOIN titles tit
-- 	ON emp.emp_no = tit.emp_no
-- WHERE tit.emp_no IS NULL;


-- INSERT INTO titles (
-- 	emp_no
-- 	,title
-- 	,from_date
-- 	,to_date
-- )
-- VALUES (
-- 	700000
-- 	,"green"
-- 	,NOW()
-- 	,99990101
-- );
-- COMMIT;

FLUSH PRIVILEGES;



DELETE FROM titles WHERE emp_no = 700000;
