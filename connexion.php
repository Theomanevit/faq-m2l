<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>accueil</title>
    <link rel="stylesheet" href="css/accueil.css">
</head>
<body>
    <h3>Accueil</h3>
    <form action="connexion.php" method="post">
        <input type="submit" value="Connextion" />
        <input type="submit" value="inscription" />
    </form>
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
    <form action="connexion.php">
        <input type="submit" value="annuler" />
        <input type="submit" value="valider" />
    </form>
    </div>
</body>
</html>