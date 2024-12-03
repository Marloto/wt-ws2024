<?php
// Fehleranzeige erweitern
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Autoload von unbekannten Klassen (vgl. Vorlesung 27.11.2024)
spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

session_start();

$service = new Utils\BackendService("https://online-lectures-cs.thi.de/chat/", "302241ec-cc05-4668-a0ae-68ecbd6d1ba9");
?>