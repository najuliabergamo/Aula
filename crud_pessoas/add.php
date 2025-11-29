<?php
session_start();

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

$mensagem = "";

if(isset($_POST['adicionar'])){
    $nome = trim($_POST['nome']);
    $telefone = trim($_POST['telefone']);
    $email = trim($_POST['email']);
    $data_nascimento = trim($_POST['data_nascimento']);

    // Insere no banco
    $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, telefone, email, data_nascimento) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nome, $telefone, $email, $data_nascimento);

    if($stmt->execute()){
        $mensagem = "Usuário adicionado com sucesso!";
    } else {
        $mensagem = "Erro ao adicionar usuário: " . $stmt->error;
    }

    $stmt->close();
}

$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Adicionar Usuário</title>
<link rel="stylesheet" href="add.css"> <!-- usa o CSS da lista de usuários -->
</head>
<body>

<h2>Adicionar Usuário</h2>

<form method="POST">
    <div id="espacoNome">
        <input type="text" name="nome" placeholder="Nome" required><br>
    </div>
    <div id="espacoTelefone">
        <input type="text" name="telefone" placeholder="Telefone"><br>
    </div>
    <div id="espacoEmail">
        <input type="email" name="email" placeholder="Email"><br>
    </div>
    <div id="espacoNascimento">
        <input type="date" name="data_nascimento" placeholder="Data de Nascimento" required><br>
    </div>
    <div id="botao">
        <button type="submit" name="adicionar">Adicionar</button>
    </div>
</form>

<?php if($mensagem) echo "<p style='color:green; text-align:center;'>$mensagem</p>"; ?>

</body>
</html>
