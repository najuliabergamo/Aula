    <!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Sorteio de Número</title>
</head>
<body>
    <h1>Sorteio de Número Aleatório</h1>
    
    <form method="POST" action="">
        <label>Número mínimo:</label>
        <input type="number" name="minimo" required>
        <br><br>
        
        <label>Número máximo:</label>
        <input type="number" name="maximo" required>
        <br><br>
        
        <button type="submit">Sortear</button>
    </form>
    
    <?php
        if ($_POST) {
            $minimo = $_POST['minimo'];
            $maximo = $_POST['maximo'];
            
            $numeroSorteado = rand($minimo, $maximo);
            
            echo "<h2>Número sorteado: $numeroSorteado</h2>";
        }
    ?>
</body>
</html>