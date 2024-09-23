<?php 
 
 $servername = "localhost";
 $username ="root";
 $password ="" ;
 $dbname ="phpmyadmin";
 $port = "3306";
 
 $conn = new mysqli($servername, $username, $password, $dbname, $port);
 if ($conn->connect_error) {
     die("Conexão falhou: " . $conn->connect_error);
 }
 
 $nome = $_POST ['nome'];
 $email = $_POST ['email'];
 $senha = $_POST ['senha'];
 
 
 $sql = "INSERT INTO caras (nome, email, senha) VALUES ('$nome', '$email', '$senha')";
 
 if ($conn->query($sql) === TRUE) {
     echo "foi";
 } else {
     echo "Erro: " . $sql . "<br>" . $conn->error;
 }
 
 $conn->close();
 
 ?>