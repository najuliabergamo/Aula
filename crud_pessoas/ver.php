<?php
$mysqli = new mysqli("localhost", "root", "", "crud");
if ($mysqli->connect_errno) {
    die("Falha na conexão: " . $mysqli->connect_error);
}

// Pesquisa
$pesquisa = "";
if(isset($_GET['pesquisa'])){
    $pesquisa = $_GET['pesquisa'];
    $sql = "SELECT * FROM usuarios WHERE nome LIKE ?";
    $stmt = $mysqli->prepare($sql);
    $search = "%$pesquisa%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    $result = $mysqli->query("SELECT * FROM usuarios");
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

<div class="top-bar">
    <form method="GET" class="search-form">
        <input type="text" name="pesquisa" placeholder="Pesquisar por nome" value="<?php echo htmlspecialchars($pesquisa); ?>">
        <button type="submit">Pesquisar</button>
    </form>
    
    <a href="add.php"><button type="button">Adicionar Usuário</button></a>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Nome</th>
    <th>Telefone</th>
    <th>Email</th>
    <th>Data de Nascimento</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?php echo $row['id']; ?></td>
    <td><a href="perfil.php?id=<?php echo $row['id']; ?>"><?php echo $row['nome']; ?></a></td>
    <td><?php echo $row['telefone']; ?></td>
    <td><?php echo $row['email']; ?></td>
    <td><?php echo $row['data_nascimento']; ?></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>

<?php
if(isset($stmt)) $stmt->close();
$mysqli->close();
?>
