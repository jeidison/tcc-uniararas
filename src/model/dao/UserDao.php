<?php

require 'Connecion.php';
require './src/database/named-query.php';

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:24
 */
class UserDao
{
    use Connection;

    private $connection;

    function __construct()
    {
        $this->connection = $this->connection();
    }

    public function create(User $user)
    {

    }

    public function delete()
    {

    }

    public function update()
    {

    }

    public function read()
    {
        return $this->connection->query(sqlUsers(), PDO::FETCH_ASSOC);
    }

}