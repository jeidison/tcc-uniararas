<?php


class UserCreateTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;
    protected $user;

    protected function _before()
    {
        $this->user = new User();
    }

    protected function _after()
    {
    }

    // tests
    public function testLongName()
    {
        $this->user->setUser('Nome com tamanho de mais de 30 caracteres');
        $this->user->setDocument('11111111111');
        $this->user->setSex('M');
        $this->user->setDateBirth('01/01/2017');
        $this->user->setPhone('19999999999');
        $this->user->setEmail('teste@uniararas.com.br');
        $this->user->setStatus('INATIVO');
        $this->assertFalse($this->user->validate(['user']), "Validação incorreta! Nome com mais de 30 caracteres...");
    }
}
