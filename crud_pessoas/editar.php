<?php
session_start();
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_errno) { // verifica se houve erro na conexão.
    die("Falha na conexão: " . $mysqli->connect_error); // interrompe o script em caso de erro de conexão.
}

if(!isset($_GET['id'])){ // verifica se o parâmetro 'id' foi passado na URL.
    die("ID do usuário não informado."); // interrompe o script se não houver 'id'.
}

$id = $_GET['id']; // armazena o 'id' do usuário a ser editado.

if(isset($_POST['salvar'])){ // verifica se o botão 'Salvar' foi clicado.
    $nome = $_POST['nome']; // recebe o valor do campo nome do formulário.
    $telefone = $_POST['telefone']; // recebe o valor do campo telefone.
    $email = $_POST['email']; // recebe o valor do campo email.
    $data_nascimento = $_POST['data_nascimento']; // recebe o valor do campo data de nascimento.

    $stmt = $mysqli->prepare("UPDATE usuarios SET nome=?, telefone=?, email=?, data_nascimento=? WHERE id=?"); 
    // prepara a query SQL para atualizar o usuário, usando parâmetros para evitar SQL Injection.
    $stmt->bind_param("ssssi", $nome, $telefone, $email, $data_nascimento, $id); 
    // associa as variáveis aos parâmetros da query (ssssi = string, string, string, string, inteiro).

    if($stmt->execute()){ // executa a query.
        header("Location: perfil.php?id=$id"); // se funcionar, redireciona para a página do perfil atualizado.
        exit; // para a execução do script após o redirecionamento.
    } else {
        $erro = "Erro ao atualizar os dados: " . $stmt->error; // se der erro, armazena a mensagem.
    }
    $stmt->close(); // fecha o statement.
}

$stmt = $mysqli->prepare("SELECT * FROM usuarios WHERE id = ?"); 
// prepara a query para buscar os dados atuais do usuário.
$stmt->bind_param("i", $id); // associa o ID ao parâmetro da query.
$stmt->execute(); // executa a query.
$result = $stmt->get_result(); // obtem o resultado.

if($result->num_rows == 0){ // verifica se o usuário existe.
    die("Usuário não encontrado."); // se não existir interrompe o script.
}

$usuario = $result->fetch_assoc(); // armazena os dados do usuário em um array associativo.
$stmt->close(); // fecha o statement.
$mysqli->close(); // fecha a conexão com o banco.
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
    <!-- preenche o campo nome com o valor atual do usuário usando htmlspecialchars para segurança -->

    <label>Telefone:</label>
    <input type="text" name="telefone" value="<?php echo htmlspecialchars($usuario['telefone']); ?>">
    <!-- preenche o campo telefone com o valor atual -->

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>">
    <!-- preenche o campo email com o valor atual -->

    <label>Data de Nascimento:</label>
    <input type="date" name="data_nascimento" value="<?php echo $usuario['data_nascimento']; ?>">
    <!-- preenche o campo data de nascimento -->

    <div class="botao-container">
        <button type="submit" name="salvar">Salvar</button>
        <a href="perfil.php?id=<?php echo $usuario['id']; ?>">
            <button type="button" class="editar">Cancelar</button>
        </a>
        <!-- botões Salvar envia o formulário para atualizar os dados e Cancelar retorna para o perfil sem alterar nada -->
    </div>

    <?php if(isset($erro)) echo "<p style='color:red; text-align:center;'>$erro</p>"; ?>
    <!-- exibe mensagem de erro caso exista -->
</form>

</body>
</html>
