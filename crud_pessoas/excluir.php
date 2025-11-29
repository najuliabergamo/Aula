<?php
if(!isset($_GET['id'])){ // verifica se o parâmetro 'id' foi passado na URL.
    die("ID do usuário não informado."); // interrompe o script se não houver ID.
}

$id = $_GET['id']; // armazena o ID do usuário a ser excluído.

$mysqli = new mysqli("localhost", "root", "", "crud"); // conecta ao banco de dados 'crud' usando usuário 'root' sem senha.
if ($mysqli->connect_errno) { // verifica se houve erro na conexão.
    die("Falha na conexão: " . $mysqli->connect_error); // interrompe o script em caso de erro de conexão.
}

$stmt = $mysqli->prepare("DELETE FROM usuarios WHERE id = ?"); 
// prepara a query SQL para excluir o usuário com base no ID, evitando SQL Injection.
$stmt->bind_param("i", $id); 
// associa o ID do usuário ao parâmetro da query (i = integer).
$stmt->execute(); 
// executa a query para excluir o usuário.
$stmt->close(); 
// fecha o statement.
$mysqli->close(); 
// fecha a conexão com o banco.

header("Location: ver.php"); 
// redireciona o usuário de volta para a lista de usuários após a exclusão.
exit; 
// para a execução do script, garantindo que o redirecionamento ocorra imediatamente.
?>
