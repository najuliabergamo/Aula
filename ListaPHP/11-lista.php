<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Classificação de Triângulo</title>
</head>
<body>
    <h1>Classificação de Triângulo</h1>
    
    <form method="POST" action="">
        <label>Lado 1:</label>
        <input type="number" step="0.01" name="lado1" required>
        <br><br>
        
        <label>Lado 2:</label>
        <input type="number" step="0.01" name="lado2" required>
        <br><br>
        
        <label>Lado 3:</label>
        <input type="number" step="0.01" name="lado3" required>
        <br><br>
        
        <button type="submit">Classificar</button>
    </form>
    
    <?php
        if ($_POST) {
            $lado1 = $_POST['lado1'];
            $lado2 = $_POST['lado2'];
            $lado3 = $_POST['lado3'];
            
            // Verificar se pode formar um triângulo
            if ($lado1 + $lado2 > $lado3 && $lado1 + $lado3 > $lado2 && $lado2 + $lado3 > $lado1) {
                echo "<h2>Os lados informados formam um triângulo!</h2>";
                
                // Classificar o triângulo
                if ($lado1 == $lado2 && $lado2 == $lado3) {
                    echo "<p><strong>Classificação:</strong> Triângulo Equilátero</p>";
                } elseif ($lado1 == $lado2 || $lado1 == $lado3 || $lado2 == $lado3) {
                    echo "<p><strong>Classificação:</strong> Triângulo Isósceles</p>";
                } else {
                    echo "<p><strong>Classificação:</strong> Triângulo Escaleno</p>";
                }
            } else {
                echo "<h2>Os lados informados NÃO formam um triângulo!</h2>";
            }
        }
    ?>
</body>
</html>