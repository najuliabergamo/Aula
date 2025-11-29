<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Par ou Ímpar</title>
</head>
<body>
    <h1>Verificar Par ou Ímpar</h1>
    
    <form method="POST" action="">
        <label>Digite um número:</label>
        <input type="number" name="numero" required>
        <br><br>
        
        <button type="submit">Verificar</button>
    </form>
    
    <?php
        if ($_POST) {
            $numero = $_POST['numero'];
            
            if ($numero % 2 == 0) {
                $resultado = "Par";
            } else {
                $resultado = "Ímpar";
            }
            
            echo "<h2>Número informado: $numero</h2>";
            echo "<h2>Resultado: $resultado</h2>";
        }
    ?>
</body>
</html>