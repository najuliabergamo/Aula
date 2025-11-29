<?php
$mysqli = new mysqli("localhost", "root", "", "crud");

if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(150),
    data_nascimento DATE
)";

if($mysqli->query($sql)){
    echo "Tabela criada com sucesso!";
} else {
    echo "Erro: " . $mysqli->error;
}

$mysqli->close();
?>
