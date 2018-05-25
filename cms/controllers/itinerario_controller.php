<?php
    class controllerInteracao{
        //Apaga um contato existente
        public function Lista(){
          $idInteracao = $_GET['id'];
          $interacao = new Interacao();
          $interacao->id = $idInteracao;

          $interacao::Delete($interacao);
        }
        //Lista todos os itinerarios existentes
        public function Lista(){
          $itinerario = new Itinerario();
          return $itinerario::Select();
        }

    }

?>
