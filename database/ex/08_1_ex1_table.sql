CREATE TABLE members (
	mem_no INT PRIMARY KEY AUTO_INCREMENT
	,id VARCHAR(30) UNIQUE NOT NULL 
	,mem_name VARCHAR(30) NOT NULL 
	,addr VARCHAR(100) NOT NULL
);

CREATE TABLE points (
	mem_no INT PRIMARY KEY 
	,pt INT NOT NULL DEFAULT(0)
	,CONSTRAINT fk_points_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE
);

CREATE TABLE products (
	product_no INT PRIMARY KEY 
	,product_name VARCHAR(50) NOT NULL 
	,product_price INT NOT NULL 
);


CREATE TABLE orders (
	order_no INT PRIMARY key
	,mem_no INT NOT NULL 
	,product_no INT NOT NULL 
	,product_cnt INT NOT NULL 
	,total_pay INT NOT NULL 
	,CONSTRAINT fk_orders_mem_no FOREIGN KEY(mem_no)
		REFERENCES members(mem_no) ON DELETE CASCADE
	,CONSTRAINT fk_orders_product_no FOREIGN KEY(product_no)
		REFERENCES products(product_no) ON DELETE NO ACTION
);



INSERT INTO members(id, mem_name, addr)
VALUES('admin', 'meerkat', 'korea deagu');

INSERT INTO points(mem_no)
VALUES(1);

--  테이블 변경 (컬럼의 추가,변경,삭제)
ALTER TABLE members ADD COLUMN age INT NOT NULL;
ALTER TABLE members MODIFY COLUMN mem_name VARCHAR(50);
ALTER TABLE members DROP COLUMN age;


-- 테이블 삭제 
DROP TABLE 테이블명;
ROLLBACK;

-- 테이블의 데이터 삭제
TRUNCATE TABLE 테이블명;