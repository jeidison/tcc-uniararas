<?php

use PHPUnit\Framework\TestCase;

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:09
 */
class UserUpdateApplicationTest extends TestCase
{

    public function testUpdateSuccess()
    {
        $user = new User();
        $user->setName('AAAAA AAAAA');
        $user->setDocument('11111111111');
        $user->setSex('M');
        $user->setDateBirth('01/01/2017');
        $user->setPhone('19999999999');
        $user->setEmail('teste@uniararas.com.br');
        $user->setStatus('INATIVO');

        $appUser = new UserApplication();
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);

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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);

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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);

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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
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
        $result = $appUser->update($user);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

}