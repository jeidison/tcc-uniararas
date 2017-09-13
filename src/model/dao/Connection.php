<?php

error_reporting(0);
@ini_set('display_errors', 0);

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
            //echo "Connection failed: " . $e->getMessage();
            return $e->getMessage();
        }
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDbname()
    {
        return $this->dbname;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDbname($dbname)
    {
        $this->dbname = $dbname;

        return $this;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setHost($host)
    {
        $this->host = $host;

        return $this;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDbuser()
    {
        return $this->dbuser;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDbuser($dbuser)
    {
        $this->dbuser = $dbuser;

        return $this;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDbpass()
    {
        return $this->dbpass;
    }

    /**
     * @codeCoverageIgnore
     */
    public function setDbpass($dbpass)
    {
        $this->dbpass = $dbpass;

        return $this;
    }

}
