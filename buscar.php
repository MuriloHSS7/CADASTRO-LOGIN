<?php
    require_once'conexao.php';
    if(isset($_POST['buscar'])){
        $nome = $_POST['nome'];
        try{
            $query = "SELECT * FROM usuarios WHERE nome LIKE :nome";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':nome', '%' . $nome . '%');
            $stmt->execute();
            $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
            if($usuarios){
                echo "<h2>Usuarios encontratos:</h2>";
                foreach($usuarios as $usuarios){
                    echo "ID:" . $usuarios['id'] . "-nome: " . $usuarios['nome'] . "-email:" . $usuarios['email'] . "<br>";
                }
            } else{
                echo"Nenhum usuario encontrado.";
            }
        } catch(PDOException $e){
            echo"Erro: " . $e->getMessage();
        }
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Buscar</title>
    </head>
    <body>
        <h1>Buscar Usuários Cadastrados</h1>
        <form action="buscar.php" method="post">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" requerid><br><br>
            <input type="submit" name="buscar" value="BUSCAR">
        </form>
    </body>
</html>