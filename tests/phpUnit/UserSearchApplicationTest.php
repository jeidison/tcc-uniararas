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
        $searchParam = new SearchParam();
        $searchParam->dhNasc = "2000-01-01";
        $searchParam->document = "999999999";
        $appUser = new UserApplication();
        $result = $appUser->search($searchParam);
        $this->assertNotNull($result);
    }

    public function testSearchWithBirthDate()
    {
        $searchParam = new SearchParam();
        $searchParam->dhNasc = "2000-01-01";
        $appUser = new UserApplication();
        $result = $appUser->search($searchParam);
        $this->assertNotNull($result);
    }

    public function testSearchWithDocument()
    {
        $searchParam = new SearchParam();
        $searchParam->document = "999999999";
        $appUser = new UserApplication();
        $result = $appUser->search($searchParam);
        $this->assertNotNull($result);
    }

    public function testSearchWithOutParam()
    {
        $searchParam = new SearchParam();
        $appUser = new UserApplication();
        $result = $appUser->search($searchParam);
        $this->assertNotNull($result);
    }

    public function testSearchWithParamsNull()
    {
        $appUser = new UserApplication();
        $result = $appUser->search(null);
        $this->assertNotNull($result);
    }

}
