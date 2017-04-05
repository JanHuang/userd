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

/**
 * Class TokenModel
 * @package Model
 */
class TokenModel extends Model
{
    const TABLE = 'tokens';

    /**
     * @param $userId
     * @return string
     */
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

    /**
     * @param $token
     * @return bool|int
     */
    public function expireToken($token)
    {
        return $this->db->update(static::TABLE, ['status' => 0], [
            'access_token' => $token,
        ]);
    }

    public function findToken($token)
    {

    }
}