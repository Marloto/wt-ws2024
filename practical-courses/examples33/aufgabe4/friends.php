<?php
require("start.php");
if(!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit(); // beendet den skript hier
}