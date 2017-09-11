<?php
require_once '../model/entity/User.php';
require_once '../model/dao/UserDao.php';
require_once '../model/aplicacao/UserApplication.php';
require_once '../controller/UserController.php';
require_once '../utils/RulesValidation.php';
require_once '../utils/ApplicationResult.php';
require_once '../model/validation/UserValidation.php';


$userController = new UserController();

if (isset($_POST['is_find'])) {
    $applicationResult = $userController->find($_POST['id_user']);
    header_remove();
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');
    if ($applicationResult->getSuccess()) {
        http_response_code(200);
        header('Status: 200');
    } else {
        http_response_code(500);
        header('Status: 500');
    }
    echo json_encode(["details" => $applicationResult->getDetails(), "success"=>$applicationResult->getSuccess(), "data" => $applicationResult->getData()]);
}

if (isset($_POST['is_update'])) {
  $user    = new User();
  $reflect = new ReflectionClass($user);
  foreach ($_POST as $key => $value) {

      if ($key == 'is_update') {
          unset($key);
          continue;
      }

      $field = $reflect->getProperty($key);
      if ($field instanceof ReflectionProperty) {
          $field->setAccessible(true);
          $field->setValue($user, $value);
      }
  }
  $applicationResult = $userController->update($user);
  header_remove();
  header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
  header('Content-Type: application/json');
  /*if ($applicationResult->getSuccess()) {
      http_response_code(200);
      header('Status: 200');
  } else {
      http_response_code(500);
      header('Status: 500');
  }
  echo json_encode(["details" => $applicationResult->getDetails(), "success"=>$applicationResult->getSuccess()]);
  */
  http_response_code(200);
  header('Status: 200');
  echo json_encode(["result" => $applicationResult]);
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
    header_remove();
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');
    if ($applicationResult->getSuccess()) {
        http_response_code(200);
        header('Status: 200');
    } else {
        http_response_code(500);
        header('Status: 500');
    }
    echo json_encode(["details" => $applicationResult->getDetails(), "success"=>$applicationResult->getSuccess()]);
}

if (isset($_POST['is_delete'])) {
    $applicationResult = $userController->delete($_POST['id_user']);
    header_remove();
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');
    if ($applicationResult->getSuccess()) {
        http_response_code(200);
        header('Status: 200');
    } else {
        http_response_code(500);
        header('Status: 500');
    }
    echo json_encode(["details" => $applicationResult->getDetails(), "success"=>$applicationResult->getSuccess()]);
}
