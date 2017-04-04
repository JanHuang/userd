<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Controller;


use FastD\Http\JsonResponse;
use FastD\Http\ServerRequest;

/**
 * Class LoginController
 * @package Controller
 */
class LoginController
{
    public function login(ServerRequest $request)
    {
        $identification = $request->getParsedBody()['identification'];
        $password = $request->getParsedBody()['password'];

        $user = model('user')->matchUser($identification, $password);

        if ($user instanceof JsonResponse) {
            return $user;
        }

        $token = model('token');

        $token = $token->createToken($user['id']);

        return json([
            'access_token' => $token
        ]);
    }

    public function logout(ServerRequest $request)
    {}
}