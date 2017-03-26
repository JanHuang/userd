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

class RegisterController
{
    public function register(ServerRequest $request)
    {

        $data = $request->getParsedBody();

        $data['created'] = date("Y-m-d");
        $data['updated'] = date("Y-m-d");

        foreach ($data as $value){
            if(!$value) {
                return json([
                    'status' => 0,
                    'msg'    => '数据填写不正确,重新填写'
                ]);
            }
        }

        $account = model('account')->create($data);

        return json($account);
    }
}