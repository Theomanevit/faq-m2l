<?php
$dsn = 'mysql:host=localhost;dbname=meteonet'; // contient le nom du serveur et de
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $ex) {
    die("Erreur lors de la connexion SQL : " . $ex->getMessage());
}
$sql = "select * from personnes";
try {
    $sth = $dbh->prepare($sql);
    $sth->execute(array());
    $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $ex) {
    die("Erreur lors de la requête SQL : " . $ex->getMessage());
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ph30c</title>
    <link rel="stylesheet" href="css/styles.css">
</head>

<body>
    <h1>ph30c Meteonet</h1>
    <?php
    if (count($rows) > 0) {
        echo "<table> <tr> <th>nom</th><th>prenom</th><th>age</th><th>cp</th><th>&nbsp;</th><th>&nbsp;</th> </tr>";
        foreach ($rows as $row) {
            echo '<tr>';
            echo '<td>' . $row['nom'] . '</td>';
            echo '<td>' . $row['prenom'] . '</td>';
            echo '<td>' . $row['age'] . '</td>';
            echo '<td>' . $row['cp'] . '</td>';
            echo '<td><a href="modifier.php?id=' . $row['id'] . '">Modifier</a></td>';
            echo '<td><a href="supprimer.php?id=' . $row['id'] . '">Supprimer</a></td>';
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Rien à afficher</p>";
    }
    echo "<br>" . count($rows) . " personne(s)";
    ?>
    <p><a href="ajouter.php">Ajouter</a> une personne</p>
    <p>Liste des personnes par <a href="commune.php">commune</a></p>
</body>

</html>