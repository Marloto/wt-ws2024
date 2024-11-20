<!DOCTYPE html>
<html>
<body>
<form method="get">
<input name="test" value="42">
<button>Absenden</button>
</form>
<?php var_dump($_GET); ?>
<?php echo $_GET["test"]; ?>
</body>
</html>
<!-- Beim laden der Seite http://localhost:8181/13-php-with-forms/otherthing.php wird die komplette Seite
 verarbeitet / php generiert, z.B. versucht den Wert in $_GET["test"] auszugeben -->
<!-- $_GET enthält all das was teil des Query ist, vgl. .../otherthing.php?test=abc&... -->