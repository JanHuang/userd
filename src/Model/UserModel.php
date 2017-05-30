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
use Services\Password;

/**
 * Class UserModel
 * @package Model
 */
class UserModel extends Model
{
    const TABLE = 'users';

    /**
     * @param $identification
     * @param $password
     * @return array|bool|\FastD\Http\JsonResponse|mixed
     */
    public function matchUser($identification, $password)
    {
        $user = $this->db->get(static::TABLE, ['id', 'password'], [
            'OR' => [
                'id' => $identification,
                'username' => $identification
            ]
        ]);

        if (empty($user)) {
            return json([
                'code' => '404',
                'msg' => 'cannot found user'
            ], 404);
        }

        $isPass = Password::verify($password, $user['password']);

        if (!$isPass) {
            return json([
                'code' => 400,
                'msg' => 'identification or password match error'
            ], 400);
        }

        return $user;
    }

    /**
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function findUsers($page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else if ($limit >= 25) {
            $limit = 25;
        }

        $users = $this->db->select(static::TABLE, [
            'id', 'username', 'nickname', 'birthday', 'gender', 'avatar', 'followings', 'followers', 'country', 'province', 'city', 'region', 'from',
        ], [
            'LIMIT' => [($page - 1) * 15, $limit]
        ]);
        $total = $this->db->count(static::TABLE);

        $users = array_map(function ($v) {
            if (!empty($v['avatar'])) {
                $v['avatar'] = sprintf('%s://%s%s', request()->getUri()->getScheme(), request()->getUri()->getHost() . (request()->getUri()->getPort()), $v['avatar']);
            }
            return $v;
        }, $users);

        return [
            'list' => $users,
            'page' => [
                'total' => ceil($total / 15),
                'current' => $page,
                'limit' => $limit,
                'count' => $total,
            ]
        ];
    }

    /**
     * @param $id
     * @return array|bool|mixed
     */
    public function findUser($id)
    {
        $sql = <<<SQL
SELECT 
  id,
  username,
  nickname,
  birthday,
  gender,
  avatar,
  country,
  province,
  city,
  region,
  0 as followers,
  0 as folloings
FROM users
WHERE id = {$id} OR username = '{$id}'
SQL;

        return $this->db->query($sql)->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $id
     * @param array $user
     * @return array|bool|mixed
     */
    public function patchUser($id, array $user)
    {
        $this->db->update(static::TABLE, $user, [
            'OR' => [
                'id' => $id,
                'username' => $id,
            ]
        ]);

        return $this->findUser($id);
    }

    /**
     * @param array $user
     * @return array|bool|mixed
     */
    public function createUser(array $user)
    {
        $id = $this->db->insert(static::TABLE, $user);

        return $this->findUser($id);
    }

    /**
     * @param $id
     * @return array
     */
    public function deleteUser($id)
    {
        $this->db->delete(static::TABLE, [
            'user_id' => $id
        ]);

        return [];
    }
}