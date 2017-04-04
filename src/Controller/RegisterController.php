<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Controller;


use FastD\Http\ServerRequest;
use FastD\Utils\DateObject;
use Services\Password;

/**
 * Class RegisterController
 * @package Controller
 */
class RegisterController
{
    public function register(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $data['password'] = Password::hash($data['password']);
        $data['created'] = (new DateObject())->format('Y-m-d H:i:s');

        $user = model('user')->createUser($data);

        $token = model('token')->createToken($user['id']);

        return json([
            'access_token' => $token
        ]);
    }
}