<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='css/style.css'>
    <title>Login</title>
</head>
<body>
        <h1>Login</h1>
        <form action="sistema/log.php?acao=login" method='post'>
            <input type="text" name="user"  placeholder='Usúario'>
            <input type="password" name="password"  placeholder='Senha'>
            <?php
                if(isset($_GET['status']) && $_GET['status'] == 4){?>
                    <p>Usúario não encontrado.</p>
            <?php };?>
            <?php
                if(isset($_GET['status']) && $_GET['status'] == 5){?>
                    <p>Por favor preecher o campos acima pra efetuar o login.</p>
            <?php };?>
            <?php
                if(isset($_GET['status']) && $_GET['status'] == 8){?>
                    <p class='sucesso'>Dados deletado com sucesso.</p>
            <?php };
                if(isset($_GET['status']) && $_GET['status'] == 'true'){?>
                    <p class='sucesso'>Cadastro efetuado com sucesso, efetuar login</p>
            <?php };
                if(isset($_GET['status']) && $_GET['status'] == 'uptade'){?>
                    <p class='sucesso'>Efetue novamente o login, pra atualização do dado</p>
            <?php };?>
            <a href="cadastro.php">Cadastrar-se</a>
            <input type="submit" value="Entrar">
        </form>
</body>
</html>