<?php
/**
 * Created by PhpStorm.
 * User: aless
 * Date: 14/03/2019
 * Time: 10:24
 */

namespace Bitlywrap\Wrapper;

use Bitlywrap\Adapter\Adapter;
use Bitlywrap\Interfaces\WrapperInterface;

class Wrapper implements WrapperInterface
{
    /**
     * @var \BitlyWrap\Adapter\Adapter
     */
    private $adapter;

    /**
     * Wrapper constructor.
     * @param Adapter $adapter
     */
    public function __construct(Adapter $adapter)
    {
        $this->setAdapter($adapter);
    }

    /**
     * @param string $long_url
     * @return string
     */
    public function getShortLink(string $long_url)
    {
        $adapter = $this->getAdapter();
        $data = [
            'long_url' => $long_url
        ];
        $response = $adapter->post('shorten', $data);
        $content = $response->getBody()->getContents();
        $array = json_decode($content, 1);
        return $array['link'];
    }

    /**
     * @return Adapter
     */
    private function getAdapter(): Adapter
    {
        return $this->adapter;
    }

    /**
     * @param Adapter $adapter
     */
    private function setAdapter(Adapter $adapter): void
    {
        $this->adapter = $adapter;
    }
}
