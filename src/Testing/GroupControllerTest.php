<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use Controller\GroupController;
use FastD\TestCase;

class GroupControllerTest extends TestCase
{
    const JSON_OPTION = JSON_UNESCAPED_UNICODE;

    public function testGroupAdd()
    {
        $request = $this->request('POST', '/api/groups');
        $request->withParsedBody(
            [
                'name_singular' => 'manager',
                'name_plural' => 'managers',
            ]
        );
        $response = $this->handleRequest($request);
        $this->equalsJson(
            $response,
            [
                'id' => 2,
                'name_singular' => 'manager',
                'name_plural' => 'managers',
                'is_available' => 0,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => '0000-00-00 00:00:00',
            ]
        );

        $this->equalsStatus($response, 201);
    }

    public function testGroups()
    {
        $request = $this->request('GET', '/api/groups');
        $response = $this->handleRequest($request);
        $this->equalsJson(
            $response,
            [
                'data' => [
                    [
                        'id' => 1,
                        'name_singular' => 'admin',
                        'name_plural' => 'admins',
                        'is_available' => 0,
                        'created_at' => '2017-04-09 22:36:48',
                        'updated_at' => '0000-00-00 00:00:00',
                    ],
                ],
                'total' => 1,
                'offset' => 0,
                'limit' => 15,
            ]
        );
    }

    public function testFindGroup()
    {
        $request = $this->request('GET', '/api/groups/1');
        $response = $this->handleRequest($request);
        $this->equalsJson(
            $response,
            [
                'id' => 1,
                'name_singular' => 'admin',
                'name_plural' => 'admins',
                'is_available' => 0,
                'created_at' => '2017-04-09 22:36:48',
                'updated_at' => '0000-00-00 00:00:00'
            ]
        );
    }

    public function testPatchGroup()
    {
        $request = $this->request('PATCH', '/api/groups/1');
        $name = 'manager admin';
        $response = $this->handleRequest(
            $request,
            [
                'name_singular' => $name,
            ]
        );
        $this->equalsJson(
            $response,
            [
                'id' => 1,
                'name_singular' => $name,
                'name_plural' => 'admins',
                'is_available' => 0,
                'created_at' => '2017-04-09 22:36:48',
                'updated_at' => '0000-00-00 00:00:00'
            ]
        );
    }

    public function testDeleteGroup()
    {
        $request = $this->request('DELETE', '/api/groups/1');
        $response = $this->handleRequest($request);
        $this->equalsStatus($response, 204);
        $this->equalsJson($response, []);
    }
}
