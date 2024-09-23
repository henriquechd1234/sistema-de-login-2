<?php 
$usuario = 'root';
$senha = '';
$dbname = 'phpmyadmin';
$port = '3306';
$host = 'localhost';

$conn = new mysqli($host,$usuario,$senha, $dbname, $port);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

if ($mysqli -> error){
    die("ERRO ao se conectar ao banco". $mysqli-> error);
}

$id = 1;
$sql = "SELECT foto FROM filmes WHERE id = $id";

$result = $conn -> query($sql);

if ($result -> num_rows > 0 ){
    $row = $result -> fetch_assoc();
    header("Content-type: image/png");
    header("Conetent-type: image/jpg"); // ou image/png, dependendo do formato
    echo $row['foto'];
} else {
    echo "Imagem não encontrada.";
}



?>