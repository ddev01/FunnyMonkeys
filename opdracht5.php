<?php

$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=apen;port=3306', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}

if(isset($_GET['idleefgebied'])){
    $insert = "INSERT INTO leefgebied (idleefgebied, omschrijving) VALUES (:idleefgebied, :omschrijving)";
    $stmt = $dbh->prepare($insert);
    $stmt->execute(array(':idleefgebied' => $_GET['idleefgebied'], ':omschrijving' => $_GET['omschrijving']));
}

$stmt = $dbh->prepare('SELECT * from leefgebied');
$stmt->execute();
$leefgebieden = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>leefgebied</title>
</head>
<body>
<form>
    Voeg een leefgebied toe: <br>
    Leefgebied ID: <input type="number" name="idleefgebied"><br>
    Omschrijving: <input type="text" name="omschrijving"><br>
    <input type="submit" name="verzend">
</form>
<ul>
    <?php foreach($leefgebieden as $leefgebied){ ?>
        <li><?= $leefgebied['omschrijving']; ?></li>
    <?php }?>
</ul>
</body>
</html>