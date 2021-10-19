<?php

use function PHPSTORM_META\type;

class Crud{
        private $conexao;
        private $banco;
        public function __construct(Conexao $conexao,Banco $banco){
            $this->conexao = $conexao->conectar();
            $this->banco = $banco;
        }
        public function analisar(){
            $query = 'select * from pessoas where login = :login';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":login", $this->banco->__get("login"));
            $stmt->execute();
            return $stmt->FetchAll(PDO::FETCH_OBJ);
        }
        /* cadastro */
        public function create(){
            $query = 'insert into pessoas(nome,login,senha,hobbie) values(:nome,:login,:senha,:hobbie)';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":nome", $this->banco->__get("nome"));
            $stmt->bindValue(":login", $this->banco->__get("login"));
            $stmt->bindValue(":senha", $this->banco->__get("senha"));
            $stmt->bindValue(":hobbie", $this->banco->__get("hobbie"));
            $stmt->execute();
        }
        /* login */
        public function read(){
            $query = 'select * from pessoas where login = :login and senha = :senha';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":login", $this->banco->__get("login"));
            $stmt->bindValue(":senha", $this->banco->__get("senha"));
            $stmt->execute();
            return $stmt->FetchAll(PDO::FETCH_OBJ);
        }
        /* delete */
        public function delete(){
            $query = 'delete from pessoas where id = :id';
            $stmt = $this->conexao->prepare($query);
            $stmt->bindValue(":id", $this->banco->__get('id'));
            $stmt->execute();
        }
        public function uptade($type){
            if($type == 'nome'){
                $query = "UPDATE pessoas SET nome = :nome WHERE id = :id;";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(":nome", $this->banco->__get("nome"));
                $stmt->bindValue(":id", $this->banco->__get("id"));
                $stmt->execute();
            }if($type == 'login'){
                $query = "UPDATE pessoas SET login = :login WHERE id = :id;";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(":login", $this->banco->__get("login"));
                $stmt->bindValue(":id", $this->banco->__get("id"));
                $stmt->execute();
            }if($type == 'senha'){
                $query = "UPDATE pessoas SET senha = :senha WHERE id = :id;";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(":senha", $this->banco->__get("senha"));
                $stmt->bindValue(":id", $this->banco->__get("id"));
                $stmt->execute();
            }if($type == 'hobbie'){
                $query = "UPDATE pessoas SET hobbie = :hobbie WHERE id = :id;";
                $stmt = $this->conexao->prepare($query);
                $stmt->bindValue(":hobbie", $this->banco->__get("hobbie"));
                $stmt->bindValue(":id", $this->banco->__get("id"));
                $stmt->execute();
            }
            header('Location:../index.php?status=uptade');
            
        }
    }

?>