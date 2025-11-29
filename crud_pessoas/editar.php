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

// Quando o formulário é enviado
if(isset($_POST['salvar'])){
    $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data_nascimento = $_POST['data_nascimento'];

    $stmt = $mysqli->prepare("UPDATE usuarios SET nome=?, telefone=?, email=?, data_nascimento=? WHERE id=?");
    $stmt->bind_param("ssssi", $nome, $telefone, $email, $data_nascimento, $id);

    if($stmt->execute()){
        header("Location: perfil.php?id=$id"); // volta para o perfil atualizado
        exit;
    } else {
        $erro = "Erro ao atualizar os dados: " . $stmt->error;
    }
    $stmt->close();
}

// Busca os dados atuais do usuário
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
<title>Editar Usuário</title>
<link rel="stylesheet" href="editar.css">
</head>
<body>

<h2>Editar Usuário</h2>

<form method="POST" class="detalhes">
    <label>Nome:</label>
    <input type="text" name="nome" value="<?php echo htmlspecialchars($usuario['nome']); ?>" required>

    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="<?php echo $usuario['data_nascimento']; ?>">

    <div class="botao-container">
        <button type="submit" name="salvar">Salvar</button>
        <a href="perfil.php?id=<?php echo $usuario['id']; ?>"><button type="button" class="editar">Cancelar</button></a>
    </div>

    <?php if(isset($erro)) echo "<p style='color:red; text-align:center;'>$erro</p>"; ?>
</form>

</body>
</html>
