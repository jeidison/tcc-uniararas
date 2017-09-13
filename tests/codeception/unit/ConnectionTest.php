<?php


require __DIR__.'/../../../src/model/dao/Connection.php';

class ConnectionTest extends \Codeception\Test\Unit
{
    use Connection as ConnectionDB;

    public function testConnectionWithInvalidPassword()
    {
      /*
        $this->setDbpass('invalidaPassword');
        $connection = $this->connection();
        $this->assertNotNull($connection);
        $this->assertTrue(is_string($connecton));
      */
    }

}
