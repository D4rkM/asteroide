<?php
class controllerInteracao{
  public function Novo(){
    $interacao = new Interacao();
    require_once('trata_imagem.php');
    // iniciado variaveis
     $diretorio_completo=Null;
     $MovUpload=false;
     $imagem_file=Null;

    //pegando a foto
       if (!empty($_FILES['imagem']['name'])) {
          $imagem_file = true;
          $diretorio_completo=salvarFoto($_FILES['imagem'],'arquivo');
          if ($diretorio_completo == "Erro") {
                $MovUpload=false;
          }else {
            $MovUpload=true;
          }
        }else {
          $imagem_file = false;
        }
        $interacao->imagem=$diretorio_completo;
        $interacao->comentario = $_POST['txtinteracao'];
        $interacao->local = $_POST['txtlocal'];
        // var_dump($interacao);die;
        $interacao::Insert($interacao);
  }

  public function Lista(){
    $interacao = new Interacao();
    return $interacao::Select();
  }
}
 ?>
