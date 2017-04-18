<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use Controller\UserController;
use FastD\TestCase;

class UserControllerTest extends TestCase
{
    public function testRegister()
    {
        $request = $this->request('POST', '/api/register');
        $request->withParsedBody([
            'username' => 'bar',
            'nickname' => 'foo',
            'birthday' => date('Y-m-d H:i:s'),
            'gender' => 1,
            'avatar' => '',
            'email' => '',
            'phone' => '',
            'password' => password_hash('123456', PASSWORD_DEFAULT),
            'country' => '中国',
            'province' => '广东省',
            'city' => '广州市',
            'region' => '天河区',
            'from' => 'qq',
        ]);
        $response = $this->app->handleRequest($request);
        $this->equalsJsonResponseHasKey($response, ['token', 'user_id']);
    }

    public function testUserLogin()
    {
        $request = $this->request('POST', '/api/login');
        $request->withParsedBody([
            'identification' => 'foo',
            'password' => '123456'
        ]);
        $response = $this->app->handleRequest($request);
        $this->equalsJsonResponseHasKey($response, ['token', 'user_id']);
    }
}
