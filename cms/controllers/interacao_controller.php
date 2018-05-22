<?php
    /*
        Autor:Bruna
        Data de Modificação:19/04/2018
        Controller:Interacao
        Obs:Controller para realizar o CRUD de contatos que vai vir do contatos (RETIRAR OS DADOS DO FORMULÁRIO!!!!!)
    */
    class controllerInteracao{
        //Apaga um contato existente
        public function Excluir(){
          $idInteracao = $_GET['id'];
          $interacao = new Interacao();
          $interacao->id = $idInteracao;

          $interacao::Delete($interacao);
        }
        //Lista todos os contatos existentes
        public function Lista(){
          $interacao = new Interacao();
          return $interacao::Select();
        }

        public function Ativar(){
      require_once ('models/interacao_class.php');
			//GUARDA O ID DO CONTATO PASSADO NA VIEW
			$id = $_GET['id'];
			//INSTANCIA A CLASSE CONTATO
			$interacao = new Interacao();
			//DEFINE O ID DO CONTATO COM O VALOR DA VARIÁVEL
			$interacao->id = $id;
			//CHAMA O MÉTODO DA MODEL PARA APAGAR O REGISTRO
			$interacao::AtivarPorId($interacao);

		}


  public function Desativar(){
      require_once ('models/interacao_class.php');
      $id = $_GET['id'];
  		//INSTANCIA A CLASSE CONTATO
  		$interacao = new Interacao();
  		//DEFINE O ID DO CONTATO COM O VALOR DA VARIÁVEL
  		$interacao->id = $id;
  		//CHAMA O MÉTODO DA MODEL PARA APAGAR O REGISTRO
  		$interacao::DesativarPorId($interacao);

  }
    }

?>
