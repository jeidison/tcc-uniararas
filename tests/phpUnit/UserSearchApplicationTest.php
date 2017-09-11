<?php

use PHPUnit\Framework\TestCase;

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:09
 */
class UserSearchApplicationTest extends TestCase
{

    public function testSearchWithAllParams()
    {
        $appUser = new UserApplication();
        $result = $appUser->read();
        $this->assertNotNull($result);
    }

    public function testSearchWithBirthDate()
    {
        $appUser = new UserApplication();
        $result = $appUser->read();
        $this->assertNotNull($result);
    }

    public function testSearchWithDocument()
    {
        $appUser = new UserApplication();
        $result = $appUser->read();
        $this->assertNotNull($result);
    }

    public function testSearchWithOutParam()
    {
        $appUser = new UserApplication();
        $result = $appUser->read();
        $this->assertNotNull($result);
    }

    public function testSearchWithParamsNull()
    {
        $appUser = new UserApplication();
        $result = $appUser->read();
        $this->assertNotNull($result);
    }

}
