<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuários</title>
</head>
<body>
    <h1>Cadastro de Usuários</h1>
    
    <form method="POST" action="">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <br><br>
        
        <label>E-mail:</label>
        <input type="email" name="email" required>
        <br><br>
        
        <label>Telefone:</label>
        <input type="text" name="telefone" required>
        <br><br>
        
        <button type="submit" name="cadastrar">Cadastrar</button>
    </form>
    
    <?php
        if (isset($_POST['cadastrar'])) {
            // Dados de conexão
            $servidor = "localhost";
            $usuario = "root";
            $senha = "";
            $banco = "meu_sistema";
            
            // Conectar ao banco
            $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
            
            // Verificar conexão
            if (!$conexao) {
                die("<p style='color: red;'>Erro ao conectar ao banco de dados: " . mysqli_connect_error() . "</p>");
            }
            
            // Receber dados do formulário
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $telefone = $_POST['telefone'];
            
            // Inserir no banco
            $sql = "INSERT INTO usuarios (nome, email, telefone) VALUES ('$nome', '$email', '$telefone')";
            
            if (mysqli_query($conexao, $sql)) {
                echo "<p style='color: green;'>Usuário cadastrado com sucesso!</p>";
            } else {
                echo "<p style='color: red;'>Erro ao cadastrar: " . mysqli_error($conexao) . "</p>";
            }
            
            // Fechar conexão
            mysqli_close($conexao);
        }
    ?>
</body>
</html>