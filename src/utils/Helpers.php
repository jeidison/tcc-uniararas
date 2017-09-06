<?php

require '../controller/UserController.php';

$userController = new UserController();

if (isset($_POST['is_update'])) {

}

if (isset($_POST['is_success'])) {

    foreach ($_POST as $key => $value)
        echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";

}

if (isset($_POST['is_delete'])) {

}