<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 13:21
 */

namespace Tests\Unit;


use Bitlywrap\Adapter\Adapter;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{

    /**
     * Test we can instantiate adapter
     *
     * @return void
     */
    public function test_can_instantiate_adapter()
    {
        $adapter = new Adapter();
        $this->assertInstanceOf('\Bitlywrap\Adapter\Adapter',$adapter);
    }

    /**
     * Test that adapter returns header
     */
    public function test_adapter_returns_headers()
    {
        $token = '1a2s3d4f5g6h6t';
        $adapter = new Adapter();
        $adapter->setToken($token);
        $headers = $adapter->getHeaders();
        $this->assertTrue(is_array($headers));
        $this->assertTrue($headers[0] === 'Authorization: Bearer 1a2s3d4f5g6h6t');
    }

}