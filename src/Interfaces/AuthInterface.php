<?php
/**
 * Interface AuthInterface
 * @package Bitlywrap\Interfaces
 */

namespace Bitlywrap\Interfaces;



interface AuthInterface
{
    /**
     * AuthInterface constructor.
     *
     * @param string $token
     */
    public function __construct(string $token);
}