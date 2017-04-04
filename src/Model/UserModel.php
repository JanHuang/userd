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

class UserModel extends Model
{
    const TABLE = 'users';

    public function findUser($id)
    {
        $profile = $this->db->get(static::TABLE, '*', [
            'OR' => [
                'id' => $id,
                'username' => $id
            ]
        ]);

        return false === $profile ? [] : $profile;
    }

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

    public function createUser(array $user)
    {
        $id = $this->db->insert(static::TABLE, $user);

        return $this->findUser($id);
    }

    public function deleteUser($id)
    {
        $this->db->delete(static::TABLE, [
            'user_id' => $id
        ]);

        return [];
    }
}