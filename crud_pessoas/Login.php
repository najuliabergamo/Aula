<?php
session_start();

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Quando o formulário é enviado
if(isset($_POST['login'])){
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];

    $stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE nome = ? AND data_nascimento = ?");
    $stmt->bind_param("ss", $nome, $senha);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows > 0){
        $_SESSION['logado'] = true;
        $_SESSION['nome_usuario'] = $nome;
        header("Location: ver.php");
        exit; // ESSENCIAL
    } else {
        $erro = "Nome ou senha incorretos!";
    }

    $stmt->close();
}

$mysqli->close();
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

<form method="POST">
    <div id="espacoNome">
        <input type="text" name="nome" placeholder="Nome Completo" required><br>
    </div>
    <div id="espacoSenha">
        <input type="password" name="senha" placeholder="Senha (YYYY-MM-DD)" required><br>
    </div>
    <div id="botao">
        <button type="submit" name="login">Entrar</button>
    </div>
</form>

<?php if(isset($erro)) echo "<p style='color:red; text-align:center;'>$erro</p>"; ?>

</body>
</html>
