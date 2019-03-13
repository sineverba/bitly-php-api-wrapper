<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 14:08
 */

namespace Tests\Unit;


use PHPUnit\Framework\TestCase;
use Bitlywrap\Auth\Auth;

class AuthTest extends TestCase
{
    /**
     * Test we can instantiate Auth class
     */
    public function test_can_instantiate_class()
    {
        $token = 'd7WPz7KJ3k';
        $auth = new Auth($token);
        $this->assertInstanceOf('\Bitlywrap\Auth\Auth',$auth);
        $this->assertObjectHasAttribute('token',$auth);
    }

    /**
     * Test that adapter returns header
     */
    public function test_auth_returns_headers()
    {
        $token = 'd7WPz7KJ3k';
        $auth = new Auth($token);
        $headers = $auth->getHeaders();
        $this->assertTrue(is_array($headers));
        $this->assertTrue($headers[0] === 'Authorization: Bearer d7WPz7KJ3k');
    }
}