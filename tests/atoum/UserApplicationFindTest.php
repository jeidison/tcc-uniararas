<?php

require_once __DIR__.'/../../../src/model/entity/User.php';
require_once __DIR__.'/../../../src/model/dao/UserDao.php';
require_once __DIR__.'/../../../src/model/aplicacao/UserApplication.php';
require_once __DIR__.'/../../../src/controller/UserController.php';
require_once __DIR__.'/../../../src/model/validation/UserValidation.php';
require_once __DIR__.'/../../../src/utils/RulesValidation.php';
require_once __DIR__.'/../../../src/utils/ApplicationResult.php';

class UserApplicationFindTest extends atoum\test
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

    public function testFind()
    {
        $userDao = new UserController();
        $users = $userDao->find(1);
        $this->assertNotNull($users);
        $this->assertEquals(1, count($users));
    }

    public function testFindUserNotExists()
    {
        $userDao = new UserController();
        $users = $userDao->find(777);
        $this->assertNotNull($users);
        $this->assertInstanceOf('ApplicationResult', $users);
        $this->assertFalse($users->getSuccess(), $users->getDetails());
    }
}
