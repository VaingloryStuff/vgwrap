<?php
/**
 * Created by PhpStorm.
 * User: ashe
 * Date: 7/24/17
 * Time: 7:19 PM
 */

namespace agangofkittens\vgwrap;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class VGWrapClient
 *
 * Simple PHP client to interact with the Vainglory API
 *
 * @method ResponseInterface get($uri, array $options = [])
 * @method ResponseInterface head($uri, array $options = [])
 * @method ResponseInterface put($uri, array $options = [])
 * @method ResponseInterface post($uri, array $options = [])
 * @method ResponseInterface patch($uri, array $options = [])
 * @method ResponseInterface delete($uri, array $options = [])
 *
 * @package agangofkittens\vgwrap
 * @author agangofkittens <agangofktitens@gmail.com>
 */
class VGWrapClient
{
    /**
     * @var \GuzzleHttp\Client
     */
    private $client;

    protected $api_key;

    protected $base_uri;

    /**
     * @param $api_key
     * @param array
     */
    public function __construct($api_key, $base_uri)
    {
        $this->setAPIkey($api_key);
        $this->setBaseUri($base_uri);
    }

    /**
     * Set API key
     *
     * @param $api_key
     * @return mixed
     */
    public function setAPIkey($api_key)
    {
        return ($this->api_key = $api_key);
    }

    /**
     * @return string API_KEY
     */
    public function getAPIkey()
    {
        return $this->api_key;
    }

    /**
     * Set base URL
     *
     * @param $base_uri
     * @return mixed
     */
    public function setBaseUri($base_uri)
    {
        return ($this->base_uri = $base_uri);
    }

    /**
     * Get base URL
     *
     * @return mixed
     */
    public function getBaseUri()
    {
        return $this->base_uri;
    }

    /**
     * Set client
     *
     * @param ClientInterface $client
     * @return $this
     */
    public function setClient(ClientInterface $client)
    {
        $this->client = $client;
        return $this;
    }

    /**
     * Get GuzzleClient, create if it's null
     *
     * @param array $config
     * @return Client
     */
    public function getClient(array $config = [])
    {
        $config = array_merge($config, [
            'base_uri' => $this->getBaseUri(),
            'headers' => [
                'Authorization' => $this->getAPIkey(),
                'Accept' => 'application/vnd.api+json',
                'Accept-Encoding' => 'gzip'
            ]

        ]);

        if (!$this->client) {
            $this->client = new Client($config);
        }

        return $this->client;
    }

    /**
     * Shortcut
     *
     * @param $uri
     * @param array $options
     * @return mixed
     */
    public function getData($uri, $options = [])
    {
        return json_decode($this->getClient()->get($uri, $options)->getBody()->getContents());
    }

    /**
     * Perform a request
     *
     * @param $method
     * @param string $uri
     * @param array $options
     * @return mixed|ResponseInterface
     */
    public function request($method, $uri = '', array $options = [])
    {
        return $this->client->request($method, $uri, $options);
    }

    /**
     * Forward any other call to guzzle client.
     *
     * @param $method
     * @param $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        return call_user_func_array([$this->getClient(), $method], $parameters);
    }
}
