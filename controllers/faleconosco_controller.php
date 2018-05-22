<?php
class controllerFaleconosco {

  public function Novo(){
    $faleconosco = new Faleconosco();

    $faleconosco->reclamacao = $_POST['txtreclamacao'];
    $faleconosco->sugestao = $_POST['txtsugestao'];
    $faleconosco->elogio = $_POST['txtelogio'];
    $faleconosco->email = $_POST['txtemail'];

    $faleconosco::Insert($faleconosco);
  }
}
 ?>
