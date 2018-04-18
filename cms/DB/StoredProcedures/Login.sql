DELIMITER %%
CREATE PROCEDURE sp_login_funcionario(IN loginSistema VARCHAR(20), IN senhaSistema VARCHAR(20), OUT mensagem BOOL, OUT idfunc INT, OUT nomefunc VARCHAR(45))
BEGIN
	/*Cria variaveis locais para a verificacao*/
	DECLARE idfuncionario INT;
    DECLARE resposta BOOL;
    DECLARE nomeFuncionario VARCHAR(45);
    /*Pega o id do usuario caso os dados estejam corretos*/
    SELECT id INTO idfuncionario FROM funcionario WHERE login = loginSistema AND senha = SenhaSistema;
    /**VERIFICA SE O ID EXISTE **/
	IF(idfuncionario <> '')THEN
    
		SELECT nome INTO nomeFuncionario FROM funcionario WHERE id = idfuncionario;
        
        SET nomefunc = nomeFuncionario;
		SET idfunc = idfuncionario;
		SET resposta = TRUE;
    
    ELSE
		
		SET resposta = FALSE;
    
    END IF;
    SET mensagem = resposta;

END %%
DELIMITER ;

DROP procedure sp_login_funcionario;

CALL sp_login_funcionario('1', '123', @mensagem, @id, @nome);
SELECT @mensagem, @id, @nome;

