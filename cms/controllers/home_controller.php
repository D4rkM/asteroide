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

          $home->destino = $_POST['txtdestino'];
          $home->imagem = $_POST['imagem'];
          $home->tipo = $_POST['tipo'];

          $home::Insert($home);
        }

        //Atualiza um contato existente
        public function Editar($idAlterar){
          $home = new Home();

          $home->id = $idAlterar;
          $home->destino = $_POST['txtdestino'];
          $home->imagem = $_POST['imagem'];
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


        //Lista todos os contatos existentes
        public function ListarTipo(){

          $home = new Home();

          return $home::SelectType();

        }



    }

?>
