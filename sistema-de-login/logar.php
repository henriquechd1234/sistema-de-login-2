<?php 
include ('conexao.php');

if (isset ($_POST['email']) ||  isset ($_POST['senha'] )){
    if ( strlen ($_POST['email'] )== 0){
        echo ("Preencha o seu email");
    }else if ( strlen($_POST['senha'])==0){
        echo ("Preencha a sya senha");
    }
    else {
        $email = $mysqli ->real_escape_string($_POST['email']);
        $senha = $mysqli -> real_escape_string($_POST['senha']);

        $sql_code ="SELECT * FROM caras WHERE email = '$email' AND senha = '$senha'";
        $sql_query = $mysqli-> query($sql_code) or die ("Falha na execução". $mysqli->error);

        $quantidade = $sql_query -> num_rows;

        if ($quantidade == 1 ){
           $caras = $sql_query -> fetch_assoc();
           
           if (!isset($_SESSION) ){
            session_start();
           }

           $_SESSION ['id'] = $caras['id'];
           $_SESSION['nome'] = $caras['nome'];

           header("Location: painel.php");
        }else {
            echo('Nenhum usuario encontrado');
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="logar.css">
    <title>Entre na sua conta</title>
</head>
<body>
    <form action="" method="POST">
        <p>
            <label>Digite Seu email</label>
            <input type="email" name="email" id="email" placeholder="email">
        </p>
        <p>
            <label>Digite Sua senha</label>
            <input type="password" name="senha" id="senha" placeholder="Senha">
        </p>
        <button type="submit">Entrar</button>
    </form>
    <p>
        <a href="criar.php" id="criar_conta">Crie uma</a>
    </p>
</body>
</html>