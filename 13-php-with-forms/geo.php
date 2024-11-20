<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL & ~E_NOTICE);



function simple_http_get($url) {
    // Initialisiere cURL Session
    $ch = curl_init();

    $headers = [
        'User-Agent: MyApplication/1.0 (your@email.com)', // Bitte anpassen!
        'Accept: application/json',
        'Accept-Language: de,en-US;q=0.7,en;q=0.3',
        'Accept-Encoding: gzip, deflate',
        'Connection: keep-alive'
    ];
    
    // Setze die cURL Optionen
    curl_setopt_array($ch, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_SSL_VERIFYPEER => true,
        CURLOPT_SSL_VERIFYHOST => 2,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTPGET => true
    ]);
    
    // Füge Headers hinzu, falls vorhanden
    if (!empty($headers)) {
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    }
    
    // Führe Request aus
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    // Prüfe auf Fehler
    if ($response === false) {
        $error = curl_error($ch);
        curl_close($ch);
        throw new Exception("cURL Fehler: " . $error);
    }
    
    curl_close($ch);
    
    // Prüfe HTTP Status Code
    if ($httpCode !== 200) {
        throw new Exception("HTTP Fehler: Status Code " . $httpCode);
    }
    
    // Versuche JSON zu decodieren
    $decodedResponse = json_decode($response, true);
    
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("JSON Decode Fehler: " . json_last_error_msg());
    }
    
    return $decodedResponse;
}


$baseUrl = "https://nominatim.openstreetmap.org/search";






//var_dump(simple_http_get("https://nominatim.openstreetmap.org/search?street=esplanade&city=ingolstadt&format=json"));





?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Search Location</h1>
        <!-- Aufgabenteil a/b -->
        <form ________________________________________________________________________________________________________________________>
            <div class="form-floating mb-3">
                <input class="form-control" id="streetInput" placeholder="Example Street 123" ________>
                <label for="streetInput">Street</label>
            </div>
            <div class="form-floating mb-3">
                <input class="form-control" id="cityInput" placeholder="Some City" _____>
                <label for="cityInput">City</label>
            </div>
            <div class="d-grid gap-2">
                <button class="btn btn-outline-primary" ___________________________________>Search</button>
            </div>
        </form>
        <!-- Aufgabenteil c -->

















    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>