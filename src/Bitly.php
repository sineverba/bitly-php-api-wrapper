<?php
/**
 * Main Bit.ly PHP class
 */

namespace sineverba\Bitly;


use sineverba\Bitly\Exceptions\SineverbaException;

class Bitly
{

    /**
     * @var The token
     */
    private $token;

    /**
     * Bitly constructor.
     * We need the token from your personal page:
     *
     * https://bitly.com/a/oauth_apps
     *
     * @param $token
     */

    public function __construct($token=null)
    {
       if ($token===null) {
           throw new SineverbaException("Token cannot be empty");
       }

       $this->setToken($token);
    }

    /**
     * @return null
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param null $token
     */
    public function setToken($token): void
    {
        $this->token = $token;
    }

}