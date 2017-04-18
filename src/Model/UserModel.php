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
     * @return array
     */
    public function findUsers($page = 1)
    {
        return $this->db->select(static::TABLE, [
            'id', 'username', 'nickname', 'birthday', 'gender', 'avatar', 'country', 'province', 'city', 'region', 'from',
        ]);
    }

    /**
     * @param $id
     * @return array|bool|mixed
     */
    public function findUser($id)
    {
        $profile = $this->db->get(static::TABLE, ['id', 'username', 'nickname', 'birthday', 'gender', 'avatar', 'country', 'province', 'city', 'region', 'from',], [
            'OR' => [
                'id' => $id,
                'username' => $id
            ]
        ]);

        return false === $profile ? [] : $profile;
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