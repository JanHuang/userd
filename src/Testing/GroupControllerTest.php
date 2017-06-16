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
                'created' => date('Y-m-d H:i:s'),
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
                [
                    'id' => 1,
                    'name_singular' => 'admin',
                    'name_plural' => 'admins',
                    'created' => '2017-04-09 22:36:48',
                ],
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
                'created' => '2017-04-09 22:36:48',
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
                'created' => '2017-04-09 22:36:48',
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
