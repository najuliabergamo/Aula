<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="get">
     <label for="inputa">A</label>
     <input type="number" id="inputA">

     <label for="inputaB">B<</label>
     <input type="number" id="inputB" name="b">

     <input type="submit" value="Somar">
     <?php echo $_GET['a']?><br>
     <?php echo $_GET['b']?><br>
     <?php echo $_GET['a']+$_GET['b'];?>
    </form>
    <?php if (isset($_GET['a'])) {?>
    <p>Soma=<?php echo $_GET['a']+$_GET['b']?></p>
    <?php}?>
    
</body>
</html>