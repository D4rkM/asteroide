<?php
    /*
        Autor:William e bruna
        Data de Modificação:04/20/2018
        Controller:cidade
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
    class controllerCidade{
        //Insere novo contato
        public function Excluir(){
          // $idCidade = $_GET['id'];
          // $cidade = new Cidade();
          // $cidade->id = $idCidade;
          // $cidade::Delete($cidade);
        }

        //Lista todos os contatos existentes
        public function Listar(){

          $cidade = new Cidade();

          return $cidade::Select();
          // echo $cidade;
        }
    }
?>
