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
if (!isset($_SESSION)){
    session_start();
}if (isset ($_SESSION['id'])){
    $id = $_SESSION['id'];
}

else{
    die('Voce não Esta logado');
}

$avaliacao = $_POST ['avaliacao'];

$sql = "INSERT INTO ava (caras_id,avaliacao) VALUES ('$id','$avaliacao')";

if ($conn->query($sql) === TRUE) {
    echo "Avaliação enviada com sucesso!";
} else {
    echo "Erro: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>