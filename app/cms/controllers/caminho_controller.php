<?php
    /*
        Autor:Bruna
        Data de Modificação:25/04/2018
        Controller:Caminho
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerCaminho{


        //Insere novo contato
        public function Novo(){
          $caminho = new Caminho();

          $caminho->latitude = $_POST['txtlatitude'];
          $caminho->longitude = $_POST['txtlongitude'];

          $caminho::Insert($caminho);

        }

        //Atualiza um contato existente
        public function Editar($idAltera){
          $caminho = new Caminho();

          $caminho->id = $idAltera;
          $caminho->latitude = $_POST['txtlatitude'];
          $caminho->longitude = $_POST['txtlongitude'];

          $caminho::Update($caminho);

        }

        //Apaga um contato existente
        public function Excluir(){
          $idCaminho = $_GET['id'];

          $caminho = new Caminho();

          $caminho->id = $idCaminho;

          $caminho::Delete($caminho);


        }

        //Busca um registro existente
        public function Buscar($id){

          $caminho = new Caminho();

          $caminho->id = $id;

          return $dadosCaminho= $caminho::SelectById($caminho);

        }

        //Lista todos os contatos existentes
        public function Listar(){

          $caminho = new Caminho();

          return $caminho::Select();

        }
    }
?>
