<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Usuários</title>
    <style>
        table {
            border-collapse: collapse;
            width: 80%;
            margin: 20px auto;
        }
        
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        
        th {
            background-color: #4CAF50;
            color: white;
        }
        
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        
        tr:hover {
            background-color: #ddd;
        }
        
        .mensagem {
            text-align: center;
            color: #888;
            margin: 20px;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Lista de Usuários Cadastrados</h1>
    
    <?php
        // Dados de conexão
        $servidor = "localhost";
        $usuario = "root";
        $senha = "";
        $banco = "meu_sistema";
        
        // Conectar ao banco
        $conexao = mysqli_connect($servidor, $usuario, $senha, $banco);
        
        // Verificar conexão
        if (!$conexao) {
            die("<p style='color: red; text-align: center;'>Erro ao conectar ao banco de dados: " . mysqli_connect_error() . "</p>");
        }
        
        // Consulta SQL
        $sql = "SELECT * FROM usuarios";
        $resultado = mysqli_query($conexao, $sql);
        
        // Verificar se há registros
        if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th>ID</th>";
            echo "<th>Nome</th>";
            echo "<th>E-mail</th>";
            echo "<th>Telefone</th>";
            echo "</tr>";
            
            // Exibir cada registro
            while ($linha = mysqli_fetch_assoc($resultado)) {
                echo "<tr>";
                echo "<td>" . $linha['id'] . "</td>";
                echo "<td>" . $linha['nome'] . "</td>";
                echo "<td>" . $linha['email'] . "</td>";
                echo "<td>" . $linha['telefone'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
        } else {
            echo "<p class='mensagem'>Nenhum usuário cadastrado no sistema.</p>";
        }
        
        // Fechar conexão
        mysqli_close($conexao);
    ?>
    
    <div style="text-align: center; margin-top: 20px;">
        <a href="http://localhost/ListaPHP/atividade-14/cadastro.php">
            <button>Cadastrar Novo Usuário</button>
        </a>
    </div>
</body>
</html>