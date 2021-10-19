<?php
    class Banco{
        private $login;
        private $senha;
        private $id;
        private $nome;
        private $hobbie;
        public function __get($atributo){
            return $this->$atributo;
        }
        public function __set($atributo,$valor){
            $this->$atributo = $valor;
            return $this;
        }
        
    }

?>