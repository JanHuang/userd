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
        $this->equalsJson($response, []);
    }

    public function testFollowing()
    {
        $request = $this->request('GET', '/api/following/1');
        $response = $this->handleRequest($request);
        $this->equalsJson($response, [
            [
                'nickname' => 'bar',
                'user_id' => "1",
                "username" => 'foo',
                'birthday' => '2017-04-09 22:36:48',
                'gender' => "1",
                'avatar' => '',
                'created' => '2017-04-09 22:36:48',
            ]
        ]);
    }

    public function testFollow()
    {
        $request = $this->request('POST', '/api/follow/2');
        $response = $this->handleRequest($request, [
            'user_id' => 1
        ]);
        $request = $this->request('GET', '/api/followers/1');
        $response = $this->handleRequest($request);
        echo $response;
    }
}
