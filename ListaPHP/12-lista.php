<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Análise de Array</title>
</head>
<body>
    <h1>Análise de Números</h1>
    
    <form method="POST" action="">
        <label>Digite os números separados por vírgula:</label>
        <input type="text" name="numeros" placeholder="Ex: 10, 25, 5, 30, 15" required>
        <br><br>
        
        <button type="submit">Analisar</button>
    </form>
    
    <?php
        if ($_POST) {
            $entrada = $_POST['numeros'];
            
            // Converter string em array
            $array = explode(',', $entrada);
            $array = array_map('trim', $array);
            $array = array_map('floatval', $array);
            
            // Calcular soma
            $soma = array_sum($array);
            
            // Encontrar maior número
            $maior = max($array);
            
            // Encontrar menor número
            $menor = min($array);
            
            // Exibir resultados
            echo "<h2>Resultados:</h2>";
            echo "<p><strong>Números informados:</strong> " . implode(', ', $array) . "</p>";
            echo "<p><strong>Soma:</strong> $soma</p>";
            echo "<p><strong>Maior número:</strong> $maior</p>";
            echo "<p><strong>Menor número:</strong> $menor</p>";
        }
    ?>
</body>
</html>