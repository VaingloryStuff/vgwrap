<?php
/**
 * Created by PhpStorm.
 * User: ashe
 * Date: 7/24/17
 * Time: 11:44 PM
 */

use agangofkittens\vgwrap\VGWrapClient;
use GuzzleHttp\Client as GuzzleClient;
use PHPUnit\Framework\TestCase;

/**
 * Class ClientTest
 *
 * @author agangofkittens <agangofkittens@gmail.com>
 */
class ClientTest extends TestCase
{
    public function testCreateDefaultClient()
    {
        $client = new VGWrapClient('apikey');
        $this->assertInstanceOf('GuzzleHttp\\ClientInterface', $client->getClient());
    }

    public function testUseCustomClient()
    {
        $guzzle = new GuzzleClient();
        $client = new VGWrapClient('apikey');
        $this->assertSame($client, $client->setClient($guzzle));
        $this->assertSame($guzzle, $client->getClient());
    }

    public function testAPIkey()
    {
        $client = new VGWrapClient('apikey');
        $this->assertSame('apikey', $client->getAPIkey());
    }
}
