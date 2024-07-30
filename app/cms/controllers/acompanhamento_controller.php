<?php
class controllerAcompanhamento{
  public function Listar(){
    $acompanha = new Acompanhamento();
    return $acompanha::Select();
  }
}

 ?>
