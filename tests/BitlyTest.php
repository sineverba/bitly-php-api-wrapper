<?php
use PHPUnit\Framework\TestCase;

//require_once '../api.php'; < TO LOCAL TEST
define("TOKEN","123456789");
/**
 *
 *  @author sineverba
 */
class BitlyTest extends TestCase
{

    /**
     * Just check if Bitly has no syntax error
     *
     * This is just a simple check to make sure your library has no syntax error. This helps you troubleshoot
     * any typo before you even use this library in a real project.
     *
     */
    public function testIsThereAnySyntaxError()
    {
        $bitly = new sineverba\Bitly\Bitly(TOKEN);
        $this->assertTrue(is_object($bitly));
        unset($bitly);
    }


    /**
     * Test if Bitly return a short link
     */
    public function testIfReturnsAShortLink()
    {
        $bitly = new sineverba\Bitly\Bitly(TOKEN);
        $bitly->createShortLink("http://www.google.it");
        $this->assertNotNull($bitly->getShortUrl());
        unset($bitly);
    }

}
