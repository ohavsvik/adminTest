<?php

class CUserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test
     */
    public function testIsAuthenticated()
    {
        $user = new CUser(null);
        
        $res = $user->isAuthenticated();
        $this->assertFalse($res, "User should not be authenticated.");
    }
}
