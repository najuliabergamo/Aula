<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dados Físicos - Página 2</title>
</head>
<body>
    <h1>Cálculo de IMC - Página 2</h1>
    <h2>Informe seus dados físicos</h2>
    
    <?php
        if (isset($_GET['nome']) && isset($_GET['email'])) {
            $nome = $_GET['nome'];
            $email = $_GET['email'];
        } else {
            echo "<p>Erro: Acesse pela página 1.</p>";
            echo "<a href='pagina1.php'>Voltar</a>";
            exit;
        }
    ?>
    
    <form method="POST" action="pg3.php">
        <input type="hidden" name="nome" value="<?php echo $nome; ?>">
        <input type="hidden" name="email" value="<?php echo $email; ?>">
        
        <label>Peso (kg):</label>
        <input type="number" step="0.01" name="peso" required>
        <br><br>
        
        <label>Altura (m):</label>
        <input type="number" step="0.01" name="altura" required>
        <br><br>
        
        <button type="submit">Calcular IMC</button>
    </form>
</body>
</html>