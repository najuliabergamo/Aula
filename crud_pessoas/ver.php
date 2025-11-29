<?php
// conecta com o bd
$mysqli = new mysqli("localhost", "root", "", "crud"); 
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error); 
    // se não conseguir conectar o script para aqui e mostra o erro
}

// variavel para guardar oq foi pesquisado
$pesquisa = "";

// verifica se foi digitado algo na barra de pesquisa
if(isset($_GET['pesquisa'])){ 
    $pesquisa = $_GET['pesquisa']; // pega o valor digitado
    $sql = "SELECT * FROM usuarios WHERE nome LIKE ?"; // Query para buscar nomes parecidos
    $stmt = $mysqli->prepare($sql); // prepara a consulta para segurança (evita SQL Injection)
    $search = "%$pesquisa%"; // adiciona "%" para buscar qualquer parte do nome
    $stmt->bind_param("s", $search); // passa o parâmetro para a query
    $stmt->execute(); // executa a consulta
    $result = $stmt->get_result(); // pega o resultado da consulta
} else {
    $result = $mysqli->query("SELECT * FROM usuarios"); 
    // se não pesquisou, pega todos os usuários
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Visualizar Usuários</title>
<link rel="stylesheet" href="ver.css"> 
</head>
<body>

<h2>Lista de Usuários</h2> 

<!-- barra superior com pesquisa e botão de adicionar -->
<div class="top-bar">
    <form method="GET" class="search-form"> <!-- formulário que envia via GET -->
        <input type="text" name="pesquisa" placeholder="Pesquisar por nome" 
               value="<?php echo htmlspecialchars($pesquisa); ?>">
        <!-- campo de pesquisa que mantém o valor digitado -->
        <button type="submit">Pesquisar</button> <!-- botão de pesquisa -->
    </form>
    
    <a href="add.php"><button type="button">Adicionar Usuário</button></a>
    <!-- botão para ir para a tela de adicionar usuário -->
</div>

<!-- tabela que mostra os usuários -->
<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Email</th>
    <th>Data de Nascimento</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?> 
<!-- enquanto houver usuários no resultado, cria uma linha na tabela -->
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="perfil.php?id=<?php echo $row['id']; ?>">
        <?php echo $row['nome']; ?></a>
    </td>
    <!--  nome é um link que leva ao perfil do usuário passando o ID -->
    <td><?php echo $row['telefone']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['data_nascimento']; ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>

<?php
if(isset($stmt)) $stmt->close(); // fecha o statement se foi usado (quando pesquisou)
$mysqli->close(); // Fecha a conexão com o banco
?>
