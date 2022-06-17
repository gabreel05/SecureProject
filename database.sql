DROP DATABASE IF EXISTS DB_SecureProject;
CREATE DATABASE IF NOT EXISTS DB_SecureProject;
USE DB_SecureProject;

CREATE TABLE IF NOT EXISTS TB_Vacancy_types(
	vacancy_type_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    vacancy_type_name VARCHAR(255)
);

INSERT INTO TB_Vacancy_types(vacancy_type_name) VALUES ("Desenvolvimento");
INSERT INTO TB_Vacancy_types(vacancy_type_name) VALUES ("Design");
INSERT INTO TB_Vacancy_types(vacancy_type_name) VALUES ("Segurança");

CREATE TABLE IF NOT EXISTS DB_SecureProject.TB_Users(
	user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_name VARCHAR(255) NOT NULL,
    user_document CHAR(14) NOT NULL,
    user_email VARCHAR(255) NOT NULL UNIQUE,
    user_phone CHAR(15) NOT NULL,
    user_gender VARCHAR(255) NOT NULL,
    user_password VARCHAR(255) NOT NULL,
    vacancy_type_id INTEGER NOT NULL,
    CONSTRAINT check_gender CHECK (user_gender = "Masculino" OR user_gender = "Feminino"),
    FOREIGN KEY(vacancy_type_id) REFERENCES TB_Vacancy_types(vacancy_type_id)
);


CREATE TABLE IF NOT EXISTS TB_Vacancies(
	vacancy_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    vacancy_brand VARCHAR(255) NOT NULL,
    vacancy_description VARCHAR(255) NOT NULL,
    vacancy_creation DATETIME,
    vacancy_type_id INTEGER NOT NULL,
    FOREIGN KEY(vacancy_type_id) REFERENCES TB_Vacancy_types(vacancy_type_id)
);

INSERT INTO TB_Vacancies (vacancy_brand, vacancy_description, vacancy_creation, vacancy_type_id) VALUES(
	"BRQ",
    "Desenvolvedor Java Pleno - Home office",
    NOW(),
    1
);
INSERT INTO TB_Vacancies (vacancy_brand, vacancy_description, vacancy_creation, vacancy_type_id) VALUES(
	"TOTVS",
    "Designer grafico/UX - Hibrido",
    NOW(),
    2
);
INSERT INTO TB_Vacancies (vacancy_brand, vacancy_description, vacancy_creation, vacancy_type_id) VALUES(
	"ExxonMobil",
    "Gerente de projeto sustentação - Hibrido",
    NOW(),
    3
);
INSERT INTO TB_Vacancies (vacancy_brand, vacancy_description, vacancy_creation, vacancy_type_id) VALUES(
	"VETEX",
    "Analista de sistemas desenvolvimento - Remoto",
    NOW(),
    1
);

INSERT INTO TB_Vacancies (vacancy_brand, vacancy_description, vacancy_creation, vacancy_type_id) VALUES(
	"Compass.UOL",
    "Security Champion - Hibrido",
    NOW(),
    3
);

DROP TABLE TB_User_Vacancies;
CREATE TABLE IF NOT EXISTS TB_User_Vacancies(
    user_id INTEGER NOT NULL,
    vacancy_id INTEGER NOT NULL,
    PRIMARY KEY(user_id, vacancy_id),
    FOREIGN KEY(user_id) REFERENCES TB_Users(user_id),
    FOREIGN KEY(vacancy_id) REFERENCES TB_Vacancies(vacancy_id)
);

SELECT * FROM TB_User_Vacancies;

SELECT DISTINCT TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description
	FROM TB_Vacancies, TB_Users
    WHERE TB_Vacancies.vacancy_type_id = TB_Users.vacancy_type_id
    AND TB_Users.user_id = 7;

SELECT TB_Vacancies.vacancy_id, TB_Vacancies.vacancy_brand, TB_Vacancies.vacancy_description 
        FROM DB_SecureProject.TB_Vacancies 
        WHERE TB_Vacancies.vacancy_id NOT IN 
        (SELECT TB_Vacancies.vacancy_id 
			FROM TB_Vacancies, TB_User_Vacancies 
            WHERE TB_Vacancies.vacancy_id = TB_User_Vacancies.vacancy_id)
            ORDER BY vacancy_creation DESC;
    
SELECT * FROM TB_Users;
