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

class ProfileModel extends Model
{
    public function findProfile($id)
    {

        $profile = $this->db->get('profile', '*', [
            'user_id' => $id
        ]);

        return false === $profile ? [] : $profile;
    }

    public function setProfile($id, array $profile)
    {
        $this->db->update('profile', $profile, [
            'user_id' => $id
        ]);

        return $this->findProfile($id);
    }

    public function deleteProfile($id)
    {
        $this->db->delete('profile', [
            'user_id' => $id
        ]);

        return [];
    }
}