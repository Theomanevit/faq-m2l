<?php
session_start();
$submit = isset($_POST['submit']);

if($submit){
    header("location: déconnexion.php");
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>déconnexion</title>
    <link rel="stylesheet" href="css/déco.css">
</head>

<body>

    <div>
        <h1>
            M2l
        </h1>
        <table>
            <tr>
                <td>
                    <h2>Voulez-vous être déconecté</h2>
                    <form action="déco_confirmation.php" method="POST">
                        <button>
                        <a href="accueil2.php">retour</a>
                        </button>
                        <input type="submit" name="submit" value="confirmer">
                    </form>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>