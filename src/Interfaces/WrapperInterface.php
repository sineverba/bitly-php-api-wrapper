<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 14/03/2019
 * Time: 10:23
 */

namespace Bitlywrap\Interfaces;

use Bitlywrap\Adapter\Adapter;

interface WrapperInterface
{

    /**
     * WrapperInterface constructor.
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter);

    /**
     * @param string $long_url The url to shorten
     * @return mixed
     */
    public function getShortLink(string $long_url);
}
