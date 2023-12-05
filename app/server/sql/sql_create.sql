-- Criar banco de dados
CREATE DATABASE `7code`;

-- Usar o banco de dados
USE `7code`;

-- Criar tabela USER
CREATE TABLE user (
    cpf BIGINT NOT NULL PRIMARY KEY,
    nome VARCHAR(90) NOT NULL,
    email VARCHAR(90) NOT NULL,
    senha VARCHAR(90) NOT NULL,
    data_nasc DATE
);

-- Criar tabela BANKACCOUNT
CREATE TABLE bankaccount (
    account_id INT PRIMARY KEY AUTO_INCREMENT,
    cpf BIGINT,
    num_card BIGINT,
    saldo DECIMAL(10, 2) DEFAULT 0.00,
    account_type VARCHAR(80) DEFAULT 'CORRENTE',
    is_enable BIT DEFAULT 1,
    data_abertura DATE DEFAULT CURRENT_DATE,
    FOREIGN KEY (cpf) REFERENCES user(cpf)
);

-- Criar tabela USERPHOTO
CREATE TABLE userphoto (
    id_photo INTEGER PRIMARY KEY AUTO_INCREMENT NOT NULL,
    caminho VARCHAR(255) NOT NULL,
    cpf BIGINT,
    FOREIGN KEY (cpf) REFERENCES user(cpf)
);

-- Criar tabela HISTORYACCOUNT
CREATE TABLE historyaccount (
    id_history_opr BIGINT AUTO_INCREMENT NOT NULL PRIMARY KEY,
    account_id INT,
    operation_type VARCHAR(20) NOT NULL,
    value_transaction DECIMAL(10, 2) NOT NULL,
    data_operation TIMESTAMP NOT NULL,
    FOREIGN KEY (account_id) REFERENCES bankaccount(account_id)
);

-- Criar procedimento INSERT_USER
DELIMITER //

CREATE DEFINER=`root`@`localhost` PROCEDURE `insert_user`(
    cpf_user BIGINT,
    nome_user VARCHAR(90),
    email_user VARCHAR(90),
    data_nasc_user DATE,
    senha_user VARCHAR(90)
) 
BEGIN
    INSERT INTO user (cpf, nome, email, data_nasc, senha)
    VALUES (cpf_user, nome_user, email_user, data_nasc_user, senha_user);
END;

//


-- Criar gatilho TRIG_USER_INSERT
DELIMITER //

CREATE TRIGGER trig_user_insert AFTER INSERT ON user 
FOR EACH ROW 
BEGIN
    -- Gera um ACCOUNT_ID aleatório
    SET @account_id := FLOOR(RAND() * 1000000000) + 1;
    SET @num_card := FLOOR(RAND() * 1000000000000000) + 1000000000000000;
    
    -- Insere os dados na tabela BANKACCOUNT
    INSERT INTO bankaccount (cpf, account_id, num_card)
    VALUES (NEW.cpf, @account_id, @num_card);
END;

//

DELIMITER ;
