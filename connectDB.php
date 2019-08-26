<?php
//DADOS PARA CONEXÃO COM O BANCO DE DADOS
$hostname = "localhost";
$user = "root";
$pass = "";
$dbname = "imagesdb";
//CONEXÃO
$conn = mysqli_connect($hostname, $user, $pass, $dbname) or die (mysqli_error($conn));

?>