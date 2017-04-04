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
use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class FriendShipController
 * @package Controller
 */
class FriendShipController
{
    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function followers(ServerRequest $request)
    {
        $followers = model('friendShip')->findFollowers($request->getAttribute('id'));

        return json($followers);
    }

    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function following(ServerRequest $request)
    {
        $followers = model('friendShip')->findFollowing($request->getAttribute('id'));

        return json($followers);
    }

    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function follow(ServerRequest $request)
    {
        $body = $request->getParsedBody();

        model('friendShip')->createFollowRelationShip($request->getAttribute('id'), $body['user_id']);

        return json([

        ], Response::HTTP_CREATED);
    }
}