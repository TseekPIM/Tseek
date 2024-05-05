<?php
session_start();
include("class/Conexao.php");

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$apelido = mysqli_real_escape_string($mysqli, trim($_POST['apelido']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = mysqli_real_escape_string($mysqli, trim($_POST['senha']));
$mysqli = new mysqli();   

$sql = "SELECT count(*) as total FROM candidato WHERE email = '$email'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('location: index-att.php');
    exit;
}

$sql = "INSERT INTO candidato (nome, apelido, email, senha) VALUES ('$nome', '$apelido', '$email', '$senha')";

if($mysqli->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('location: signup2.php');
exit;
?>