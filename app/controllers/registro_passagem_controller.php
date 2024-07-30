<?php

  class RegistroPassagemController{
    // Busca as poltronas ocupadas
    public function buscarPoltronas($viagem_id){

      $registro_poltronas = new RegistroPassagem();
      $registro_poltronas = $registro_poltronas::buscarPoltronas($viagem_id);
      // echo(sizeof($registro_poltronas));
      return $registro_poltronas;
    }


  }


 ?>
