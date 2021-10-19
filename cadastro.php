<?php
    $acao = 'cadastro';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style.css'>
    <title>Cadastro</title>
</head>
<body>
        <h1>Cadastro</h1>
        <form action="sistema/log.php?acao=cadastro" method='post'>
            <input type="text" name="nome" id="name" placeholder='*Nome'>
            <input type="text" name="hobbie" id="hobbie" placeholder='Hobbie'>
            <input type="text" name="new-user" id="new-user" required placeholder='*Crie um usúario'>
            <input type="password" name="new-senha" id="new-senha" required placeholder="*Crie uma senha com 6 digitos" maxlength="6" minlength="6">
            
            <?php
                if(isset($_GET['status']) && $_GET['status'] == 1){?>
                    <p>Usúario não pode ser igual seu nome.</p>
            <?php };
                if(isset($_GET['status']) && $_GET['status'] == 2){?>
                    <p>Senha precisa ter 6 numeros.</p>
            <?php };
                if(isset($_GET['status']) && $_GET['status'] == 3){?>
                    <p>Usário ja existente.</p>
            <?php };?>
            <a href='./index.php'>Voltar</a>
            <input type="submit" value="Entrar">
        </form>
</body>
</html>