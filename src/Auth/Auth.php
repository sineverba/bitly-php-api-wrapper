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
     * @param $token
     */
    private function setToken($token)
    {
        $this->token = $token;
    }
}
