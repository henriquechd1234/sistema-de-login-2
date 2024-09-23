<?php 
    include('protect.php');
    ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="design.css">
        <title>Logado</title>
    </head>
    <body>
        <!-- <p>Olá, você logou com sucesso</p>
        <p>
            <a href="desconectar.php">Sair</a>
        </p> -->
        <form id="nemsei">
            <p>
                <h3>avaliacao</h3>
                <input type="text" name="" id="avaliacao">
            </p>
            
            <button type="click" id="man"> Enviar</button>
        </form>
        <script src="ava.js"></script>
    </body>
    </html>
  
  
  <?php
    $servername = "localhost";
    $username ="root";
    $password ="" ;
    $dbname ="phpmyadmin";
    $port = "3306";
    
    $conn = new mysqli($servername, $username,$password,$dbname, $port);
    if ($conn->connect_error) {
        die("Conexão falhou: " . $conn->connect_error);
    }
    if(!isset($_SESSION)){
        session_start();
    }
    
    $sql = "SELECT caras.nome, ava.avaliacao
    FROM ava
    JOIN caras ON ava.caras_id = caras.id
    ORDER BY ava.avaliacao DESC
    ";
    $result = $conn->query($sql);
    
    if ($result -> num_rows > 0){
        while($row = $result -> fetch_assoc()){
            echo "<p><strong>" . $row['nome']."</strong> avaliou </p>";
            echo "<p>" . $row['avaliacao'] . "</p>";
            echo "<hr>";
        }
    }
?>