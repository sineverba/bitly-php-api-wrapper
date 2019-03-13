<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 11:51
 */
namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use Bitlywrap\Client;

class ClientTest extends TestCase
{
    /**
     * Test that we can instantiate Client class
     *
     * @return void
     */
    public function test_can_instantiate_client_class()
    {
        $client = new Client('token');
        $this->assertTrue(is_object($client));
        $this->assertInstanceOf('\bitlywrap\Client',$client);
    }
}