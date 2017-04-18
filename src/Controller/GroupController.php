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
 * Class GroupController
 * @package Controller
 */
class GroupController
{
    public function createGroup(ServerRequest $request)
    {
        $group = model('group')->create($request->getParsedBody());

        return json($group, Response::HTTP_CREATED);
    }

    public function patchGroup(ServerRequest $request)
    {
        parse_str($request->getBody(), $data);

        $groups = model('group')->patch($request->getAttribute('id'), $data);

        return json($groups);
    }

    public function deleteGroup(ServerRequest $request)
    {
        model('group')->delete($request->getAttribute('id'));

        return json([], Response::HTTP_NO_CONTENT);
    }

    public function findGroups(ServerRequest $request)
    {
        $groups = model('group')->select();

        return json($groups);
    }

    public function findGroup(ServerRequest $request)
    {
        $groups = model('group')->find($request->getAttribute('id'));

        return json($groups);
    }
}