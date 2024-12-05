<?php
require("start.php");

$service = new Utils\BackendService("https://online-lectures-cs.thi.de/chat/", "7b9a4bca-484c-44cd-b275-9c5f4a6885d9");
$result = $service->login("Tom", "12345678");
var_dump($result);
$result = $service->register("Tom2", "12345678");
var_dump($result);



// {"username": "Tom", "foo": ""}

$user = new Model\User("Tom");
var_dump($user);

// JavaScript JSON erzeugen? JSON.parse od. JSON.stringify?
// in PHP json_encode und json_decode
$jsonStr = json_encode($user);
var_dump($jsonStr);

$newUser = json_decode($jsonStr);
var_dump($newUser);
$finalUser = Model\User::fromJson($newUser);
var_dump($finalUser);


?>
