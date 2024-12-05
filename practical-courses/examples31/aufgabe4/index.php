<?php
require("start.php");


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

$user = $service->loadUser("Tom");
var_dump($user);
// $user->setFoo("Hello, World!");
// $service->saveUser($user);

$friends = $service->loadFriends();
var_dump($friends);
//$service->friendAccept("Trick");
?>
