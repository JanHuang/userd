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
    const JSON_OPTION = JSON_NUMERIC_CHECK;

    public function testFollowers()
    {
        $request = $this->request('GET', '/api/users/1/followers');
        $response = $this->handleRequest($request);
        $this->equalsJson($response, []);
    }

    public function testFollowing()
    {
        $request = $this->request('GET', '/api/users/1/followings');
        $response = $this->handleRequest($request);
        $this->equalsJson($response, [
            [
                'nickname' => 'foo',
                'user_id' => "2",
                "username" => 'bar',
                'birthday' => '2017-04-09 22:36:48',
                'gender' => "1",
                'avatar' => '',
                'created' => '2017-04-09 22:36:48',
                'followers' => 0,
                'followings' => 0,
            ]
        ]);
        $this->equalsStatus($response, 200);
    }

    public function testFollow()
    {
        $request = $this->request('POST', '/api/users/2/follow');
        $response1 = $this->handleRequest($request, [
            'user_id' => 1
        ]);
        $this->equalsStatus($response1, 201);
        $request = $this->request('GET', '/api/users/2/followers');
        $response = $this->handleRequest($request);
        $this->assertEquals($response1->getBody()->getContents(), $response->getBody()->getContents());
    }

    public function testDeleteRelationShip()
    {
        $request = $this->request('GET', '/api/users/1/followings');
        $response = $this->handleRequest($request);
        $this->assertNotEmpty(json_decode((string) $response->getBody(), true));

        $request = $this->request('DELETE', '/api/users/1/followers/2');
        $response = $this->handleRequest($request);
        $this->assertEquals($response->getStatusCode(), 204);

        $request = $this->request('GET', '/api/users/1/followings');
        $response = $this->handleRequest($request);
        $this->assertEmpty(json_decode((string) $response->getBody(), true));
    }
}
