<?php
    require_once 'conexao.php';
    session_start();
    if (isset($_POST['login'])){
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        try{
            $query = "SELECT * FROM usuarios WHERE email = :email";
            $stmt = $pdo->prepare ($query);
            $stmt->bindParam(':email',$email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            if($usuario && password_verify($senha, $usuario['senha'])){
                $_SESSION['usuario'] = $usuario['nome'];
                header("Location: bemvindo.php");
                exit();
            } else {
                echo "Email ou senhas incorretos!";
            }
        } catch (PDOException $e){
            echo "Erro: " . $e->getMessage();
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
    </head>
    <body>
        <h1>Login de usuário</h1>
        <form action="login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" requerid>
            <label for="senha">Senha</label>
            <input type="password" id="password" name="senha" requerid>
            <input type="submit" name="login" value="Entrar">
        </form>
    </body>
</html>