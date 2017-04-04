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

class GroupController
{
    public function createGroup(ServerRequest $request)
    {
        $group = model('group')->createGroup();

        return json($group, Response::HTTP_CREATED);
    }

    public function patchGroup()
    {

    }

    public function deleteGroup()
    {}

    public function findGroup()
    {}

    public function addUserInGroup()
    {

    }
}