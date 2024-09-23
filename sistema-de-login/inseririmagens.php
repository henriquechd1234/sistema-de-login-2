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
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){

        $titulo = $_POST['titulo'];
        

    }if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
    $imagens = addslashes(file_get_contents($_FILES['foto']['tmp_name']));
    
    $sql = "INSERT INTO filmes (titulo, foto) VALUES ('$titulo','$imagens')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Novo filme inserido com sucesso!";
    } else {
        echo "Erro: " . $sql . "<br>" . $conn->error;
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST" enctype="multipart/form-data">
        <input type="text" name="titulo" id="titulo" required>
    <input type="file" name="foto" id="foto" accept="image/*" required>
<button type="submit">Enviar</button>


    </form>
</body>
</html>

