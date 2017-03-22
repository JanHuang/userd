<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Controller;


use FastD\Http\Response;
use FastD\Http\ServerRequest;

/**
 * Class ProfileController
 * @package Controller
 */
class ProfileController
{
    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function getProfile(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->findProfile($id);

        return json($profile);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function setProfile(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->setProfile($id);

        return json($profile);
    }

    /**
     * @param ServerRequest $request
     * @return \FastD\Http\JsonResponse
     */
    public function deleteProfile(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->setProfile($id);

        return json($profile, Response::HTTP_NO_CONTENT);
    }
}