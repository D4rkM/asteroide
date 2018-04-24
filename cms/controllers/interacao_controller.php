<?php
    /*
        Autor:Bruna
        Data de Modificação:19/04/2018
        Controller:Interacao
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerInteracao{

        //Apaga um contato existente
        public function Excluir(){
          $idInteracao = $_GET['id'];

          $interacao = new Interacao();

          $interacao->id = $idInteracao;

          $interacao::Delete($interacao);

        }

        //Lista todos os contatos existentes
        public function Listar(){

          $interacao = new Interacao();

          return $interacao::Select();

        }

    }

?>
