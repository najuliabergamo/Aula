<?php
session_start();

// Se já estiver logado, redireciona para a página principal
if (isset($_SESSION['usuario'])) {
    header('Location: pg2.php');
    exit;
}

// Verificar login
$erro = '';
if ($_POST) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    
    // Validar credenciais
    if ($usuario == 'admin' && $senha == '1234') {
        $_SESSION['usuario'] = $usuario;
        header('Location: pg2.php');
        exit;
    } else {
        $erro = 'Usuário ou senha incorretos!';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Sistema de Login</h1>
    
    <?php if ($erro): ?>
        <p style="color: red;"><?php echo $erro; ?></p>
    <?php endif; ?>
    
    <form method="POST" action="">
        <label>Usuário:</label>
        <input type="text" name="usuario" required>
        <br><br>
        
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <br><br>
        
        <button type="submit">Entrar</button>
    </form>
    
    <p><small>Usuário: admin | Senha: 1234</small></p>
</body>
</html>