<?php

require_once __DIR__.'/../../../src/model/entity/User.php';
require_once __DIR__.'/../../../src/model/dao/UserDao.php';
require_once __DIR__.'/../../../src/model/aplicacao/UserApplication.php';
require_once __DIR__.'/../../../src/controller/UserController.php';
require_once __DIR__.'/../../../src/model/validation/UserValidation.php';
require_once __DIR__.'/../../../src/utils/RulesValidation.php';
require_once __DIR__.'/../../../src/utils/ApplicationResult.php';

class UserApplicationDeleteTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    public function testDeleteUserNotExists()
    {
        $appUser = new UserApplication();
        $result = $appUser->delete(777);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testDeleteUserExists()
    {
        $appUser = new UserApplication();
        $result = $appUser->delete(3);
        $this->assertNotNull($result);
        $this->assertInstanceOf('ApplicationResult', $result);
        $this->assertTrue($result->getSuccess(), $result->getDetails());
    }

    public function testDeleteWithInvalidIdType()
    {
        $appUser = new UserApplication();
        $result = $appUser->delete('');
        $this->assertNotNull($result);
        $this->assertInstanceOf('ApplicationResult', $result);
        $this->assertTrue($result->getSuccess(), $result->getDetails());
    }
}