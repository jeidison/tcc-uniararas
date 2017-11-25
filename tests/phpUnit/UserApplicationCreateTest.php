<?php

require_once __DIR__.'/../../../src/model/entity/User.php';
require_once __DIR__.'/../../../src/model/dao/UserDao.php';
require_once __DIR__.'/../../../src/model/aplicacao/UserApplication.php';
require_once __DIR__.'/../../../src/controller/UserController.php';
require_once __DIR__.'/../../../src/model/validation/UserValidation.php';
require_once __DIR__.'/../../../src/utils/RulesValidation.php';
require_once __DIR__.'/../../../src/utils/ApplicationResult.php';

class UserApplicationCreateTest extends PHPUnit\Framework\TestCase
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

    public function testReturnSuccessCreate()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA AAAAA AAAAA');
        $user->setDocument('12345678912');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('ATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertInstanceOf('ApplicationResult', $result);
        $this->assertTrue($result->getSuccess(), $result->getDetails());
    }

    public function testReturnFailureCreate()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA AAAAA AAAAA');
        $user->setDocument('12345678912');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('ATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertInstanceOf('ApplicationResult', $result);
        $this->assertFalse($result->getSuccess(), $result->getDetails());
    }

    public function testCreateWithLongName()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA AAAAA AAAAA AAAAA AAAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithShortName()
    {
        $user = new User();
        $user->setName('AA A');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());

    }

    public function testCreateWithNullName()
    {
        $user = new User();
        $user->setName(null);
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithNameOneWord()
    {
        $user = new User();
        $user->setName('AAAAAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithDocumentLessCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('1111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithDocumentMoreCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('111111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithNullDocument()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument(null);
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithDocumentExists()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('22222222222');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithInvalidSex()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('D');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithNullSex()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex(null);
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithLargerDateBirth()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d', strtotime(' +1 day'));

        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth($date);
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithMinimumDateBirth()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('1899-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithDateBirthInvalidFormat()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/99');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithNullDateBirth()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth(null);
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithPhoneLessCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('199999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithPhoneMoreCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('199999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithEmailInvalidFormat()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithNullEmail()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail(null);
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testCreateWithInvalidStatus()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('AAAAAA');

        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }
}
