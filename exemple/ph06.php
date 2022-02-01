<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="ph06.php" method="post">
    <p>paire ou impaire ?<br/> <input type="text" name="nombre" /></p> 
    <p><input type="submit" value="OK"></p>
    </form>
    <?php 
        $nombre=(int)$_POST['nombre'] ;
        $reste = $nombre % 2;
        if($reste==0){
            echo "<li>$nombre est paire</li>";
        }
        else {
            echo "<li>$nombre est impaire</li>";
        }
    ?>
</body>
</html>