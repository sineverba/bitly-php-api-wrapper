<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 12:39
 */

namespace Bitlywrap\Adapter;

use Bitlywrap\Auth\Auth;
use Bitlywrap\Interfaces\AdapterInterface;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class Adapter implements AdapterInterface
{
    /**
     * @var string
     */
    private $base_uri;

    /**
     * @var object
     */
    private $client;

    /**
     * Adapter constructor.
     * @param Auth $auth
     * @param null $uri
     * @param null $client
     */
    public function __construct(Auth $auth, $base_uri = null, $client = null)
    {
        if ($base_uri === null) {
            $base_uri = 'https://api-ssl.bitly.com/v4';
        }
        $this->setBaseUri($base_uri);

        $headers = $auth->getHeaders();
        if ($client === null) {
            $client = new Client([
                'base_uri' => $this->getBaseUri(),
                'headers' => $headers
            ]);
        }
        $this->setClient($client);
    }

    /**
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function post(string $uri, array $data = [], array $headers = []): ResponseInterface
    {
        $response = $this->request('post', $uri, $data, $headers);
        return $response;
    }

    /**
     * @param string $method
     * @param string $uri
     * @param array $data
     * @param array $headers
     * @return mixed
     */
    public function request(string $method, string $uri, array $data = [], array $headers = [])
    {
        if (!in_array($method, ['get', 'post', 'put', 'patch', 'delete'])) {
            throw new \InvalidArgumentException('Request method must be get, post, put, patch, or delete');
        }
        $response = $this->getClient()->$method($uri, [
            'headers' => $headers,
            ($method === 'get' ? 'query' : 'json') => $data,
        ]);
        return $response;
    }

    /**
     * @return object
     */
    private function getClient()
    {
        return $this->client;
    }

    /**
     * @param $client
     */
    private function setClient($client)
    {
        $this->client = $client;
    }

    /**
     * @return string
     */
    public function getBaseUri()
    {
        return $this->base_uri;
    }

    /**
     * @param $base_uri
     */
    private function setBaseUri($base_uri)
    {
        $this->base_uri = $base_uri;
    }
}
