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

class ProfileController
{
    public function getProfile(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->findProfile($id);

        return json($profile);
    }

    public function setProfile(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->setProfile($id);

        return json($profile);
    }

    public function deleteProfile(ServerRequest $request)
    {
        $id = $request->getAttribute('id');

        $profile = model('profile')->setProfile($id);

        return json($profile, Response::HTTP_NO_CONTENT);
    }
}