<?php
session_start();


    /*
        Autor:William
        Data de Modificação:22/03/2018
        Controller:Funcionario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerFuncionario{

      public function dateEmMysql($dateSql){
        $ano= substr($dateSql, 6);
        $mes= substr($dateSql, 3,-5);
        $dia= substr($dateSql, 0,-8);
        return $ano."-".$mes."-".$dia;
      }

        //Insere novo contato
        public function Novo(){
          $funcionario = new Funcionario();

          $funcionario->nome = $_POST['txtNomeFunc'];
          $funcionario->login = $_POST['txtUsuarioFunc'];

          $data = implode("-",array_reverse(explode("/",$_POST['txtDataNascFunc'])));
          $funcionario->data_nasc = $data;
          $funcionario->telefone = $_POST['txtTelefoneFunc'];
          $funcionario->cpf = $_POST['txtCPFFunc'];
          $funcionario->cep = $_POST['txtCEPFunc'];
          $funcionario->numero = $_POST['txtNumeroCasaFunc'];
          $funcionario->bairro = $_POST['txtBairroFunc'];
          $funcionario->ativo = $_POST['chkAtivo'];
          $funcionario->email = $_POST['txtEmailFunc'];
          $funcionario->senha = $_POST['txtSenhaFunc'];
          $funcionario->sexo = $_POST['rdoSexoFunc'];
          $funcionario->celular = $_POST['txtCelularFunc'];
          $funcionario->rg = $_POST['txtRGFunc'];
          $funcionario->logradouro = $_POST['txtLogradouroFunc'];
          $funcionario->complemento = $_POST['txtComplementoFunc'];

          $funcionario::Insert($funcionario);

        }



        //Atualiza um contato existente
        public function Editar($idFuncionario){
          $funcionario = new Funcionario();

          $funcionario->id=$idFuncionario;
          $funcionario->nome = $_POST['txtNomeFunc'];
          $funcionario->login = $_POST['txtUsuarioFunc'];
          $funcionario->data_nasc = $_POST['txtDataNascFunc'];
          $funcionario->telefone = $_POST['txtTelefoneFunc'];
          $funcionario->cpf = $_POST['txtCPFFunc'];
          $funcionario->cep = $_POST['txtCEPFunc'];
          $funcionario->numero = $_POST['txtNumeroCasaFunc'];
          $funcionario->bairro = $_POST['txtBairroFunc'];
          if(isset($_POST['chkAtivo'])){
            $funcionario->ativo = '1';
          }else{
            $funcionario->ativo = '0';
          }

          $funcionario->email = $_POST['txtEmailFunc'];
          $funcionario->senha = $_POST['txtSenhaFunc'];
          $funcionario->sexo = $_POST['rdoSexoFunc'];
          $funcionario->celular = $_POST['txtCelularFunc'];
          $funcionario->rg = $_POST['txtRGFunc'];
          $funcionario->logradouro = $_POST['txtLogradouroFunc'];
          $funcionario->complemento = $_POST['txtComplementoFunc'];

          $funcionario::Update($funcionario);

        }

        //Apaga um contato existente
        public function Excluir(){
          $idFuncionario = $_GET['id'];

          $funcionario = new Funcionario();

          $funcionario->id = $idFuncionario;

          $funcionario::Delete($funcionario);


        }

        //Busca um registro existente
        public function Buscar($id){

          $funcionario = new Funcionario();

          $funcionario->id = $id;

          return $dadosFuncionario = $funcionario::SelectById($funcionario);

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

          if($dadosFuncionario!=false)
          {
            $_SESSION['nomeUser'] = $dadosFuncionario->nome;
            $_SESSION['idUser'] = $dadosFuncionario->id;
            $_SESSION['statusUser'] = $dadosFuncionario->ativo;

          }else{
            $_SESSION['erro'] = "Usuario ou senha incorretos, caso o erro percista entre em contato com o ADM";
          }

          //require_once("index.php");
          header('location:index.php');

        }



    }

?>
