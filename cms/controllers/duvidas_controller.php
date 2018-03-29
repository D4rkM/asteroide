<?php
session_start();


    /*
        Autor:William
        Data de Modificação:22/03/2018
        Controller:Funcionario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerDuvidas{


        //Insere novo contato
        public function Novo(){
          $duvidas = new Duvidas();

          $duvidas->pergunta = $_POST['txtDuvidaFreq'];
          $duvidas->resposta = $_POST['txtAreaRespotaDuvidaFreq'];
          $duvidas->aparecer = $_POST['chkDuvidaFrequente'];


          $duvidas::Insert($duvidas);

        }



        //Atualiza um contato existente
        public function Editar($idFuncionario){
          $duvidas = new Duvidas();

          $duvidas->id = $idFuncionario;
          $duvidas->pergunta = $_POST['txtDuvidaFreq'];
          $duvidas->resposta = $_POST['txtAreaRespotaDuvidaFreq'];
          if(isset($_POST['chkDuvidaFrequente'])){
            $duvidas->aparecer = '1';
          }else{
            $duvidas->aparecer = '0';
          }

          $duvidas::Update($duvidas);

        }

        //Apaga um contato existente
        public function Excluir(){
          $idDuvida = $_GET['id'];

          $duvida = new Duvidas();

          $duvida->id = $idDuvida;

          $duvida::Delete($duvida);


        }

        //Busca um registro existente
        public function Buscar($id){

          $duvida = new Duvidas();

          $duvida->id = $id;

          return $dadosDuvida= $duvida::SelectById($duvida);

        }

        //Lista todos os contatos existentes
        public function Listar(){

          $duvidas = new Duvidas();

          return $duvidas::Select();

        }



    }

?>
