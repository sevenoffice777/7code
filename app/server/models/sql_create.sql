-- Active: 1699534946579@@127.0.0.1@3306@7tech
CREATE DATABASE 7TECH;

USE 7TECH;

CREATE TABLE USER(
    ID_USER INTEGER AUTO_INCREMENT PRIMARY KEY,
    NOME VARCHAR(90) NOT NULL,
    EMAIL VARCHAR(90) NOT NULL,
    SENHA VARCHAR(90) NOT NULL,
    DATA_NASC DATE
);

DELIMITER //
CREATE DEFINER=`root`@`localhost` PROCEDURE `INSERT_USER`(
    NOME_USER VARCHAR(90),
    EMAIL_USER VARCHAR(90),
    DATA_NASC_USER DATE,
    SENHA_USER VARCHAR(90)
)
BEGIN
    INSERT INTO user (NOME, EMAIL, DATA_NASC, SENHA) VALUES (
        NOME_USER,
        EMAIL_USER,
        DATA_NASC_USER,
        SENHA_USER
    );
END;
//
