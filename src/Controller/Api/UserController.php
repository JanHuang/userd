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
use Services\Password;

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
        $query = $request->getQueryParams();
        $page = isset($query['p']) ? (int) $query['p'] : 1;
        $limit = isset($query['limit']) ? (int) $query['limit'] : 15;

        $profile = model('user')->findUsers($page, $limit);

        return json($profile);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function findUser(ServerRequest $request)
    {
        $user = model('user')->findUser($request->getAttribute('id'));

        return json($user);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function createUser(ServerRequest $request)
    {
        $user = model('user');

        $data = $request->getParsedBody();

        if (isset($data['password'])) {
            $data['password'] = Password::hash($data['password']);
        }

        $user = $user->createUser($data);

        return json($user, Response::HTTP_CREATED);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function patchUser(ServerRequest $request)
    {
        $user = model('user');

        parse_str($request->getBody(), $data);

        $data['password'] = Password::hash($data['password']);

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

        $profile = model('user')->deleteUser($id);

        return json($profile, Response::HTTP_NO_CONTENT);
    }

    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function avatar(ServerRequest $request)
    {
        if (!isset($request->uploadFile['avatar'])) {
            return json([
                'code' => 400,
                'msg' => 'please choice avatar image.'
            ], Response::HTTP_BAD_REQUEST);
        }

        $path = config()->get('upload.path');

        $file = $request->uploadFile['avatar']->moveTo($path);

        $relativePath = str_replace(app()->getPath() . '/web', '', $file);

        $user = model('user')->patchUser($request->getAttribute('id'), [
            'avatar' => $relativePath
        ]);
        return json($user);
    }

    public function optionsUser(ServerRequest $request)
    {
        return json([
            'headers' => $request->getHeaders(),
            'body' => (string) $request->getBody(),
            'query' => $request->getQueryParams(),
            'post' => $request->getParsedBody(),
        ]);
    }
}