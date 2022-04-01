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

$id = isset($_GET['id']) ? $_GET['id'] : '';
$nom = isset($_POST['nom']) ? $_POST['nom'] : '';
$prenom = isset($_POST['prenom']) ? $_POST['prenom'] : '';
$age = isset($_POST['age']) ? $_POST['age'] : '';
$cp = isset($_POST['cp']) ? $_POST['cp'] : '';
$submit = isset($_POST['submit']);


if($submit){
    $id = $_POST['id'];
    $sql = "update personnes set prenom=:prenom, age=:age, cp=:cp, nom=:nom where id=:id";
    try {
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            ':nom' => $nom,
            ':prenom' => $prenom,
            ':age' => $age,
            ':cp' => $cp,
            ':id' => $id
        ));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
    die("Erreur lors de la requête SQL : ".$ex->getMessage());
    }
    header("location: index.php");
}else {
    try {
        $sql = "select nom, prenom , age , cp from personnes where id=:id";
        $sth = $dbh->prepare($sql);
        $sth->execute(array(
            ':id' => $id
        ));
        $rows = $sth->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $ex) {
        die("<p>Erreur lors de la requête SQL : " . $ex->getMessage() . "</p>");
    }
}
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
</head>
<body>
    <h1>ph30e Meteonet</h1>
    <h2>modification d'une personne</h2>
    <?php
    echo "<p>Veuillez valider la modiffication de l'ID $id SVP</p>";
    foreach ($rows as $row) {
        echo "<form action='supprimer.php' method='POST'>";
        echo "<p><label for='nom'>nom</label> <br>";
        echo "<input type='text' name='nom' placeholder=" . $row["nom"] . "  > <br></p>";
        echo "<p><label for='prenom'>Prenom</label> <br>";
        echo "<input type='text' name='prenom' placeholder=" . $row["prenom"] . "  > <br></p>";
        echo "<p><label for='age'>Age</label> <br>";
        echo "<input type='text' name='age' placeholder=" . $row["age"] . "  > <br></p>";
        echo "<p><label for='cp'>cp</label> <br>";
        echo "<input type='text' name='cp' placeholder=" . $row["cp"] . "> <br></p>";
    }
    ?>
        <div><input name="id" id="id" type="hidden" value="<?php echo $id; ?>" /></div>
        <input type="submit" name="submit" value="modifier">
        <input type="reset" name="reset " value="réinitialiser">
    </form>
    <p>Liste des <a href="index.php">personnes</a></p>
</body>
</html>