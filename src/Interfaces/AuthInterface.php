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

    /**
     * Prepare the headers for successive implementations
     *
     * @return array
     */
    public function getHeaders(): array;
}
