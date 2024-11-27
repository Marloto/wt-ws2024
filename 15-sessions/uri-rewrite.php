<?php
$counter = 0;
// Wie können wir auf Query-Teile in der URL reagieren?
if(isset($_GET["counter"])) {
    $counter = (int) $_GET["counter"];
    $counter = $counter + 1;
}
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
    <a href="uri-rewrite.php?counter=<?= $counter ?>">+1</a>
</body>
</html>