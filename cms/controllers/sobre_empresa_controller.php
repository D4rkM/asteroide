<?php
session_start();
    /*
        Autor:Lucas
        Data de Modificação:23/05/2018
        Controller:Sobre Empresa
        Obs:Controller para realizar o CRUD de titulos, textos e imagens na página de Sobre Empresa.
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

        }

        //Atualiza um contato existente
        public function Editar($sobre_empresa){
          $sobre_empresa = new sobreEmpresa();

          $sobre_empresa->titulo1 = $_POST['txttitulo1'];
          $sobre_empresa->texto1 = $_POST['txttexto1'];
          $sobre_empresa->titulo2 = $_POST['txttitulo2'];
          $sobre_empresa->texto2 = $_POST['txttexto2'];
          $sobre_empresa->imagem = $_POST['imagem'];
          $sobre_empresa->icon1 = $_POST['icon1'];
          $sobre_empresa->detalhes1 = $_POST['txtdetalhes1'];

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

          $sobre_empresa::Update($sobre_empresa);

        }

        //Apaga um contato existente
        public function Excluir($id){
          $id = $_GET['id'];

          $sobre_empresa = new sobreEmpresa();

          $sobre_empresa->id = $id;

          $sobre_empresa::Delete($sobre_empresa);


        }

        //Busca um registro existente
        public function Buscar($id){

          $sobre_empresa = new sobreEmpresa();

          $sobre_empresa->id = $id;

          return $sobre_empresa_dados= $sobre_empresa::SelectById($sobre_empresa);

        }

        //Lista todos os contatos existentes
        public function Listar(){

          $sobre_empresa = new sobreEmpresa();

          return $sobre_empresa::Select();

        }



    }

?>
