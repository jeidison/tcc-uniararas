<?php

use PHPUnit\Framework\TestCase;

/**
 * User: jeidison
 * Date: 24/08/17
 * Time: 20:09
 */
class UserApplicationTest extends TestCase
{

    public function testCreateWithName()
    {
        $user = new User();
        $user->id = 1;
        $user->name = "AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAaaa";


        $appUser = new UserApplication();
        $result = $appUser->create($user);
        $this->assertNotNull($result);
        $this->assertTrue($result->success);
        $this->assertEquals($result->details, "aaaaaaaaaaa")

    }

}