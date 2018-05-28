<?php
    class controllerItinerario{
        //Apaga um contato existente
        public function Novo(){

          $itinerario = new Itinerario();
          $itinerario->parada = $_POST['id'];
          $itinerario->pacote_viagem = $_POST['pacote_viagem'];
          $ordem = 0;
          $itinerario->ordem = $ordem;
                echo ($itinerario);die;
          $interacao::Insert($interacao);
        }
    }
?>
