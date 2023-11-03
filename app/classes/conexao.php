<?php

$hostname = "localhost";
$dbname = "dbponto";
$username = "root";
$senha = "";

// Criar uma conexão
$mysqli = new mysqli($hostname, $username, $senha, $dbname);

// Verificar a conexão

if ($mysqli->connect_error) {
    $mysqli -> connect_error;
} 
?>