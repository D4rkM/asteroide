<?php
/*
    Autor:Bruna
    Data de Modificação:04/20/2018
    Controller:Classe
    Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
*/
class controllerStatusOnibus{
  public function Listar(){
    $status_onibus = new StatusOnibus();
    return $status_onibus::Select();
  }
}
 ?>
