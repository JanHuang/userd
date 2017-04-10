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
use FastD\Test\TestCase;

class GroupControllerTest extends TestCase
{
    public function testGroupAdd()
    {
        $request = $this->request('POST', '/api/groups');
        $request->withParsedBody([
            'name_singular' => 'manager',
            'name_plural' => 'managers'
        ]);
        $response = $this->app->handleRequest($request);
        $this->json($response, [
            'id' => 2,
            'name_singular' => 'manager',
            'name_plural' => 'managers',
            'created' => date('Y-m-d H:i:s'),
        ]);
    }

    public function testGroups()
    {
        $request = $this->request('GET', '/api/groups');
        $response = $this->app->handleRequest($request);
    }
}
