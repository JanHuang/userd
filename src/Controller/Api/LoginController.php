<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Controller\Api;


use FastD\Http\JsonResponse;
use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class LoginController
 * @package Controller
 */
class LoginController
{
    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function login(ServerRequest $request)
    {
        $identification = $request->getParsedBody()['identification'];
        $password = $request->getParsedBody()['password'];

        $user = model('user')->matchUser($identification, $password);

        if ($user instanceof JsonResponse) {
            return $user;
        }

        $token = model('token')->createToken($user['id']);

        return json([
            'token' => $token,
            'user_id' => $user['id']
        ]);
    }

    public function logout(ServerRequest $request)
    {
        $token = $request->getParsedBody()['access_token'];
        model('token')->expireToken($token);

        return json([], Response::HTTP_NO_CONTENT);
    }
}