<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Análise de String</title>
</head>
<body>
    <h1>Análise de String</h1>
    
    <form method="POST" action="">
        <label>Digite uma palavra ou frase:</label>
        <input type="text" name="texto" required>
        <br><br>
        
        <button type="submit">Analisar</button>
    </form>
    
    <?php
        if ($_POST) {
            $texto = $_POST['texto'];
            
            // Tamanho da string
            $tamanho = strlen($texto);
            
            // Verificar se é palíndromo
            $textoLimpo = strtolower(str_replace(' ', '', $texto));
            $textoInvertido = strrev($textoLimpo);
            $palindromo = ($textoLimpo == $textoInvertido) ? "Sim" : "Não";
            
            // Contar vogais e consoantes
            $vogais = 0;
            $consoantes = 0;
            $textoMinusculo = strtolower($texto);
            
            for ($i = 0; $i < strlen($textoMinusculo); $i++) {
                $letra = $textoMinusculo[$i];
                
                if (ctype_alpha($letra)) {
                    if (in_array($letra, ['a', 'e', 'i', 'o', 'u'])) {
                        $vogais++;
                    } else {
                        $consoantes++;
                    }
                }
            }
            
            // Exibir resultados
            echo "<h2>Resultados:</h2>";
            echo "<p><strong>String informada:</strong> $texto</p>";
            echo "<p><strong>Tamanho:</strong> $tamanho caracteres</p>";
            echo "<p><strong>É palíndromo?</strong> $palindromo</p>";
            echo "<p><strong>Número de vogais:</strong> $vogais</p>";
            echo "<p><strong>Número de consoantes:</strong> $consoantes</p>";
        }
    ?>
</body>
</html>