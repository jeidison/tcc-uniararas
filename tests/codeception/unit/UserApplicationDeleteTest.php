<?php


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

    public function testDeleteWithUserNotExists()
    {
        $appUser = new UserApplication();
        $result = $appUser->delete(777);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }

    public function testDeleteWithEnableStatus()
    {
        $appUser = new UserApplication();
        $result = $appUser->delete(1);
        $this->assertNotNull($result);
        $this->assertFalse($result->success);
    }
}