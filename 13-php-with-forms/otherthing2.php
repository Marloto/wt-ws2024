<!DOCTYPE html>
<html>
<body>
<form method="post" action="morething.php">
<input name="test" value="42">
<button>Absenden</button>
</form>
<?php var_dump($_GET); ?>
<?php var_dump($_POST); ?>
<?php echo $_POST["test"]; ?>
</body>
</html>