<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use Controller\FriendShipController;
use FastD\TestCase;

class FriendShipControllerTest extends TestCase
{
    public function testFollowers()
    {
        $request = $this->request('GET', '/api/followers/1');
        $response = $this->handleRequest($request);
    }

    public function testFollowing()
    {
        $request = $this->request('GET', '/api/following/1');
        $response = $this->handleRequest($request);
        echo $response->getBody();
    }
}
