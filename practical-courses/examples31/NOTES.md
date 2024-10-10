# Some Notes for VSC

- Ordner / Dateien bearbeitet: z.B. Java-Projekte; z.B. per Play-Button
- GitHub Repos genutzt / mit GUI im VSC
  - einer im Team das Repo anlegen, alle anderen einladen (member)
  - Kursraum ist ein Video (Einführung Git)
  - Wenn im Team, achten Sie auf Änderungen an der selben Datei von unterschiedlichen Personen
  - Mergen üben, es wird so oder so irgendwann passieren
  - Tip: Arbeiten Sie unterschiedlichen Dateien :)
- Shortcuts
    - Zeilen Markieren: Shift / Strg + Pfeiltasten od. Ende / Pos1
    - Cmd/Strg + X/C/V -> funktionieren hier auch
    - Strg/Cmd + Shift + 7 -> Toggle Command
    - **Strg/Cmd + Shift + P** -> Palette / Console für VSC
    - Strg/Cmd + P -> Dateien suchen im Projekt
    - Strg/Cmd + Z / Strg/Cmd + Shift + Z -> Rückgängig
    - Option/Alt + Shift + Pfeil Hoch / Runter -> Zeile duplizieren
    - Option/Alt + Pfeil Hoch / Runter -> Zeile verschieben
    - Cmd / Strg + Shift + K -> Löschen einer Zeile
    - Cmd/Strg + F -> Suche
- "Emmet"
  - div -> erzeugt ein <div></div>
  - ul>li*3 -> erzeugt eine liste mit drei Elementen
  - div.someClass#foo -> <div class="someClass" id="foo"></div>
- Multi Cursor
  - Alt/Option + Klick -> erzeugt Cursor, man kann dann an allen Stellen editieren
  - Cmd/Strg + D -> Auswahl + Cursor des selben nächstens Worts
  - Suche -> einge eines Wortes -> Alt/Option + Enter -> Auswahl + Cursor aller Vorkommen
- GitHub Copilot
  - Verschiedene Features zum Erklären und Verständnis auf jedenfall hilfreich
  - Autovervollständigung mit Vorsicht genießen
- Extensions:
  - Live Server: ist ein HTTP-Server, der das aktuelle Projekt bereitstellt; optional, alternativ rechtsklick -> reveal in ... -> per drag&drop in Browser öffnen
  - REST Client: Empfehlung um .http Dateien für Experimente in das Projekt zu legen
    - damit lassen sich in anlehnung an den HTTP-Request-Syntax Anfragen ablegen
    - Beispiel: 

GET /resources/test.txt HTTP/1.1
Host: online-lectures-cs.thi.de

    - Zusatzfeature: anstatt des üblichen Pfades z.B. "/resources/test.txt" kann man URLs platzieren
- Alternativ auf der Konsole curl od. reqbin.com/curl
- Integriertes Terminal am Übergang zw. Blau und Weiß