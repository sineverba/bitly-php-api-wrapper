<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 14:13
 */

namespace Bitlywrap\Auth;

use Bitlywrap\Interfaces\AuthInterface;

class Auth implements AuthInterface
{
    /**
     * @var string
     */
    private $token;

    /**
     * AuthInterface constructor.
     *
     * @param string $token
     */
    public function __construct(string $token)
    {
        $this->setToken($token);
    }

    /**
     * Prepare the headers for successive implementations
     *
     * @return array
     */
    public function getHeaders(): array
    {
        $headers = [
            'Authorization: Bearer '.$this->getToken(),
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json'
        ];
        return $headers;
    }

    /**
     * @param $token
     */
    private function setToken($token)
    {
        $this->token = $token;
    }


    /**
     * @return string
     */
    private function getToken()
    {
        return $this->token;
    }
}
