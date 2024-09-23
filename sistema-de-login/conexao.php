<?php
$usuario = 'root';
$senha = '';
$dbname = 'phpmyadmin';
$port = '3306';
$host = 'localhost';

$mysqli = new mysqli($host,$usuario,$senha, $dbname, $port);

if ($mysqli -> error){
    die("ERRO ao se conectar ao banco". $mysqli-> error);
}
?>