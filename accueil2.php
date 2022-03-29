<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil2</title>
    <link rel="stylesheet" href="css/accueil2.css">
</head>

<body>
    <?php
        if(isset($_SESSION['pseudo_uti'])){
        echo "<header>";
        echo "<nav>";
        echo "<a class='accueil'>";
        echo "Accueil";
        echo "</a>";
        echo "<a href='déconnexion.php' class='droite2'><img src='img/log_out.png' /></a>";
        echo "<a href='profil_utilisateur.php' class='droite2'><img src='img/personne.png' /></a>";
        echo "<a href='questions.php' class='droite'>Foire aux questions</a>";
        echo "</nav>";
        echo "</header>";
        echo "<br><div><h1>M2l</h1></div>";
        }
        else {
            echo '<p> Désolé mais vous ne pouvez pas accèder à cette page! </p>';
            echo 'Se <a href="connexion.php">connecter</a></p>';
        }
    ?>
</body>

</html>