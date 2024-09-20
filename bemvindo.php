<?php
    session_star();
    if(!isset($_SESSION['usuario'])){
        header("Location: login.php");
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bem vindo</title>
    </head>
    <body>
        <h1>Bem vindo,<?php echo$_SESSION['usuario'];?>!</h1>
        <p><a href="logout.php">Clique aqui para</a></p><br>
        <p><a href="buscar.php">Buscar usuários</a></p>
    </body>
</html>