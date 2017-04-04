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

class FriendShipModel extends Model
{
    const TABLE = 'friend_ship';

    public function createFollowRelationShip($userId, $followId)
    {
        return $this->db->insert(static::TABLE, [
            'user_id' => $userId,
            'follow_id' => $followId,
            'created' => date('Y-m-d H:i:s'),
        ]);
    }

    public function findFollowers($userId)
    {
        $sql = "select * from friend_ship WHERE follow_id = " . $userId;

        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findFollowing($userId)
    {
        $sql = "select * from friend_ship WHERE user_id = " . $userId;
        
        return $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
    }
}