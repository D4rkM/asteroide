<?php

  class CompraController{

    function novaCompra(){

      $poltronas_selecionadas = array();

      if (isset($_POST['btnComprar'])) {

        $id_usuario = $_SESSION['id_usuario'];
        $poltronas_selecionadas = $_POST['poltrona'];
        $id_viagem = $_POST['idviagem'];
        // header('location:pagina-pagamento.php');
      }
    }

    function buscarPorUsuario(){

    }



  }




 ?>
