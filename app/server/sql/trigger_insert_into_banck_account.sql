DELIMITER //
CREATE TRIGGER trig_user_insert
AFTER INSERT ON USER
FOR EACH ROW
BEGIN
    -- Gera um ACCOUNT_ID aleatório
    SET @account_id := FLOOR(RAND() * 1000000) + 1;


    -- Insere os dados na tabela BANKACCOUNT
    INSERT INTO BANKACCOUNT (CPF, ACCOUNT_ID)
    VALUES (NEW.CPF, @account_id);

END;
//
DELIMITER ;