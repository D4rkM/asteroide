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

        public function Editar($id_itinerario){
          $itinerario = new Itinerario();

          $itinerario->id = $id_itinerario;
          $itinerario->parada = $_POST['id'];
          $itinerario->pacote_viagem = $_POST['pacote_viagem'];
          $ordem = 0;
          $itinerario->ordem = $ordem;
                // echo ($itinerario);die;
          $interacao::Update($interacao);
        }
        public function Excluir(){
          $idItinerario = $_GET['id'];
          $itinerario = new Itinerario();
          $itinerario->id = $idItinerario;
          $itinerario::Delete($itinerario);
        }

        public function Buscar($id){
          $itinerario = new Itinerario();
          $itinerario->id = $id;
          return $dadosItinerario = $itinerario::SelectById();
        }

        public function Listar(){
          $itinerario = new Itinerario();
          return $itinerario::Select();
        }
    }
?>
