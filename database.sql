CREATE DATABASE IF NOT EXISTS DB_SecureProject;
DROP DATABASE IF EXISTS DB_SecureProject;
USE DB_SecureProject;

CREATE TABLE IF NOT EXISTS DB_SecureProject.TB_Users(
	user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_document CHAR(14) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_phone CHAR(15) NOT NULL,
    user_gender VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    user_country VARCHAR(255) NOT NULL,
    CONSTRAINT check_gender CHECK (user_gender = "Masculino" OR user_gender = "Feminino")
);
DROP TABLE IF EXISTS TB_Users;

INSERT INTO TB_Users (user_name, user_email, user_phone, user_gender, user_password, user_country) 
	VALUES ("Gabriel", "email@email", "(99) 99999-9999", "Masculino", "Gabriel@12345", "Brasil");
