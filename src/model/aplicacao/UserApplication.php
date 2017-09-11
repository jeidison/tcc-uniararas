<?php

//require 'src/modal/dao/UserDao.php';
//require './src/model/validation/rules/UserRules.php';
//require './src/model/validation/Validation.php';

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:07
 */
class UserApplication
{

    private $userDao;

    function __construct()
    {
        $this->userDao = new UserDao();
    }

    public function create(User $user)
    {
//        $userRules = new UserRules($user);
//        $userRules->setRules();
//        $Rules = $userRules->getRules();
//        $validation = new Validation($Rules);
//        $validation = $validation->validate();
//        var_dump($validation);
//        die();
        return $this->userDao->create($user);
    }

    public function delete($id)
    {
        return $this->userDao->delete($id);
    }

    public function update(User $user)
    {

    }

    public function read()
    {
        return $this->userDao->read();
    }

}
