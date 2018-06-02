<?php 

	class CidadeEstadoController{

		public function pesquisar(){

			$sugestao = new CidadeEstado();
			$pesquisa = $_POST['pesquisa'];

			return $sugestao::pesquisar($pesquisa);

		}

	}

 ?>