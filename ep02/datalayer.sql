/* MYSQL 8.0.30 */
CREATE DATABASE `datalayer` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

CREATE TABLE datalayer.users
(
    id         INT auto_increment NOT NULL,
    first_name varchar(255) NOT NULL,
    last_name  varchar(255) NOT NULL,
    genre      varchar(10) DEFAULT NULL,
    created_at TIMESTAMP   DEFAULT NULL,
    updated_at TIMESTAMP   DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    CONSTRAINT users_pk PRIMARY KEY (id)
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


CREATE TABLE datalayer.adressess
(
    addr_id INT auto_increment NOT NULL,
    user_id INT NULL,
    street  varchar(255) DEFAULT NULL,
    number  varchar(255) DEFAULT NULL,
    CONSTRAINT adressess_pk PRIMARY KEY (addr_id),
    CONSTRAINT adressess_users_FK FOREIGN KEY (user_id) REFERENCES datalayer.users (id) ON DELETE CASCADE
) ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_general_ci;


INSERT INTO datalayer.users
(id, first_name, last_name, genre, created_at, updated_at)
VALUES(1, 'Nome', 'Sobrenome', 'Genero', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
