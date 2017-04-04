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

/**
 * Class RegisterController
 * @package Controller
 */
class RegisterController
{
    public function register(ServerRequest $request)
    {
        $data = $request->getParsedBody();

        $data['created'] = (new DateObject())->format('Y-m-d H:i:s');

        $account = model('user')->create($data);

        return json($account);
    }
}