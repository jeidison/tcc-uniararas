<?php

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
        //validar

    }

    public function delete()
    {

    }

    public function update()
    {

    }

    public function read()
    {

    }

}