<?php
  class controllerFiltro{

    public function Buscar($id){
      $filtro = new Filtro();

      $filtro->origem = $_POST['txtorigem'];
      $filtro->destino = $_POST['txtdestino'];
      $filtro->ida = $_POST['txtida'];
      $filtro->volta = $_POST['txtvolta'];

      $filtro->id = $id;

      return $dadosFiltro= $filtro::SelectById($filtro);
    }

    public function Listar(){
      
      $filtro = new Filtro();
      return $filtro::Select();
    }
  }

 ?>
