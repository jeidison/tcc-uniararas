<?php

require_once __DIR__.'/../../../src/model/entity/User.php';
require_once __DIR__.'/../../../src/model/dao/UserDao.php';
require_once __DIR__.'/../../../src/model/aplicacao/UserApplication.php';
require_once __DIR__.'/../../../src/controller/UserController.php';
require_once __DIR__.'/../../../src/model/validation/UserValidation.php';
require_once __DIR__.'/../../../src/utils/RulesValidation.php';
require_once __DIR__.'/../../../src/utils/ApplicationResult.php';

class UserApplicationUpdateTest extends \Codeception\Test\Unit
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

    public function testReturnSuccessUpdate()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA AAAAA AAAAA');
        $user->setDocument('22222222222');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('ATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertInstanceOf('ApplicationResult', $result);
        $this->assertTrue($result->getSuccess(), $result->getDetails());
    }

    public function testReturnFailureCreate()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA AAAAA AAAAA');
        $user->setDocument('22222222222');
        $user->setSex('M');
        $user->setDateBirth('2017-01-01');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('ATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 777);
        $this->assertNotNull($result);
        $this->assertInstanceOf('ApplicationResult', $result);
        $this->assertFalse($result->getSuccess(), $result->getDetails());
    }

    public function testUpdateWithLongName()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA AAAAA AAAAA AAAAA AAAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());

    }

    public function testUpdateWithShortName()
    {
        $user = new User();
        $user->setName('AA A');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());

    }

    public function testUpdateWithNullName()
    {
        $user = new User();
        $user->setName(null);
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithNameOneWord()
    {
        $user = new User();
        $user->setName('AAAAAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithDocumentLessCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('1111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithDocumentMoreCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('111111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithNullDocument()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument(null);
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithDocumentExists()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('22222222222');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithInvalidSex()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('D');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithNullSex()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex(null);
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithLargerDateBirth()
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
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithMinimumDateBirth()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/1899');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithDateBirthInvalidFormat()
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
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithNullDateBirth()
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
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithPhoneLessCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('199999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithPhoneMoreCharacters()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('199999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithEmailInvalidFormat()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithNullEmail()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail(null);
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }

    public function testUpdateWithInvalidStatus()
    {
        $user = new User();
        $user->setName('AAAA AAAA AAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('AAAAAA');

        $appUser = new UserApplication();
        $result = $appUser->update($user, 1);
        $this->assertNotNull($result);
        $this->assertFalse($result->getSuccess());
    }
}
