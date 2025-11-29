<?php
session_start();

// Verificar se está logado
if (!isset($_SESSION['usuario'])) {
    header('Location: pg1.php');
    exit;
}

$usuario = $_SESSION['usuario'];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Página Principal</title>
</head>
<body>
    <h1>Bem-vindo ao Sistema!</h1>
    
    <p>Olá, <strong><?php echo $usuario; ?></strong>! Você está logado.</p>
    
    <a href="pg3.php">
        <button>Sair</button>
    </a>
</body>
</html>