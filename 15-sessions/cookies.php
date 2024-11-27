<?php
$counter = 0;

if(isset($_COOKIE["counter"])) {
    $counter = (int) $_COOKIE["counter"];
    $counter = $counter + 1;
}

setcookie("counter", $counter);
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
    <a href="otherside.php">Link</a>
</body>
</html>