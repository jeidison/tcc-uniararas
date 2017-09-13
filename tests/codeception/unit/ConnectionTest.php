<?php

require __DIR__.'/../../../src/model/dao/Connection.php';
namespace testeDao;

class ConnectionTest extends \Codeception\Test\Unit
{
    use Connection;

    public function testConnectionWithInvalidPassword()
    {
        $this->setDbpass('invalidaPassword');
        $connection = $this->connection();
        $this->assertNotNull($connection);
        $this->assertTrue(is_string($connecton));
    }

}
