<?php
/*
    Autor:Bruna
    Data de Modificação:04/20/2018
    Controller:Classe
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class controllerClasseOnibus{
  public function Listar(){
    $classe_onibus = new ClasseOnibus();
    return $classe_onibus::Select();
  }
}
 ?>
