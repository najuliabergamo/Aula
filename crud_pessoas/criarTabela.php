<?php
// conecta ao banco de dados MySQL
$mysqli = new mysqli("localhost", "root", "", "crud");
// "localhost" = servidor local
// "root" = usuário do MySQL
// "" = senha (vazia)
// "crud" = nome do banco de dados

// verifica se houve erro na conexão
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
    // se houver erro ele interrompe o script e mostra a mensagem
}

// SQL para criar a tabela 'usuarios' se ela não existir
$sql = "CREATE TABLE IF NOT EXISTS usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,  // ID é inteiro, autoincremento, chave primária
    nome VARCHAR(100) NOT NULL,          // Nome é texto obrigatório até 100 caracteres
    telefone VARCHAR(20),                // Telefone é texto opcional até 20 caracteres
    email VARCHAR(150),                  // Email é texto opcional até 150 caracteres
    data_nascimento DATE                 // Data de nascimento do tipo DATE
)";

// executa a query
if($mysqli->query($sql)){
    echo "Tabela criada com sucesso!";
    // mensagem se a tabela foi criada corretamente
} else {
    echo "Erro: " . $mysqli->error;
    // mensagem se houver algum erro ao criar a tabela
}

// fecha a conexão com o banco de dados
$mysqli->close();
?>
