<?php

$usuario = 'root';
$senha = '';
$database ='tseek';
$host = 'localhost';

$mysqli = new mysqli($host, $usuario, $senha, $database);

if ($mysqli-> error) {
    die("Falha ao conectar o banco: " .$mysqli->error);
}

?>

