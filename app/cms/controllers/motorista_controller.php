<?php
session_start();
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
          require_once('trata_imagem.php');
          // iniciado variaveis
           $diretorio_completo=Null;
           $MovUpload=false;
           $imagem_file=Null;

          //pegando a foto
             if (!empty($_FILES['imagem']['name'])) {
                $imagem_file = true;
                $diretorio_completo=salvarFoto($_FILES['imagem'],'arquivo');
                if ($diretorio_completo == "Erro") {
                      $MovUpload=false;
                }else {
                  $MovUpload=true;
                }
              }else {
                $imagem_file = false;
              }

          $motorista->imagem=$diretorio_completo;
          $motorista->nome = $_POST['txtNome'];
          $motorista->email = $_POST['txtEmail'];
          $motorista->senha = $_POST['txtSenha'];
          $data = implode("-",array_reverse(explode("/",$_POST['txtDataNasc'])));
          $motorista->data_nasc = $data;
          $motorista->sexo = $_POST['rdoSexo'];
          $motorista->telefone = $_POST['txtTelefone'];
          $motorista->celular = $_POST['txtCelular'];
          $motorista->cpf = $_POST['txtCPF'];
          $motorista->rg = $_POST['txtRG'];
          $motorista->cnh = $_POST['txtcnh'];
          $motorista->ativo = $_POST['ativo'];

          $motorista::Insert($motorista);

      }

        //Atualiza um contato existente
        public function Editar($idMotorista){
          $motorista = new Motorista();

          require_once('trata_imagem.php');

          // echo $idOnibus;

          // iniciado variaveis
           $diretorio_completo=Null;
           $MovUpload=false;
           $imagem_file=Null;
           $foto="nada";

          //pegando a foto
             if (!empty($_FILES['imagem']['name'])) {
                $imagem_file = true;
                $diretorio_completo=salvarFoto($_FILES['imagem'],'arquivo');
                if ($diretorio_completo == "Erro") {
                      $MovUpload=false;
                }else {
                  $MovUpload=true;
                }
              }else {
                $imagem_file = false;
              }

              if ($imagem_file == true && $MovUpload==true) {
               $foto =$diretorio_completo;
             }else {
               $foto="nada";
             }
          $motorista->id = $idMotorista;
          $motorista->imagem=$diretorio_completo;
          $motorista->imagem = $foto;
          $motorista->nome = $_POST['txtNome'];
          $motorista->email = $_POST['txtEmail'];
          $motorista->data_nasc = $_POST['txtDataNasc'];
          $motorista->sexo = $_POST['rdoSexo'];
          $motorista->telefone = $_POST['txtTelefone'];
          $motorista->celular = $_POST['txtCelular'];
          $motorista->cpf = $_POST['txtCPF'];
          $motorista->rg = $_POST['txtRG'];
          $motorista->cnh = $_POST['txtcnh'];
          $motorista->ativar = $_POST['chkAtivo'];
          if(isset($_POST['ativo'])){
            $motorista->ativo = '1';
          }else{
            $motorista->ativo = '0';
          }

          $motorista::Update($motorista);

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
