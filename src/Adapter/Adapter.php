<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 12:39
 */

namespace Bitlywrap\Adapter;

use Bitlywrap\Interfaces\AdapterInterface;

class Adapter implements AdapterInterface
{
    /**
     * @var string
     */
    private $token;

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
     * Set the token
     *
     * @param string
     */
    public function setToken(string $token)
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
