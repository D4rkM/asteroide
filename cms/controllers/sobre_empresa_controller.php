<?php
session_start();
    /*
        Autor:William
        Data de Modificação:22/03/2018
        Controller:Funcionario
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */

    class controllerSobreEmpresa{


        //Insere novo contato
        public function Novo(){
          $sobre_empresa = new sobreEmpresa();

          $sobre_empresa->titulo1 = $_POST['txttitulo1'];
          $sobre_empresa->texto1 = $_POST['txttexto1'];
          $sobre_empresa->titulo2 = $_POST['txttitulo2'];
          $sobre_empresa->texto2 = $_POST['txttexto2'];
          $sobre_empresa->imagem = $_POST['imagem'];
          $sobre_empresa->icon1 = $_POST['icon1'];
          $sobre_empresa->detalhes1 = $_POST['txtdetalhes1'];

          $sobre_empresa::Insert($sobre_empresa);

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
