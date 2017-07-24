<?php
/**
 * Created by PhpStorm.
 * User: ashe
 * Date: 7/24/17
 * Time: 7:19 PM
 */

namespace agangofkittens\VGWrap;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\ClientInterface as GuzzleClientInterface;
use agangofkittens\VGWrap\VGWrapException as VGWrapException;

/**
 * Class VGWrapClient
 * @package agangofkittens\vgwrap
 * @author agangofkittens <agangofktitens@gmail.com>
 */
class VGWrapClient
{
    /**
     * Vainglory API endpoint
     * @var
     */
    const END_POINT = 'https://api.dc01.gamelockerapp.com/';

    /**
     * @var object GuzzleClient
     */
    protected $client;

    /**
     * @var string API_KEY
     */
    protected $API_KEY;

    /**
     * @var int
     */
    protected $errorCode = 0;

    /**
     * @var string
     */
    protected $errorMessage = null;

    /**
     * @var array
     */
    protected $response;

    /**
     * @var array
     */
    protected $results;

    /**
     * shards
     * @var array
     */
    public static $shards = [
        'na' => 'shards/na/',
        'eu' => 'shards/eu/',
        'sa' => 'shards/sa/',
        'ea' => 'shards/ea/',
        'sg' => 'shards/sg/',
        'tournament-na' => 'shards/tournament-na',
        'tournament-eu' => 'shards/tournament-eu/',
        'tournament-sa' => 'shards/tournament-sa',
        'tournament-ea' => 'shards/tournament-ea/',
        'tournament-sg' => 'shards/tournament-sg/'
    ];

    public static $validCallbacks = [
        'getPlayerById'
        // ...
    ];

    /**
     * VGWrapClient constructor.
     * @param $API_KEY
     */
    public function __construct($API_KEY)
    {
        $this->setAPIkey($API_KEY);
    }

    /**
     * Set client
     * @param GuzzleClientInterface|object $client
     * @return object
     */
    public function setClient(GuzzleClientInterface $client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get GuzzleClient, create it if it's null.
     * @return object
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new GuzzleClient(array('defaults' => array('allow_redirects' => false, 'cookies' => true)));
        }

        return $this->client;
    }

    /**
     * @param string $API_KEY
     * @return string API_KEY
     */
    public function setAPIkey($API_KEY)
    {
        return ($this->API_KEY = $API_KEY);
    }

    /**
     * @return string API_KEY
     */
    public function getAPIkey()
    {
        return $this->API_KEY;
    }

    /**
     * Check if the last request was successful
     * @return bool
     */
    public function isSuccessful()
    {
        return (bool)((int)$this->errorCode === 0);
    }

    /**
     * return the status code from the last call
     * @return int
     */
    public function getStatusCode()
    {
        return $this->errorCode;
    }

    /**
     * return the status message from the last call
     * @return string
     */
    public function getStatusMessage()
    {
        return $this->errorMessage;
    }

    /**
     * return the results array from the call
     * @return array
     */
    public function getResults()
    {
        return $this->results;
    }

    /**
     * magic method to invoke the correct API call
     * if the passed name is within the valid callbacks
     * @param string $name
     * @param array $arguments
     * @return array
     */
    public function __call($name, $arguments)
    {
        if (in_array($name, self::$validCallbacks)) {
            return $this->doRequest($arguments);
        }
    }

    /**
     * set the status code and message of the API call
     * @param int $code
     * @param string $message
     * @return void
     */
    protected function setStatus($code, $message)
    {
        $this->errorCode = $code;
        $this->errorMessage = $message;
    }

    protected function doRequest(array $params)
    {
        // Validate
        if (!$this->getAPIkey()) {
            throw new VGWrapException("You must submit the API key");
        }
        // Run the call
        $response = $this->getClient()->get(self::END_POINT, +$params); // wat.
        $this->response = $response; // do something with it, idk
        // Parse response
        return $this->parseResponse($this->response);
    }

    protected function parseResponse($response)
    {
        $this->response = json_decode($response, true);

        return $this->response;
    }
}
