<?php
require("start.php");


$result = $service->login("Someone", "12345678");
var_dump($result);

// $result = $service->login("Tom", "12345678");
// var_dump($result);

var_dump($_SESSION);

var_dump($service->isAuthentificated());

$user = $service->loadUser("Tom");
var_dump($user);
// $user->setFoo("Hallo, Welt!");
// $service->saveUser($user);

var_dump($service->loadFriends());

var_dump($service->friendAccept("Trick"));

var_dump($service->loadFriends());

?>