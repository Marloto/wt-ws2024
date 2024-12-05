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



define('CHAT_SERVER_URL', 'https://online-lectures-cs.thi.de/chat/');
define('CHAT_SERVER_ID', "7b9a4bca-484c-44cd-b275-9c5f4a6885d9"); # Ihre Collection ID


$service = new Utils\BackendService(CHAT_SERVER_URL, CHAT_SERVER_ID);
?>
