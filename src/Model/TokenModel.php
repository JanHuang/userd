<?php
/**
 * @author    jan huang <bboyjanhuang@gmail.com>
 * @copyright 2016
 *
 * @link      https://www.github.com/janhuang
 * @link      http://www.fast-d.cn/
 */

namespace Model;


use FastD\Model\Model;

class TokenModel extends Model
{
    const TABLE = 'tokens';

    public function createToken($userId)
    {
        $accessToken = md5($userId . time());

        $this->db->insert(static::TABLE, [
            'access_token' => $accessToken,
            'user_id' => $userId,
            'created' => date('Y-m-d H:i:s')
        ]);

        return $accessToken;
    }

    public function refreshToken()
    {}

    public function expireToken()
    {}

    public function findToken($token)
    {

    }
}