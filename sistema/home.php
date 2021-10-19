<?php
    session_start();
    if(!isset($_SESSION['acesso']) || empty($_SESSION['user'])){
        header("Location: ../index.php");
    }
    $user = ($_SESSION['user'][0]);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='../css/style.css'>
    <title>Home</title>
</head>
<body>
    <div class="card" id='card'>
        <button onclick="cancelar()">Cancelar</button>
        <form action="#" method="post">
            <input type="number" name="id" id="id" value="<?php echo $user->id;?>" hidden>
            <input type="text" name="input" id="input" hidden>
            <input type="text" name="uptade_dados" id="uptade_dados">
            <input onclick="dados()"  type="button" value="Atualizar dados">
        </form>    
    </div><!-- card -->
    <div class="container">
        <section>
            <h1>Olá, <?php echo $user->nome;?></h1>
            <div class="div-dados">
                <span>
                    <h3>Seu nome é:</h3><p><?php echo $user->nome;?></p><button onclick="uptade('<?php echo $user->nome;?>','nome')">Editar</button>
                </span>
                <span>
                    <h3>Seu login é:</h3><p><?php echo $user->login;?></p><button onclick="uptade('<?php echo $user->login;?>','login')">Editar</button>
                </span>
                <span>
                    <h3>Sua senha é:</h3><p><?php echo $user->senha;?></p><button onclick="uptade('<?php echo $user->senha;?>','senha')">Editar</button>
                </span>
                <span>
                    <h3>Seu hobbie é:</h3><p><?php if(!empty($user->hobbie)){echo $user->hobbie;}else{ echo 'Nao tem';} ?></p><button onclick="uptade('<?php echo $user->hobbie;?>','hobbie')">Editar</button>
                </span>
            </div><!-- div-dados -->
        </section>
        <section class="sec-btn">
            <button><a href='log.php?acao=delete&id=<?php echo $user->id;?>'>Deletar dados</a></button>
            <button><a href='log.php?acao=exit'>Sair</a></button>
        </section>
    </div><!-- container -->
    <script src='script.js'></script>
</body>
</html>