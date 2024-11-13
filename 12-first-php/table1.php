<!DOCTYPE html>
<html>
    <title>1x1</title>
    <body>

        <form>
            <input name="maxI" id="maxI">
            <input name="maxJ" id="maxJ">
            <button>Send</button>
        </form>
<?php
// Analog zur Tabelle in JavaScript
// eine äußere und eine innere Schleife in PHP
// Zeichenketten mit . Operator kombinieren
// Zeichenketten mit + führt zur "Addition" von Zeichenketten, mit Typumwandlung

// Aufteilung in Funktionen: generateCell, generateRow, generateTable

function generateCell($i, $j) {
    echo "<td>" . $i * $j . "</td>";
}

function generateRow($i, $maxJ) {
    echo "<tr>";
    for($j = 1; $j <= $maxJ; $j ++) {
        generateCell($i, $j);
    }
    echo "</tr>";
}

function generateTable($maxI, $maxJ) {
    echo "<table>";
    for($i = 1; $i <= $maxI; $i ++) {
        generateRow($i, $maxJ);
    }
    echo "</table>";
}


$maxI = $_GET["maxI"] ?? 10;
$maxJ = $_GET["maxJ"] ?? 10;

generateTable($_GET["maxI"], $_GET["maxJ"]);
?>
    </body>
</html>