









<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>inscription</title>
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <header>
        <nav>
            <a class="accueil">
                Inscription
            </a>
        </nav>
    </header>

    <div>
        <h1>M2l</h1>

        <table>
            <tr>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="text" name="pseudo" placeholder="pseudo" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="text" name="adresse email" placeholder="adresse email" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="inscription.php" method="post">
                        <input type="password" name="mot de passe" placeholder="mot de passe" />
                    </form>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="inscription.php" method="post" style="width:0px;">
                        <select name="choix de ligue" id="ligue">
                            <option value="">------------------------------------</option>
                            <option value="ligue1">ligue1</option>
                            <option value="ligue2">ligue2</option>
                            <option value="ligue3">ligue3</option>
                            <option value="ligue4">ligue4</option>
                        </select>
                    </form>
                </td>
            </tr>
        </table>
        <table>
            <tr>
                <td>
                    <form action="index.php" method="post">
                        <input type="submit" value="annuler" />
                    </form>
                </td>
                <td>
                    <form action="accueil2.php" method="post">
                        <input type="submit" value="valider" />
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>