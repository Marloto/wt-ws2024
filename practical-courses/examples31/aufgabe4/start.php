<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Skript der bei nicht bekannten Klassen
// automatisch versucht die Klasse nach den angegebenen
// regeln zu laden
spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

session_start();
?>
