<?php
session_start();
    /*
        Autor:bruna
        Data de Modificação:15/04/2018
        Controller:home
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
    class controllerHome{

        //Insere novo contato
        public function Novo(){
          $home = new Home();
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

          $home->imagem=$diretorio_completo;
          $home->destino = $_POST['txtdestino'];
          $home->tipo = $_POST['tipo'];

          $home::Insert($home);

}
        //Atualiza um contato existente
        public function Editar($idAlterar){
          $home = new Home();
          require_once('trata_imagem.php');
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

          $home->id = $idAlterar;
          $home->destino = $_POST['txtdestino'];
          $home->imagem=$diretorio_completo;
          $home->imagem = $foto;
          $home->tipo = $_POST['tipo'];


          $home::Update($home);

        }

        //Apaga um contato existente
        public function Excluir(){
          $idHome = $_GET['id'];

          $home = new Home();

          $home->id = $idHome;

          $home::Delete($home);


        }

        //Busca um registro existente
        public function Buscar($id){

          $home = new Home();

          $home->id = $id;

          return $dadosHome= $home::SelectById($home);

        }

        //Lista todos os contatos existentes
        public function Listar(){

          $home = new Home();

          return $home::Select();

        }



    }

?>
