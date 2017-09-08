<?php
require_once '../model/entity/User.php';
require_once '../model/dao/UserDao.php';
require_once '../model/aplicacao/UserApplication.php';
require_once '../controller/UserController.php';
require_once '../model/validation/rules/UserRules.php';
require_once '../model/validation/Validation.php';
require_once '../utils/RulesValidation.php';

$userController = new UserController();

if (isset($_POST['is_update'])) {

}

if (isset($_POST['is_create'])) {
    $user    = new User();
    $reflect = new ReflectionClass($user);
    foreach ($_POST as $key => $value) {

        if ($key == 'is_create') {
            unset($key);
            continue;
        }

        $field = $reflect->getProperty($key);
        if ($field instanceof ReflectionProperty) {
            $field->setAccessible(true);
            $field->setValue($user, $value);
        }
    }
    $applicationResult = $userController->create($user);
    echo json_encode(["details" => $applicationResult->getDetails(), "success"=>$applicationResult->getSuccess()]);
}

if (isset($_POST['is_delete'])) {

}