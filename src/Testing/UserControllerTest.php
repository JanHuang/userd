<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @see      https://www.github.com/janhuang
 * @see      http://www.fast-d.cn/
 */

namespace Testing;

use FastD\Http\UploadedFile;
use FastD\TestCase;

class UserControllerTest extends TestCase
{
    public function testRegister()
    {
        $request = $this->request('POST', '/api/register');
        $request->withParsedBody(
            [
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
            ]
        );
        $response = $this->app->handleRequest($request);
        $this->equalsJsonResponseHasKey($response, ['token', 'user_id']);
    }

    public function testUserLogin()
    {
        $request = $this->request('POST', '/api/login');
        $request->withParsedBody(
            [
                'identification' => 'foo',
                'password' => '123456',
            ]
        );
        $response = $this->app->handleRequest($request);
        $this->equalsJsonResponseHasKey($response, ['token', 'user_id']);
    }

    public function testUsers()
    {
        $request = $this->request('GET', '/api/users');
        $response = $this->handleRequest($request);
        $this->equalsJsonResponseHasKey($response, ['list', 'page']);
    }

    public function testFindUser()
    {
        $request = $this->request('GET', '/api/users/1');
        $response = $this->handleRequest($request);
        $this->equalsJsonResponseHasKey(
            $response,
            [
                'id',
                'username',
                'nickname',
            ]
        );
    }

    public function testAddUser()
    {
        $request = $this->request('POST', '/api/users');
        $response = $this->handleRequest(
            $request,
            [
                'id' => 3,
                'username' => 'bar',
                'nickname' => 'foo',
                'password' => '123456',
            ]
        );
        $this->assertEquals(201, $response->getStatusCode());
    }

    public function testUpload()
    {
        $request = $this->request('POST', '/api/users/1/avatar');
        $request->withUploadedFiles(
            [
                'avatar' => new UploadedFile('test.png', 'images/png', __DIR__.'/avatar.jpeg', 0, filesize(__DIR__.'/avatar.jpeg')),
            ]
        );
        $response = $this->handleRequest($request);
        $json = json_decode((string) $response->getBody(), true);
        $this->assertNotEmpty($json['avatar']);
    }
}
