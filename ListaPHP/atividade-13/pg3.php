<?php
session_start();

// Destruir a sessão
session_destroy();

// Redirecionar para o login
header('Location: pg1.php');
exit;
?>