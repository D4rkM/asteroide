<?php

  class controllerEndereco{

    public function Novo(){
      $endereco = new Endereco();

      $endereco->cep=$_POST['cep'];
      $endereco->logradouro=$_POST['logradouro'];
      $endereco->numero=$_POST['numero'];
      $endereco->bairro=$_POST['bairro'];
      $endereco->complemento=$_POST['complemento'];
      $endereco->id_cidade=$_POST['cidade'];

      $endereco::Insert($endereco);
      $id_endereco = $endereco::Insert($endereco);
      return $id_endereco;
    }

    public function Buscar($id){
      $endereco = new Endereco();
      $endereco->id = $id;
      return $dadosEndereco = $endereco::SelectById($endereco);
    }

  }


 ?>
