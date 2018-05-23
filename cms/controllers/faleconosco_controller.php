<?php
class controllerReclamacao {

  public function Novo(){
    $reclamacao = new Reclamacao();

    $reclamacao->reclamacao = $_POST['txtreclamacao'];
    $reclamacao->email = $_POST['txtemail1'];

    $reclamacao::Insert($reclamacao);
  }

  public function Listar(){
    $reclamacao = new Reclamacao();
    return $reclamacao::Select();
  }
}

class controllerSugestao{
  public function Novo(){
    $sugestao = new Sugestao();

    $sugestao->sugestao = $_POST['txtsugestao'];
    $sugestao->email = $_POST['txtemail2'];

    $sugestao::Insert($sugestao);
  }

  public function Listar(){
    $sugestao = new Sugestao();
    return $sugestao::Select();
  }
}

class controllerElogio{
  public function Novo(){
    $elogio = new Elogio();

    $elogio->elogio = $_POST['txtelogio'];
    $elogio->email = $_POST['txtemail3'];

    $elogio::Insert($elogio);
  }

  public function Listar(){
    $elogio = new Elogio();
    return $elogio::Select();
  }
}
 ?>
