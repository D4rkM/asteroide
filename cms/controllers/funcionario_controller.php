<?php

    /*
        Autor:William
        Data de Modificação:22/03/2018
        Controller:Funcionario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerFuncionario{

        //Insere novo contato
        public function Novo(){
          $funcionario = new Funcionario();

          $funcionario->nome = $_POST['txtNomeFunc'];
          $funcionario->login = $_POST['txtUsuarioFunc'];
          $funcionario->data_nasc = $_POST['txtDataNascFunc'];
          $funcionario->telefone = $_POST['txtTelefoneFunc'];
          $funcionario->cpf = $_POST['txtCPFFunc'];
          // $funcionario->nome = $_POST['txtCEPFunc'];
          // $funcionario->nome = $_POST['txtNumeroCasaFunc'];
          // $funcionario->nome = $_POST['txtBairroFunc'];
          $funcionario->ativo = $_POST['chkAtivo'];
          $funcionario->email = $_POST['txtEmailFunc'];
          $funcionario->senha = $_POST['txtSenhaFunc'];
          $funcionario->sexo = $_POST['rdoSexoFunc'];
          $funcionario->celular = $_POST['txtCelularFunc'];
          $funcionario->rg = $_POST['txtRGFunc'];
          // $funcionario->nome = $_POST['txtLogradouroFunc'];
          // $funcionario->nome = $_POST['txtComplementoFunc'];

          $funcionario::Insert($funcionario);

        }

        //Atualiza um contato existente
        public function Editar($dadosFuncionario){
          $funcionario = new Funcionario();

          $funcionario::Update($dadosFuncionario);

        }

        //Apaga um contato existente
        public function Excluir(){
          $idFuncionario = $_GET['id'];

          $funcionario = new Funcionario();

          $funcionario->id = $idFuncionario;

          $funcionario::Delete($funcionario);


        }

        //Busca um registro existente
        public function Buscar(){


        }

        //Lista todos os contatos existentes
        public function Listar(){
          $funcionario = new Funcionario();

          return $funcionario::Select();

        }

        //Efetua o login
        public function Logar(){

          $funcionario = new Funcionario();

          $funcionario->login = $_POST['txtUsuario'];
          $funcionario->senha = $_POST['txtSenha'];

          $dadosFuncionario = $funcionario::Login($funcionario);

          require_once("index.php");

        }
    }

?>
