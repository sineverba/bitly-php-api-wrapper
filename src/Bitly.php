<?php
/**
 * Main Bit.ly PHP class
 */

namespace sineverba\Bitly;


use sineverba\Bitly\Exceptions\BitlyException;

class Bitly
{

    /**
     * @var the token
     */
    private $token;

    /**
     * Base API V4 URL
     *
     */
    private $api_url = "https://api-ssl.bitly.com/v4/";

    /**
     * Final short url
     *
     * @since 1.0.0
     * @author sineverba
     */
    private $short_url;

    /**
     * Bitly constructor.
     * We need the token from your personal page:
     *
     * https://bitly.com/a/oauth_apps
     *
     * @param $token
     * @throws BitlyException
     */

    public function __construct($token=null)
    {
       if ($token===null) {
           throw new BitlyException("Token cannot be empty");
       }

       $this->setToken($token);
    }

    /**
     * Get shorten link.
     * @param $url original URL
     *
     * @throws BitlyException
     * @throws \GuzzleHttp\Exception\GuzzleException
     * @author @sineverba
     * @since 1.0.0
     */
    public function createShortLink($url=null)
    {
        if ($url===null) {
            throw new BitlyException("URL cannot be empty");
        }

        $option = array();
        $option['base_uri'] = $this->getApiUrl();
        $option['verify'] = false;
        $client = new \GuzzleHttp\Client($option);

        $headers = [
            'Authorization' => 'Bearer ' . $this->getToken(),
            'Accept'        => 'application/json',
            'Content-Type'  => 'application/json'
        ];

        $post = array();
        $post['long_url'] = $url;

        try {

            $response = $client->request('POST', 'shorten', [
                'headers'    =>  $headers,
                'json'      => $post
            ]);

            $response = json_decode($response->getBody());

            if (is_object($response) && isset($response->link)) {
                $short_url = $response->link;
                $this->setShortUrl($short_url);
            } else {
                throw new BitlyException("No short link found. Probably missing/wrong token");
            }

        } catch (\GuzzleHttp\Exception\ClientException $e) {

            throw new BitlyException("No short link found. Probably missing/wrong token");

        }
    }


    /**
     * @return null
     */
    private function getToken()
    {
        return $this->token;
    }

    /**
     * @param null $token
     */
    private function setToken($token): void
    {
        $this->token = $token;
    }

    /**
     * Return the base API Url
     *
     * @since 1.0.0
     * @author @sineverba
     */
    private function getApiUrl()
    {
        return $this->api_url;
    }

    /**
     * @return mixed
     */
    public function getShortUrl()
    {
        return $this->short_url;
    }

    /**
     * @param mixed $short_url
     */
    private function setShortUrl($short_url): void
    {
        $this->short_url = $short_url;
    }

}