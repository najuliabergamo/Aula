<?php
session_start(); // poder guardar informações do usuário enquanto ele estiver logado.

// Conecta com o bd
$mysqli = new mysqli("localhost", "root", "", "crud"); 
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error); // se der erro na conexão interrompe o script e mostra a mensagem
}

// Quando o usuario preenche
if(isset($_POST['login'])){ // verifica se o botão de login foi apertado
    $nome = $_POST['nome']; // pega o valor do campo 'nome'
    $senha = $_POST['senha']; // pega o valor do campo 'senha' (que é a data de nascimento)

    // prepara a consulta para evitar SQL Injection
    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE nome = ? AND data_nascimento = ?"); 
    $stmt->bind_param("ss", $nome, $senha); // "ss" significa duas strings
    $stmt->execute(); // executa a consulta
    $result = $stmt->get_result(); // pega o resultado da consulta

    if($result->num_rows > 0){ // se encontrou algum usuário com nome e senha corretos
        $_SESSION['logado'] = true; // marca o usuário como logado
        $_SESSION['nome_usuario'] = $nome; // guarda o nome na sessão
        header("Location: ver.php"); // redireciona para a página de visualização de usuários
        exit; // interrompe o script após o redirecionamento
    } else {
        $erro = "Nome ou senha incorretos!"; // mensagem de erro se não encontrar
    }

    $stmt->close(); // fecha o statement
}

$mysqli->close(); // fecha a conexão com o banco
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login de Usuários</title>
    <link rel="stylesheet" href="Login.css"> 
</head>
<body>
<h2>Login de Usuários</h2> 

<form method="POST"> <!-- Formulário que envia os dados via POST -->
    <div id="espacoNome">
        <input type="text" name="nome" placeholder="Nome Completo" required><br>
        <!-- Campo de texto para o nome do usuário, obrigatório -->
    </div>

    <div id="espacoSenha">
        <input type="password" name="senha" placeholder="Senha (YYYY-MM-DD)" required><br>
        <!-- Campo de senha -->
    </div>

    <div id="botao">
        <button type="submit" name="login">Entrar</button> 
        <!-- botão de envio com o nome 'login' que é verificado no PHP -->
    </div>
</form>

<?php if(isset($erro)) echo "<p style='color:red; text-align:center;'>$erro</p>"; ?> 
<!-- Se a variável $erro existir, exibe uma mensagem de erro -->

</body>
</html>
