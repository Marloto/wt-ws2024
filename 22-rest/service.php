<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

spl_autoload_register(function($class) {
    include str_replace('\\', '/', $class) . '.php';
});

session_start();

// Initialize the session
if(!isset($_SESSION["memes"])) {
    $memes = array();
    $memes[] = new Meme("123", "Memes", "Memes Everywhere", "images/1c7cy8.jpg");
    $memes[] = new Meme("124", "Memes2", "Memes2 Everywhere", "images/1c7cy8.jpg");
    $_SESSION["memes"] = $memes;
}

$memes = $_SESSION["memes"];
// ---

$url = $_GET["_url"] ?? "";
$url = str_replace("/22-rest/service", "", $url);
$method = $_SERVER["REQUEST_METHOD"];


if($method === "GET") {
    // 1. API-Funktion: Auflisten aller Memes
    // -> .../meme
    // -> GET
    // -> Array aller Memes zurückgeben (als JSON)
    // menge aller memes, bzw. memes zusammensammeln
    if($url === "/meme") {
        // dann... alle memes zurückgeben
        header("Content-Type: application/json");
        echo json_encode($memes);
    }
    // 2. API-Funktion: Auslesen eines Memes (vgl. GET /meme/123)
    // X herausfinden, dass die URL mit /meme beginnt und dann noch eine ID kommt
    // X ID aus der URL auslesen
    // X ID im Array finden

    // ... /meme/123
    // -> ""/"meme"/"123"
    if(str_starts_with($url, "/meme/")) {
        $arr = explode("/", $url);
        //var_dump($arr[2]);

        $found = false;
        foreach($memes as $value) {
            if($value->getId() === $arr[2]) {
                header("Content-Type: application/json");
                echo json_encode($value);
                $found = true;
                break;
            }
        }
        if(!$found) {
            http_response_code(404);
        }
    }
}

// 3. API-Funktion: Hinzufügen eines Elements
// -> Method == POST
// -> Pfad überprüfen (/meme)
// -> Daten auslesen
// -> Neues Objekt erzeugen
if($url === "/meme" && $method === "POST") {

    $body = file_get_contents("php://input");
    $rawData = json_decode($body);
    if(!isset($rawData->memeUrl)) {
        http_response_code(400);
        exit();
    }
    http_response_code(201);
    $meme = Meme::fromJson($rawData);
    $uniqid = uniqid();
    $meme->setId($uniqid);
    $memes[] = $meme;
    header("Location: http://localhost/wt-ws2024/meme/" . $uniqid);
    // alternativ wäre auch denkbar, dass hier datenbanken od. ähnliches
    // genutzt werden um zu speichern.
}

// es fehlt noch Delete und Update
// -> nicht jede Schnittstelle muss alles umsetzen
// -> wie sieht es mit Zugriffsrechten aus? aufgabe der API-Funktion


// ---
$_SESSION["memes"] = $memes;