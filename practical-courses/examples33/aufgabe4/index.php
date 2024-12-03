<?php
require("start.php");




// $result = $service->login("Tom", "12345678");
// var_dump($result);

// var_dump($_SESSION);
// var_dump($service->isAuthentificated());
// var_dump($service->userExists("Tom2"));


// $user = new Model\User("Tom");
// var_dump($user);
// $jsonStr = json_encode($user);
// var_dump($jsonStr);
// $newUser = json_decode($jsonStr);
// var_dump($newUser); 
// $finalUser = Model\User::fromJson($newUser);
// var_dump($finalUser);

// $user = $service->loadUser("Tom");
// var_dump($user);

// $user->setFoo("Hello, World!");
// $service->saveUser($user);

var_dump($service->loadUser("Tom"));

// var_dump($service->loadFriends());

// var_dump($service->friendAccept("Trick"));

// var_dump($service->loadFriends());
?>