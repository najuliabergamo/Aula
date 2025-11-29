<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Tabuada</title>
</head>
<body>
    <h1>Tabuada</h1>
    
    <form method="POST" action="">
        <label>Digite um número:</label>
        <input type="number" name="numero" required>
        <br><br>
        
        <button type="submit">Gerar Tabuada</button>
    </form>
    
    <?php
        if ($_POST) {
            $numero = $_POST['numero'];
            
            echo "<h2>Tabuada do $numero:</h2>";
            
            for ($i = 1; $i <= 10; $i++) {
                $resultado = $numero * $i;
                echo "$numero x $i = $resultado<br>";
            }
        }
    ?>
</body>
</html>