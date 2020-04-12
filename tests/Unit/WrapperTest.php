<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 14/03/2019
 * Time: 10:20
 */

namespace Tests\Unit;


use Bitlywrap\Adapter\Adapter;
use Bitlywrap\Auth\Auth;
use Bitlywrap\Wrapper\Wrapper;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class WrapperTest extends TestCase
{

    private $token;
    private $auth;
    private $adapter;

    private function initialize()
    {
        $token = 'd7WPz7KJ3k';
        $auth = new Auth($token);
        $adapter = new Adapter($auth);

        $this->token = $token;
        $this->auth = $auth;
        $this->adapter = $adapter;
    }

    /**
     * Test that method shortlink returns the short link
     *
     * @return void
     */
    public function test_get_short_link_method_return_string()
    {
        $this->initialize();

        $fixture = dirname(__DIR__).'/Fixtures/Shorten/shorten.json';
        $this->assertFileExists($fixture);

        $body = file_get_contents($fixture);
        $this->assertTrue(is_string($body));

        $mock = new MockHandler([
            new Response(200,array(),$body)
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client([
            'handler' => $handler
        ]);
        $adapter = new Adapter($this->auth,'http://www.example.com',$client);
        $wrapper = new Wrapper($adapter);

        $long_url = 'http://www.example.com';

        $short_link = $wrapper->getShortLink($long_url);
        $this->assertTrue(is_string($short_link));
    }

    /**
     * Test we can instantiate wrapper class
     *
     * @return void
     */
    public function test_can_instantiate_wrapper()
    {
        $this->initialize();

        $wrapper = new Wrapper($this->adapter);
        $this->assertInstanceOf('\Bitlywrap\Wrapper\Wrapper',$wrapper);
    }
}