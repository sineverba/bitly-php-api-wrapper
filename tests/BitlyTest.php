<?php
use PHPUnit\Framework\TestCase;

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
        $var = new sineverba\Bitly\Bitly;
        $this->assertTrue(is_object($var));
        unset($var);
    }

}
