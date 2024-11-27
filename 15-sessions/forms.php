<?php
$counter = 0;
// Ziel: Formular verarbeiten
// Frage: woher wissen wir, dass das formular abgesendet wurde?
if(isset($_POST["counter"])) {
    $counter = (int) $_POST["counter"];
    $counter = $counter + 1;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=+, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Counter: <?= $counter ?></h1>
    <form method="post">
        <input type="hidden" name="counter" value="<?= $counter ?>">
        <button>Absenden</button>
    </form>
</body>
</html>