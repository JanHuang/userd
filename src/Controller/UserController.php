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

/**
 * Class UserController
 * @package Controller
 */
class UserController
{
    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function findUsers(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('user')->findProfile($id);

        return json($profile);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function findUser(ServerRequest $request)
    {
        $data = $request->getAttributes();

        $result = model('profile')->findProfile($data['user_id']);

        foreach ($data as $key => $value) {
            $result[$key] = $value;
        }

        $result['updated'] = date("Y-m-d", time());

        $profile = model('profile')->setProfile($result['user_id'], $result);

        return json($profile);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function createUser(ServerRequest $request)
    {
        $user = model('user');

        $data = $request->getParsedBody();

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $user->createUser($data);

        return json($request->getParsedBody());
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function patchUser(ServerRequest $request)
    {
        $user = model('user');

        parse_str($request->getBody(), $data);

        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

        $user->patchUser($request->getAttribute('id'), $data);

        return json($request->getParsedBody());
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function deleteUser(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->deleteProfile($id);

        return json($profile, Response::HTTP_NO_CONTENT);
    }
}