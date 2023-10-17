<?php


//include de conection
include("conexao.php");

//getting the data with post method
$nome = $_POST['first_name'];
$ultimo_nome = $_POST['last'];
$email = $_POST['email_correct'];
$cidade = $_POST['cityes'];
$estado = $_POST['state'];
$registro = $_POST['registers'];


//inserting into the database

$sql = "INSERT INTO cadastro_func (name, last_name, email, cidade, estado, registro) VALUES
 ('$nome', '$ultimo_nome', '$email', '$cidade', '$estado', $registro)";

 $salvar = mysqli_query($conexao, $sql);

 $linhas = mysqli_affected_rows($conexao);

 mysqli_close($conexao);

?>