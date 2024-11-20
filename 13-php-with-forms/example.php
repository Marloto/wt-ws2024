<?php

//  idee für formular: name, adresse (stadt, straße, plz, usw), warenkorb, zahlungsart, versandmethode, usw.

// typische schritte zur verarbeitung von formulardaten
// -> prüfen ob das formular überhaupt versendet wurde
// -> prüfen ob felder ausgefüllt wurden, da wo notwendig
// -> Fehlerausgaben an der richtigen Stelle realisieren
// -> Felder wieder ausfüllen, damit diese nicht leer sind
$errorName = "";
$errorVorname = "";

if (isset($_POST["action"]) && $_POST["action"] == "abgesendet") {

    if (!isset($_POST["name"]) || empty($_POST["name"])) {
        $errorName = "Name fehlt!";
    }
    if (!isset($_POST["vorname"]) || empty($_POST["vorname"])) {
        $errorVorname = "Vorname fehlt!";
    }
    if (!isset($_POST["strasse"]) || empty($_POST["strasse"])) {
        $errorStrasse = "Strasse fehlt!";
    }
    if (!isset($_POST["stadt"]) || empty($_POST["stadt"])) {
        $errorStadt = "Stadt fehlt!";
    }
    if (!isset($_POST["bezahlung"]) || empty($_POST["bezahlung"])) {
        $errorBezahlung = "Bezahlung fehlt!";
    }
}

// überprüfung von informationen
// -> alles was später in das dokument soll
//    platzieren wir in variablen




?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        main {
            width: 900px;
            margin: 0 auto;
        }

        .error+p {
            color: red;
            margin: 0;
            padding: 0;
            margin-left: 25%;
            font-size: 0.75em;
            margin-bottom: 1em;
        }

        input[type="text"], select {
            width: 70%;
            border: 1px gray solid;
        }

        input.error, select.error {
            border-color: red;
        }

        label {
            width: 20%;
            display: inline-block;
            text-align: right;
        }

        input ~label {
            width: auto;
        }

        input[type="checkbox"] {
            margin-left: 20%;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body>
    <main>
        <h1>Bestellformular</h1>

        <form method="post">
            <fieldset>
                <legend>Adressdaten</legend>
                <div>
                    <label for="name">Name</label>
                    <input type="text" class="<?= !empty($errorName) ? "error" : "" ?> " id="name" name="name" value="<?= $_POST['name'] ?>">
                    <?php if ($errorName) echo "<p>$errorName</p>"; ?>
                </div>
                <div>
                    <label for="vorname">Vorname</label>
                    <input type="text" class="<?= !empty($errorVorname) ? "error" : "" ?> " id="vorname" name="vorname" value="<?= $_POST['vorname'] ?>">
                    <?php if ($errorVorname) echo "<p>$errorVorname</p>"; ?>
                </div>
                <div>
                    <label for="strasse">Straße</label>
                    <input type="text" class="<?= !empty($errorStrasse) ? "error" : "" ?>" id="strasse" name="strasse"  value="<?= $_POST['strasse'] ?>">
                    <?php if ($errorStrasse) echo "<p>$errorStrasse</p>"; ?>
                </div>
                <div>
                    <label for="stadt">Stadt</label>
                    <input type="text" class="<?= !empty($errorStadt) ? "error" : "" ?>" id="stadt" name="stadt" value="<?= $_POST['stadt'] ?>">
                    <?php if ($errorStadt) echo "<p>$errorStadt</p>"; ?>
                </div>
            </fieldset>
            <fieldset>
                <legend>Warenkorb</legend>
                <div>
                    <input id="prodA" name="prodA" type="checkbox">
                    <label for="prodA">Orangen</label>
                </div>
                <div>
                    <input id="prodB" name="prodB" type="checkbox">
                    <label for="prodB">Milch</label>
                </div>
            </fieldset>
            <fieldset>
                <legend>Bezahlmethode</legend>
                <div>
                    <label for="bezahlung">Bezahlung</label>
                    <select id="bezahlung" name="bezahlung" class="<?= !empty($errorBezahlung) ? "error" : "" ?>">
                        <option value=""></option>
                        <option value="1">Bar</option>
                        <option value="2">Rechnung</option>
                        <option value="3">Nachname</option>
                    </select>
                    <?php if ($errorBezahlung) echo "<p>$errorBezahlung</p>"; ?>
                </div>
            </fieldset>
            <div><button name="action" value="abgesendet">Absenden</button></div>
            
            <div><?php var_dump($_POST); ?></div>
        </form>
    </main>
</body>

</html>