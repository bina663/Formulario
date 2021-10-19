<?php
    class Conexao{/* 
        private $host = 'sql210.byetcluster.com';
        private $dbname = "epiz_29236329_formulario";
        private $user = 'epiz_29236329';
        private $senha = 'ycmKqKw8foh'; */
        private $host = 'localhost';
        private $dbname = 'formulario';
        private $user = 'root';
        private $senha = '';
        
        public function conectar(){
            try{
                $conexao = new PDO(
                    "mysql:host=$this->host;dbname=$this->dbname","$this->user","$this->senha"
                );
                return $conexao;
            }catch(PDOException $e){
                echo $e->getMessage();
            }
        }
    }

?>