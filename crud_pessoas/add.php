<?php
session_start(); 

$mysqli = new mysqli("localhost", "root", "", "crud"); 
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error); 
    // para o script se houver erro na conexão
}

$mensagem = ""; 
// variável que vai armazenar mensagens de sucesso ou erro

// verifica se o formulário foi enviado
if(isset($_POST['adicionar'])){
    $nome = trim($_POST['nome']); 
    $telefone = trim($_POST['telefone']); 
    $email = trim($_POST['email']); 
    $data_nascimento = trim($_POST['data_nascimento']); 
    // remove espaços extras antes e depois do valor digitado

    // prepara a query para inserir o usuário
    $stmt = $mysqli->prepare("INSERT INTO usuarios (nome, telefone, email, data_nascimento) VALUES (?, ?, ?, ?)");
    // ? são os parâmetros que serão substituídos de forma segura
    $stmt->bind_param("ssss", $nome, $telefone, $email, $data_nascimento); 
    // "ssss" indica que todos os 4 parâmetros são strings

    if($stmt->execute()){
        $mensagem = "Usuário adicionado com sucesso!"; 
        // se a execução foi bem-sucedida, mostra mensagem de sucesso
    } else {
        $mensagem = "Erro ao adicionar usuário: " . $stmt->error; 
        // se deu erro mostra qual foi
    }

    $stmt->close(); 
    // fecha o statement para liberar recursos
}

$mysqli->close(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Adicionar Usuário</title>
<link rel="stylesheet" href="add.css"> 
</head>
<body>

<h2>Adicionar Usuário</h2> 

<form method="POST">
    <!-- formulário que envia via POST -->
    <div id="espacoNome">
        <input type="text" name="nome" placeholder="Nome" required><br>
        <!-- campo para nome (obrigatório) -->
    </div>
    <div id="espacoTelefone">
        <input type="text" name="telefone" placeholder="Telefone"><br>
        <!-- campo opcional para telefone -->
    </div>
    <div id="espacoEmail">
        <input type="email" name="email" placeholder="Email"><br>
        <!-- campo opcional para email -->
    </div>
    <div id="espacoNascimento">
        <input type="date" name="data_nascimento" placeholder="Data de Nascimento" required><br>
        <!-- campo obrigatório para data de nascimento -->
    </div>
    <div id="botao">
        <button type="submit" name="adicionar">Adicionar</button>
        <!-- botão que envia o formulário -->
    </div>
</form>

<?php if($mensagem) echo "<p style='color:green; text-align:center;'>$mensagem</p>"; ?>
<!-- mostra mensagem de sucesso ou erro -->

</body>
</html>
