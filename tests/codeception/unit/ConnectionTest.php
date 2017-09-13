<?php

require __DIR__.'/../../../src/model/dao/UserDao.php';

class ConnectionTest extends \Codeception\Test\Unit
{
    use Connection;

    public function testConnectionWithInvalidDatabaseName()
    {
        $this->setDbname('invalid-name');
        $connection = $this->connection();
        $this->assertNotNull($connection);
        $this->assertTrue(is_string($connection), get_class($connection));
    }
}
