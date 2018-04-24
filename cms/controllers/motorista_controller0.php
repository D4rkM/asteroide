<?php
session_start();
require_once('trata_imagem.php');
    /*
        Autor:Bruna
        Data de Modificação:17/04/2018
        Controller:Funcionario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerMotorista{

      public function dateEmMysql($dateSql){
        $ano= substr($dateSql, 6);
        $mes= substr($dateSql, 3,-5);
        $dia= substr($dateSql, 0,-8);
        return $ano."-".$mes."-".$dia;
      }

        //Insere novo contato
        public function Novo(){
          $motorista = new Motorista();
          // require_once('trata_imagem.php');

          $salvarimagem = salvarFoto($_FILES['imagem'], 'arquivo');
          //var_dump($_FILES['imagem']);
          if($salvarimagem == "false"){
            echo('Erro no uploade ');
          }else{
          $motorista->imagem=$salvarimagem;
          $motorista->nome = $_POST['txtNome'];
          $motorista->email = $_POST['txtEmail'];
          $motorista->usuario = $_POST['txtUsuario'];
          $motorista->senha = $_POST['txtSenha'];
          $data = implode("-",array_reverse(explode("/",$_POST['txtDataNasc'])));
          $motorista->data_nasc = $data;
          $motorista->sexo = $_POST['rdoSexo'];
          $motorista->telefone = $_POST['txtTelefone'];
          $motorista->celular = $_POST['txtCelular'];
          $motorista->cpf = $_POST['txtCPF'];
          $motorista->rg = $_POST['txtRG'];
          $motorista->cnh = $_POST['txtcnh'];
          $motorista->ativo = $_POST['chkAtivo'];

          $motorista::Insert($motorista);
        }

      }

        //Atualiza um contato existente
        public function Editar($idMotorista){
          $motorista = new Motorista();


          $salvarimagem = salvarFoto($_FILES['imagem'], 'arquivo');
          //var_dump($_FILES['imagem']);
          if($salvarimagem == "false"){
            echo('Erro no uploade');
          }else{
          $motorista->id = $idMotorista;
          $motorista->nome = $_POST['txtNome'];
          $motorista->email = $_POST['txtEmail'];
          $motorista->usuario = $_POST['txtUsuario'];
          $motorista->data_nasc = $_POST['txtDataNasc'];
          $motorista->sexo = $_POST['rdoSexo'];
          $motorista->telefone = $_POST['txtTelefone'];
          $motorista->celular = $_POST['txtCelular'];
          $motorista->cpf = $_POST['txtCPF'];
          $motorista->rg = $_POST['txtRG'];
          $motorista->cnh = $_POST['txtcnh'];
          $motorista->imagem = $_POST['flefoto'];
          $motorista->ativar = $_POST['chkAtivo'];
          if(isset($_POST['chkAtivo'])){
            $motorista->ativo = '1';
          }else{
            $motorista->ativo = '0';
          }

          $motorista::Update($idMotorista, $motorista);

        }
      }

        //Apaga um contato existente
        public function Excluir(){
          $idMotorista = $_GET['id'];

          $motorista = new Motorista();

          $motorista->id = $idMotorista;

          $motorista::Delete($motorista);
        }

        //Busca um registro existente
        public function Buscar($id){

          $motorista = new Motorista();

          $motorista->id = $id;

          return $dadosMotorista= $motorista::SelectById($motorista);

        }

        //Lista todos os contatos existentes
        public function Listar(){

          $motorista = new Motorista();

          return $motorista::Select();

        }



    }

?>
