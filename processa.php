<?php
session_start();
include("class/Classes.php");
$mysqli = new mysqli();   

// $nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
// $apelido = mysqli_real_escape_string($mysqli, trim($_POST['apelido']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = mysqli_real_escape_string($mysqli, trim($_POST['senha']));

$sql = "SELECT count(*) as total FROM candidato WHERE email = '$email'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('location: login2.php');
    exit;
}

$sql = "INSERT INTO candidato (nome, apelido, email, senha, foto) VALUES ('$nome', '$apelido', '$email', '$senha', '$foto')";

if($mysqli->query($sql) === TRUE) {
    $_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('location: index-att.php');
exit;
?>