CREATE DATABASE mini_boardd;

USE mini_boardd;

CREATE TABLE boards(
	id INT PRIMARY KEY AUTO_INCREMENT
	,title VARCHAR(100) NOT NULL 
	,content VARCHAR(100) NOT NULL 
	,create_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,update_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,delete_at DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP()
	,delete_flg CHAR(1) NOT NULL DEFAULT '0'
);