<?php
    $acao = $_GET['acao'];
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;


    require_once 'conexao.php';
    require_once 'banco.php';
    require_once 'crud.php';
    /* create */
    if($acao == 'cadastro'){
        $banco = new Banco();
        $conexao = new Conexao();
        if(!empty($_POST['new-user'])){
            $newUser = $_POST['new-user'];
            $nome = $_POST['nome'];
            $newUser = strtolower($newUser);
            $nome = strtolower($nome);
            /* nome igual user */
            if($newUser == $nome){
                header("Location:../cadastro.php?status=1");
            }else{
                $nome = ucfirst($nome);
                $banco->__set('nome',$nome);
                $banco->__set('login',$newUser);
                $banco->__set('hobbie',$_POST['hobbie']);
                $banco->__set('senha',$_POST['new-senha']);
                $crud = new Crud($conexao,$banco);
                $analise = $crud->analisar();
                foreach ($analise as $key => $value) {
                    $verificar =  $value->login;
                }
                if(!empty($verificar)){
                    /* usuario ja usado */
                    header("Location:../cadastro.php?status=3");
                }else{
                    $crud->create();
                    header("Location:../index.php?status=true");
                }
            }
        }
    }
    /* read */    
    if($acao == 'login'){
        $banco = new Banco();
        $conexao = new Conexao();
        if(!empty($_POST['user']) && !empty($_POST['password'])){
            $user_lower = $_POST['user'];
            $user_lower = strtolower($user_lower);
            $banco->__set("login",$user_lower);
            $banco->__set('senha',$_POST['password']);
            $crud = new Crud($conexao,$banco);
            $user = $crud->read();
            print_r($user);
            if(!empty($user)){
                session_start();
                $_SESSION['acesso'] = true;
                $_SESSION['user'] = $user;
                header("Location:home.php");
            }else{
                /* usuario n encontrado */
                header("Location:../index.php?status=4");
            }
        }else{
            /* campo vazio */
            header("Location:../index.php?status=5");
        }
    }
    /* uptade */
    if($acao == 'uptade'){
        $banco = new Banco();
        $conexao = new Conexao();
        $crud = new Crud($conexao,$banco);
        if($_GET['input'] == 'nome'){
            $banco->__set('nome',$_GET['dado']);
            $banco->__set('id',$_GET['id']);
            $crud->uptade('nome');
        }if($_GET['input'] == 'login'){
            $banco->__set('login',$_GET['dado']);
            $banco->__set('id',$_GET['id']);
            $crud->uptade('login');
        }if($_GET['input'] == 'senha'){
            if(strlen($_GET['dado']) != 6){
                header("location:home.php");
            }else{
                $banco->__set('nome',$_GET['dado']);
                $banco->__set('id',$_GET['id']);
                $crud->uptade('nome');
            }
        }if($_GET['input'] == 'hobbie'){
            $banco->__set('hobbie',$_GET['dado']);
            $banco->__set('id',$_GET['id']);
            $crud->uptade('hobbie');
        }
    }
    /* delete */
    if($acao == 'delete'){
        $banco = new Banco();
        $conexao = new Conexao();
        echo 'antes da condicao <br>';
        if(isset($_GET['id']) || !empty($_GET['id'])){
            echo 'dentro';
            $banco->__set("id",$_GET['id']);
            $crud = new Crud($conexao,$banco);
            $crud->delete();
            /* deletado com sucesso */
            header('Location:../index.php?status=8');
        }else{
            header('Location:home.php');
        }
    }
    if($acao == 'exit'){
        session_start();
        session_destroy();
        header('Location:../index.php');
    }

?>