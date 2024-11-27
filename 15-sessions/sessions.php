<?php
$counter = 0;

// Wenn kein Cookie kein vorhanden, dann neue Session ID erzeugen, leeres $_SESSION-Array bereitstellen
// Wenn ein Cookie vorhanden, stand vom letzten mal laden in in $_SESSION-Array bereitstellen 
session_start();

if(isset($_SESSION["counter"])) {
    $counter = (int) $_SESSION["counter"];
    $counter = $counter + 1;
}
$_SESSION["counter"] = $counter;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Counter: <?= $counter ?></h1>
    <?php var_dump($_SESSION); ?>
</body>
</html>