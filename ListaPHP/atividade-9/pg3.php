<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resultado - Página 3</title>
</head>
<body>
    <h1>Resultado do Cálculo de IMC</h1>
    
    <?php
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        
        $imc = $peso / ($altura * $altura);
        $imcFormatado = number_format($imc, 2, ',', '.');
        
        echo "<h2>Dados do Usuário:</h2>";
        echo "<p><strong>Nome:</strong> $nome</p>";
        echo "<p><strong>E-mail:</strong> $email</p>";
        echo "<p><strong>Peso:</strong> $peso kg</p>";
        echo "<p><strong>Altura:</strong> $altura m</p>";
        echo "<h2><strong>IMC:</strong> $imcFormatado</h2>";
    ?>
    
    <br>
    <a href="pg1.php">Calcular novamente</a>
</body>
</html>