<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Intervalo de Números</title>
    <style>
        .numero {
            background-color: #3498db;
            color: white;
            padding: 10px 15px;
            margin: 5px;
            border-radius: 5px;
            display: inline-block;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h1>Exibir Intervalo de Números</h1>
    
    <form method="POST" action="">
        <label>Número inicial:</label>
        <input type="number" name="inicio" required>
        <br><br>
        
        <label>Número final:</label>
        <input type="number" name="fim" required>
        <br><br>
        
        <button type="submit">Gerar Intervalo</button>
    </form>
    
    <?php
        if ($_POST) {
            $inicio = $_POST['inicio'];
            $fim = $_POST['fim'];
            
            echo "<h2>Números no intervalo de $inicio até $fim:</h2>";
            
            for ($i = $inicio; $i <= $fim; $i++) {
                echo "<span class='numero'>$i</span>";
            }
        }
    ?>
</body>
</html>