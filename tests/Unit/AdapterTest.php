<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 13:21
 */

namespace Tests\Unit;


use Bitlywrap\Adapter\Adapter;
use Bitlywrap\Auth\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use PHPUnit\Framework\TestCase;

class AdapterTest extends TestCase
{

    private $token;
    private $auth;

    public function setUp()
    {
        $token = 'd7WPz7KJ3k';
        $auth = new Auth($token);

        $this->token = $token;
        $this->auth = $auth;
    }

    /**
     * Test that valid POST request returns response_interface
     *
     * @return void
     */
    public function test_post_return_response_interface()
    {
        $fixture = dirname(__DIR__,1).'/Fixtures/httpbin/post.json';
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
        $adapter = new Adapter($this->auth,'http://httpbin.org',$client);

        $post_data = [
            'post_key' => 'post_value'
        ];
        $response = $adapter->post('fake-uri', $post_data);
        $this->assertInstanceOf('\GuzzleHttp\Psr7\Response',$response);
        // Because Guzzle extends ResponseInterface
        $this->assertInstanceOf('\Psr\Http\Message\ResponseInterface',$response);

        $json = $response->getBody()->getContents();
        $this->assertTrue(is_string($json));
        $response_array = json_decode($json, true);
        $this->assertArrayHasKey('json',$response_array);
        $this->assertArrayHasKey('post_key',$response_array['json']);
    }

    /**
     * Test that valid POST request returns response interface
     *
     * @return void
     */
    public function test_request_method_post_return_response_interface()
    {
        $fixture = dirname(__DIR__,1).'/Fixtures/httpbin/post.json';
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
        $adapter = new Adapter($this->auth,'http://httpbin.org',$client);

        $post_data = [
          'post_key' => 'post_value'
        ];
        $response = $adapter->request('post','fake-uri', $post_data);
        $this->assertInstanceOf('\GuzzleHttp\Psr7\Response',$response);
        // Because Guzzle extends ResponseInterface
        $this->assertInstanceOf('\Psr\Http\Message\ResponseInterface',$response);

        $json = $response->getBody()->getContents();
        $this->assertTrue(is_string($json));
        $response_array = json_decode($json, true);
        $this->assertArrayHasKey('json',$response_array);
        $this->assertArrayHasKey('post_key',$response_array['json']);
    }

    /**
     * Test that invalid method thrown InvalidArgumentException
     *
     * @return void
     */
    public function test_invalid_method_thrown_invalidargumentexception()
    {
        $this->expectException(\InvalidArgumentException::class);
        $adapter = new Adapter($this->auth);
        $adapter->request('invalid','shorten');
    }

    /**
     * Test custom base uri returns custom link
     *
     * @return void
     */
    public function test_custom_base_uri_returns_custom_link()
    {
        $custom_link = 'http://www.example.com';
        $adapter = new Adapter($this->auth, $custom_link);
        $this->assertEquals($custom_link,$adapter->getBaseUri());
    }

    /**
     * Test empty base uri returns Bit.ly link
     *
     * @return void
     */
    public function test_empty_base_uri_returns_bitly_link()
    {
        $adapter = new Adapter($this->auth);
        $bitly_link = 'https://api-ssl.bitly.com/v4';
        $this->assertEquals($bitly_link,$adapter->getBaseUri());
    }

    /**
     * Test can instantiate adapter
     *
     * @return void
     */
    public function test_can_instantiate_adapter()
    {
        $adapter = new Adapter($this->auth);
        $this->assertInstanceOf('\Bitlywrap\Adapter\Adapter',$adapter);
    }

}