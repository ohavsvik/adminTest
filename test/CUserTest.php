<?php

class CUserTest extends \PHPUnit_Framework_TestCase
{

    public function testIsAuthenticatedTest()
    {
        $user = new CUser(null);
        $res = $user->isAuthenticated();

        $this->assertFalse($res, "User should not be authenticated");


        $_SESSION['user'] = 'ye';
        $res = $user->isAuthenticated();
        $this->assertTrue($res, "User should be authenticated");
    }

    public function testGetName()
    {
        $user = new CUser(null);
        $res = $user->getName();
        $this->assertEquals(null, $res, "Should not get name.");
    }

    public function testGetAcronym()
    {
        $user = new CUser(null);
        $res = $user->getAcronym();
        $this->assertEquals(null, $res, "Should not get acronym.");
    }
}
