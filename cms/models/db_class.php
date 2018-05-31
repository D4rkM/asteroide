<?php

    /*
        Autor:William
        Data de Modificação:22/03/2018
        Class:Banco de dados
        Obs:Essa Classe é a conexao com o banco de dados
    */
    class Mysql_db{
        private $server;
        private $user;
        private $password;
        private $dataBaseName;

        //Metodo mágico ou construtor;
        public function __construct(){
            $this->server = "192.168.0.106";
            $this->user = "voudeasteroide";
            $this->password = "4st3r01d3";
            $this->dataBaseName = "dbvoudeasteroide";
        }

        public function Conectar(){
            try{
                //Abre a conexao com DB utilizando a biblioteca PDO
                $conexao = new PDO("mysql:host=".$this->server.';dbname='.$this->dataBaseName,$this->user,$this->password);

                return $conexao;
            }catch(PDOException $Error){
                echo("Erro ao conectar no BD.)
                    Linha do Erro:".$Error->getLine()."
                    Mensagem do Erro:".$Error->getMessage());
            }

        }

        public function Desconectar(){
            //Elimina a conexao com o DB
            $conexao = null;
        }
    }

?>
