<?php

//definindo váriavéis 

$servername = "localhost";
$database = "php";
$username = "root";
$password = "";
$dbname = "php";

// Criando conexão

$conn = mysqli_connect($servername, $username, $password, $database);

// Checando conexão

if (!$conn) {
    die("Conexão falhou " . mysqli_connect_error());
}
echo "Sucesso na conexão";
mysqli_close($conn);
?>