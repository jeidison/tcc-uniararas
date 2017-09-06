<?php

require 'src/model/entity/User.php';
require 'src/model/aplicacao/UserApplication.php';

$user = new User();
$user->setName("Paul");

$appUser = new UserApplication();
$resultAppUser = $appUser->create($user);

var_dump($resultAppUser);

?>
