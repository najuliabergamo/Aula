//<?php ... ?> - Tag padrão para abrir e fechar código PHP
//<?= ... ?> - Tag curta para exibir valores (equivale a echo)

<!DOCTYPE html>
<html>
<head>
    <title>Exemplo PHP</title>
</head>
<body>
    <h1>Meu primeiro código PHP</h1>
    
    <?php
        $nome = "João";
        $idade = 20;
        
        echo "Olá, meu nome é $nome";
        echo "<br>";
        echo "Tenho $idade anos";
    ?>
    
    <p>Usando a tag curta: <?= $nome ?></p>
    
</body>
</html>