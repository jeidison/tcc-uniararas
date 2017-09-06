<?php


class UserApplicationCreateTest extends \Codeception\Test\Unit
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

    public function testCreateWithLongName()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);

    }

    public function testCreateWithShortName()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);

    }

    public function testCreateWithNullName()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithNameOneWord()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithDocumentLessCharacters()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithDocumentMoreCharacters()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithNullDocument()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithDocumentExists()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithInvalidSex()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithNullSex()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithLargerDateBirth()
    {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d-m-Y', strtotime(' +1 day'));

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
        $this->assertFalse($result->success);
    }

    public function testCreateWithMinimumDateBirth()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $this->assertFalse($result->success);
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
        $this->assertFalse($result->success);
    }

    public function testCreateWithPhoneLessCharacters()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithPhoneMoreCharacters()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithEmailInvalidFormat()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithNullEmail()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testCreateWithInvalidStatus()
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
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }
}
