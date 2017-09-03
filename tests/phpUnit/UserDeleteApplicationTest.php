<?php

use PHPUnit\Framework\TestCase;

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:09
 */
class UserDeleteApplicationTest extends TestCase
{

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