<!DOCTYPE html>
<html lang="en">
<head>
 <title>Document</title>
</head>
<body>
    <?php
    function hello($name) {
    ?>
        <b><?php echo "Hello, $name"; ?></b>
    <?php
    }
    error_log("Test");
    ?>
    <p><?php hello("world1"); ?></p>
    <p><?php hello("world2"); ?></p>
    <p><?php hello("world3"); ?></p>
</body>
</html>