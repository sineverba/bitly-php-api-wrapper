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

}