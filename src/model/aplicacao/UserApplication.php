<?php

//require 'src/modal/dao/UserDao.php';
//require './src/model/validation/rules/UserRules.php';
//require ('../validation/UserValidation.php');

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
        $userValidation = new UserValidation($user);
        $resultValidation = $userValidation->validate();

        if (!$resultValidation->getSuccess())
        {
            return $resultValidation;
        }
        return $this->userDao->create($user);
    }

    public function delete($id)
    {
        return $this->userDao->delete($id);
    }

    public function update(User $user, $idUser)
    {
        $userValidation = new UserValidation($user);
        $resultValidation = $userValidation->validate();

        if (!$resultValidation->getSuccess())
        {
            return $resultValidation;
        }
        return $this->userDao->update($user, $idUser);
    }

    public function read()
    {
        return $this->userDao->read();
    }

    public function find($idUser)
    {
        return $this->userDao->find($idUser);
    }

}
