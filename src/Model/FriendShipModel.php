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
use PDO;

/**
 * Class FriendShipModel
 * @package Model
 */
class FriendShipModel extends Model
{
    const TABLE = 'friend_ship';

    /**
     * @param $userId
     * @param $followId
     * @return bool|int
     */
    public function createFollowRelationShip($userId, $followId)
    {
        return $this->db->insert(static::TABLE, [
            'user_id' => $userId,
            'follow_id' => $followId,
            'created' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * @param $userId
     * @return array
     */
    public function findFollowers($userId)
    {
        $sql = "select users.nickname, users.id as user_id, users.username, users.birthday, users.gender, users.avatar, friend_ship.created from users left JOIN friend_ship on users.id = friend_ship.user_id WHERE friend_ship.follow_id = " . $userId;

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @param $userId
     * @return array
     */
    public function findFollowing($userId)
    {
        $sql = "select users.nickname, users.id as user_id, users.username, users.birthday, users.gender, users.avatar, friend_ship.created from users LEFT JOIN friend_ship on users.id = friend_ship.user_id WHERE friend_ship.user_id = " . $userId;

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}