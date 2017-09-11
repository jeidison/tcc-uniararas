<?php

//require '../model/aplicacao/UserApplication.php';

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:27
 */
class UserController
{
    private $userApplication;

    function __construct()
    {
        $this->userApplication = new UserApplication();
    }

    public function create(User $user)
    {
        return $this->userApplication->create($user);
    }

    public function delete($idUser)
    {
        return $this->userApplication->delete($idUser);
    }

    public function update()
    {

    }

    public function read()
    {
        return $this->userApplication->read();
    }

}