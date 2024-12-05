# Notizen

- Laden Sie sich die Utils, entpacken Sie diese im Chat-App Ordner, verschieben Sie die Dateien nicht in Unterordner
- Docker: mit "docker compose logs -f" können sie den Log ansehen
- XAMPP: in dem Installationsordner finden Sie neben "htdocs" die eigentlichen logs des Servers, manche PHP Fehler werden erst da sichtbar.
- Hilfreich:
  - Mehr fehlerausgaben mittels ini_set-Aufrufe
  - Autoload von Klassen mittels spl_autoload_register
  - session_start ergänzen
- BackendService nutzen
  - Regelt alle Zugriffe auf die Funktionen die hier dokumentiert sind: https://online-lectures-cs.thi.de/chat/full
  - jede Methode ruft eine HTTP-Funktion des Chat-Backends auf
  - Erproben Sie die Funktionen, so wie benötigt!
  - Initialisierung mit: $service = new Utils\BackendService();
  - Hinweis: Die Full-Docu erzeugt keine Dummy-Daten mehr!
- Fügen Sie die Klasse User und Friend hinzu, beide in den Ordner Model, benennung ist hier wichtig
- Verwenden Sie die verschiedenen Methoden im BackendService
- json_encode / json_decode für die Datenübermittlung, wird aber alles im BackendService bereits geregelt
- Weiterleitungen mit:

```
header("Location: login.php");
exit(); // immmer nach einem header mit Location
```