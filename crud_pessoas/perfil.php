<?php
session_start();

// Conexão com o banco
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Verifica se o id foi passado
if(!isset($_GET['id'])){
    die("ID do usuário não informado.");
}

$id = $_GET['id'];

// Busca o usuário pelo ID
$stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows == 0){
    die("Usuário não encontrado.");
}

$usuario = $result->fetch_assoc();

$stmt->close();
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Perfil do Usuário</title>
<link rel="stylesheet" href="perfil.css"> <!-- mantém o CSS que você já tem -->
</head>
<body>

<h2>Perfil do Usuário</h2>

<div class="detalhes">
    <p><strong>ID:</strong> <?php echo $usuario['id']; ?></p>
    <p><strong>Nome:</strong> <?php echo $usuario['nome']; ?></p>
    <p><strong>Telefone:</strong> <?php echo $usuario['telefone']; ?></p>
    <p><strong>Email:</strong> <?php echo $usuario['email']; ?></p>
    <p><strong>Data de Nascimento:</strong> <?php echo $usuario['data_nascimento']; ?></p>
</div>

<div class="botao-container">
    <a href="ver.php"><button type="button" class="voltar">Voltar</button></a>
    <a href="editar.php?id=<?php echo $usuario['id']; ?>"><button type="button" class="editar">Editar</button></a>
    <a href="excluir.php?id=<?php echo $usuario['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
        <button type="button" class="excluir">Excluir</button>
    </a>
</div> 



</body>
</html>
