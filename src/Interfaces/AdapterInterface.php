<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 13/03/2019
 * Time: 12:38
 */

namespace Bitlywrap\Interfaces;

use Bitlywrap\Auth\Auth;

interface AdapterInterface
{
    /**
     * AdapterInterface constructor.
     * @param Auth $auth
     * @param string|null $base_uri
     * @param null $client
     */
    public function __construct(Auth $auth, $base_uri = null, $client = null);
}
