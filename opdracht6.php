<?php

$user = "root";
$pass = "";

try {
    $dbh = new PDO('mysql:host=localhost;dbname=apen;port=3306', $user, $pass);
} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}


$stmt = $dbh->prepare('SELECT * from aap 
join aap_has_leefgebied on aap.idaap = aap_has_leefgebied.idaap 
join leefgebied on leefgebied.idleefgebied = aap_has_leefgebied.idleefgebied
');
$stmt->execute();
$apen = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>


<!DOCTYPE HTML>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>leefgebied</title>
</head>
<body>
<ul>
    <?php foreach($apen as $aap){ ?>
        <li><?= $aap['soort']; ?>: <?= $aap['omschrijving'];?></li>
    <?php }?>
</ul>
</body>
</html>