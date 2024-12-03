# Notizen aus der Einführung

- HttpClient:
  - einfaches Werkzeug in PHP für HTTP-Aufrufe
  - bietet statische Methoden
  - liefert Exceptions bei fehlern
  - liefert true wenn status 204
  - liefer json decoded package wenn status 200
- Wie kann man statische Methoden aufrufen in PHP?
  - "::", z.B. HttpClient::get("https://...")
- Weiteres Werkzeug ist der BackendService
  - Idee ist es alle Funktionen des Backends zu kapseln
- Fehler-Anzeigen erweitern, damit man besser sieht was passiert
- Auto-Loading für Klassen mitnehmen od. immer mit require arbeiten, damit PHP-Dateien importiert werden
- Wie in Java gibt es eine Art "Package" Mechanik, die aber nicht über Dateistrukturen abgebildet ist, hierfür wird mittels "namespaces abc;" angegeben, in welchem package nachfolgende Elemente platziert sind, mittels "use abc\someclass" kann dann ein Import realisiert werden (zur Verwendung von someclass), ohne use nutzt man den kompletten Namen ("abc\someclass").
- Tipp: schreiben Sie sich eine test.php, und probieren Sie entsprechende Methoden immer erst aus, bevor Sie an die konkreten Ansichten gehen!
- Aufruf von Methoden/Attribute in PHP die nicht statisch sind?
  - "->" wird für den Zugriff, z.B. $test->doSomething() od. $test->someAttr, geht auch mit der impliziten Referenz $this, also $this->doSomething()
- Wichtig: "https://online-lectures-cs.thi.de/chat/full" generiert keine Dummy-Daten mehr!
- User-Klasse nach Anleitung in Aufgabe b erstellen, sowie mit allen Attributen die notwendig sind erweitern. Folgendes zeigt ein paar Experimente

```
$user = new User("Tom"); // od. new User("Tom", "abc");
$user->setFoo("abc");
var_dump($user);

$jsonStr = json_encode($user);
var_dump($jsonStr);

$newUserObj = json_decode($jsonStr);
var_dump($newUserObj);

$finalUser = User::fromJson($newUserObj);
var_dump($finalUser);
```

- Das selbe noch einmal für Friends
- passen sie alle JavaScript Aufrufe mit URLs an, nutzen Sie die ajax_... Dateien, anstatt direkt mit dem Backend zu kommunizieren, wenn sauber: dann die Token löschen, da die nicht mehr notwendig sind
- **Tipp:** In den meisten fällen bietet sich die Verarbeitung der Formulardaten auf der selben Seite an (vgl. <form action="login.php"> für login.php). Wenn der Login erfolgreich ist, wollen Sie aber das der Nutzer auf die "friends.php" Seite weiter geleitet wird!
  - es gibt einen HTTP-Response-Header der dies steuert, der sogenannte "Location"
  - vgl. "Location: somewhere.php", od. "Location: friends.php"
  - `header("Location: friends.php");`
  - Weiteres Beispiel: friends.php soll sicherstellen, dass man nur die ansicht bekommt, wenn man angemeldet ist... also `if($service->isAuthentificated()) { header("Location: login.php"); exit(); }` wenn die Methode ergänzt wurde
  - abbrechen der nachfolgenden Ausführung