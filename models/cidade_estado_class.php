<?php 

	class CidadeEstado{

		public $id;
		public $cod_estado;
		public $cidade;
		public $estado;
		public $Uf;
		public $cidade_estado;


	   	public function __construct(){
	      require_once('db_class.php');
	    }


	    public function pesquisar($pesquisa){

	    	$sql = "SELECT c.cidade as cidade, e.Uf as estado FROM cidade AS c 
	    	INNER JOIN estado AS e 
	    	ON c.cod_estado = e.CodigoUf 
	    	WHERE c.cidade LIKE '$pesquisa%' LIMIT 10;";

	    	$conex = new Mysql_banco();
      		$PDO_conex = $conex->Conectar();

  			//executa select no bd e guarda o retorno na variavel $select
      		$select = $PDO_conex->query($sql);

      		$cont = 0;

		    while($rs=$select->fetch(PDO::FETCH_ASSOC)){

		    	$sugestao[$cont] = new CidadeEstado();

		    	$sugestao[$cont]->cidade_estado = $rs['cidade']." - ".$rs['estado']; 
		    	// echo($rs['cidade']);
		        $cont+=1;
	    	}

	    	$conex->Desconectar();

	    	if(isset($sugestao))
	    		return $sugestao;

	    }

	}

 ?>