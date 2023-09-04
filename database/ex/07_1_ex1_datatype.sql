-- 숫자 데이터 형식
-- INT : 4byte 정수, 범위 +21억~-21억
-- BIGINT : 8byte 정수, 범위 +900경~-900경
-- FLOAT : 4byte 실수, 소수점 아래 7자리까지 표현
-- DOUBLE : 8byte 실수, 소수점 아래 15자리까지 표현
-- (float, double의 경우 소수점 아래는 정확하지 않기 때문에 소수점 아래 날리고 정수만 남기기도함.)
-- DECIMAL : 5~15byte, 소수점 아래 자리를 지정가능
-- 	예)	decimal(6, 2) = 9999.99 (근데 정확하지 않기때문에 잘 안씀)

-- a (1byte)
-- 1 (1byte)
-- 가(3~4byte = 2byte이상 = 멀티바이트)

-- 문자 데이터 형식
-- CHAR(n) : 1~255byte, n만큼 고정길이를 가지는 문자형
-- VARCHAR(n) : 1~65535byte, n만큼 가변길이를 가지는 문자형
-- LONGTEXT : 최대 4Gb, text 데이터 값을 저장함.
-- LONGBLOB : 최대 4Gb, blob 데이터 값을 저장함. (blob : 사진,동영상 등을 나타내는 데이터)
-- ENUM(값1, 값2, 값3...) : 정해진 값만 입력 가능하도록 하는 데이터 형식 (데이터 무결성) (속도가 느림)

-- 날짜 및 시간 데이터 형식
-- DATE : 3byte, 'YYYY-MM-DD' 1001-01-01부터  9999-12-31까지 날짜 저장됨. 
-- DATETIME : 8byte, 'YYYY-MM-DD hh:mi:ss', 1001-01-01 00:00:00부터  9999-12-31 23:59:59까지 날짜와 시간 저장됨.
-- TIMESTAMP : 4byte, 'YYYY-MM-DD hh:mi:ss', 1001-01-01 00:00:00부터  9999-12-31 23:59:59까지 날짜와 시간 저장됨.
--  ** 주의 **
-- DATETIME : 서버 시간에 상관없이 고정되는 타입 (우리나라 or 아시아에서만 서비스 할 때 사용)
-- TIMESTAMP : 서버 시간에 따라 유동적으로 변하는 타입 (전세계적으로 서비스 할 때 사용)
