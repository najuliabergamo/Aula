<?php
if(!isset($_GET['id'])){
    die("ID do usuário não informado.");
}

$id = $_GET['id'];

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Excluir usuário
$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->close();
$mysqli->close();

// Redirecionar para a lista de usuários
header("Location: ver.php");
exit;
?>
