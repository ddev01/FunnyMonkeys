<?php
$apen[] = "Baviaan";
$apen[] = "Guereza";
$apen[] = "Langoer";
$apen[] = "Tamarin";
$apen[] = "Neusaap";
$apen[] = "Halfaap";
$apen[] = "Mandril";
$apen[] = "Oeakari";
$apen[] = "Faunaap";
$apen[] = "Hoelman";
$apen[] = "Meerkat";
$apen[] = "Oormaki";
$apen[] = "Gorilla";
$apen[] = "Kuifaap";
$apen[] = "Mensaap";
$apen[] = "Spinaap";
?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" type="text/css" href="styles/main.css"/>
<head>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&display=swap" rel="stylesheet">
    <title>FunnyMonkeys</title>
</head>
<body>
<img src="img/monkey-business.jpg" alt="Monkey logo">
<h3>Select your funny monkey!</h3>
<img src="img/monkey_swings.png" alt="Monkey die aan streep hangt">
<br>
<?php foreach($apen as $aap) { ?>
    <a href="https://www.google.nl/search?q=<?= $aap; ?>&tbm=isch" target="_blank"><?= $aap; ?></a><br>
<?php } ?>
</body>
</html>