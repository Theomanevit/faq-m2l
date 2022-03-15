<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>connextion</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    <a class="accueil">Connexion</a> <br>
    <div>
    <h1>
        M2l
    </h1>
    <table>
        <tr><td><form action="connexion.php" method="post">
    <input type="text" name="pseudo" value="pseudo"/>
    </form></td></tr>
        <tr><td><form action="connexion.php" method="post">
    <input type="text" name="mot de passe" value="mot de passe"/>
    </form></td></tr>
    </table>
    <form action="index.php">
        <input type="submit" value="annuler" />
    </form>
    <form action="accueil2.php">
        <input type="submit" value="valider" />
    </form>
    </div>
</body>
</html>