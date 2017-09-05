<?php

/**
 * User: jeidison
 * Date: 04/09/17
 * Time: 21:59
 */
trait Connection
{
    private $dbname = 'tcc-uniararas';
    private $host   = 'localhost';
    private $dbuser = 'postgres';
    private $dbpass = 'postgres';

    public function connection() {
        try {
            $conn = new PDO("pgsql:host={$this->host};dbname={$this->dbname}", $this->dbuser, $this->dbpass);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

}