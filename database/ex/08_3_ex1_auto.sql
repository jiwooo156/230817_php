-- 1. auto_increment 란?
-- 	자동 증가 값을 가지는 컬럼으로 값을 직접 대입할 수 없습니다.
-- 	중간에 값을 삭제한다고 해서, 삭제된 값을 재사용 하지 않으며
-- 	레코드가 적재될 때마다 1씩 증가하게 됩니다.
--  PK에만 적용할 수 있습니다.

-- 2. auto_increment 생성
CREATE TABLE 테이블명 (
	mem_no INT(11) PRIMARY KEY AUTO_INCREMENT 
	,mem_name VARCHAR(50) 
);


-- 3. auto_increment 수정
-- 이미 생성한 테이블의 컬럼에 추가할 때
ALTER TABLE 테이블명 MODIFY mem_no INT AUTO_INCREMENT;
-- mem_no라는 컬럼에 새로운 규칙(auto_increment = 자동순서배정)를 주겠다. 

INSERT INTO 테이블명(mem_name) VALUES ('tt');
-- mem_name이라는 컬럼에 'tt'라는 값을 주겠다.

-- auto_increment의 값을 특정값으로 설정(현재 pk의 최대값 이하로는 설정이 안됨)
ALTER TABLE 테이블명 AUTO_INCREMENT=10;
-- '테이블명'이라는 테이블에 auto_increment 효과에 단위를 10으로 주겠다.