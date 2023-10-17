<?php

//connecting to database

$hostname = 'localhost';
$user = 'root';
$password = '';
$database = 'cadastro_equipamentos';
$conexao = mysqli_connect($hostname,$user,$password,$database);

if (!$conexao) {
    print "falha na conexão com o banco de dados";
}

?>