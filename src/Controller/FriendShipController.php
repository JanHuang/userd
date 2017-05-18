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
use Psr\Http\Message\ServerRequestInterface;

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

        $followers = model('friendShip')->findFollowing($request->getAttribute('id'));

        return json($followers, Response::HTTP_CREATED);
    }

    /**
     * @param ServerRequest $request
     * @return JsonResponse
     */
    public function removeFollower(ServerRequest $request)
    {
        $userId = $request->getAttribute('id');
        $followId = $request->getAttribute('follow');

        $result = model('friendShip')->removeFollowRelationShip($userId, $followId);

        if ($result) {
            return json([], Response::HTTP_NO_CONTENT);
        }

        return json([
            'msg' => 'Unfollow fail.',
            'code' => '10086'
        ], Response::HTTP_BAD_REQUEST);
    }
}