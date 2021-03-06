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
        $isOk = $this->db->insert(
            static::TABLE,
            [
                'user_id' => $userId,
                'follow_id' => $followId,
                'created_at' => date('Y-m-d H:i:s'),
            ]
        );

        if ($isOk) {
            $this->db->query('update users set followers = followers + 1 WHERE id = '.$userId)->execute();
            $this->db->query('update users set followings = followings + 1 WHERE id = '.$followId)->execute();
        }

        return $isOk;
    }

    /**
     * @param $userId
     * @param $followId
     * @return bool|int
     */
    public function removeFollowRelationShip($userId, $followId)
    {
        $isOk = $this->db->delete(
            static::TABLE,
            [
                'user_id' => $userId,
                'follow_id' => $followId,
            ]
        );

        if ($isOk) {
            if ($isOk) {
                $this->db->query('update users set followers = followers - 1 WHERE id = '.$userId)->execute();
                $this->db->query('update users set followings = followings - 1 WHERE id = '.$followId)->execute();
            }
        }

        return $isOk;
    }

    /**
     * @param $userId
     * @param $page
     * @param $limit
     * @return array
     */
    public function findFollowers($userId, $page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else {
            if ($limit >= 25) {
                $limit = 25;
            }
        }

        $offset = ($page - 1) * $limit;

        $total = $this->getTotal($userId, 'follow_id');

        $sql = "
select 
  users.nickname, 
  users.id as user_id, 
  users.username, 
  users.birthday, 
  users.gender, 
  users.avatar,  
  users.followings,
  users.followers,
  friend_ship.created_at
from 
  users left JOIN friend_ship 
  on users.id = friend_ship.user_id 
WHERE 
  friend_ship.follow_id = $userId
ORDER BY friend_ship.created_at DESC 
LIMIT {$offset}, {$limit}";

        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return [
            'data' => $data,
            'offset' => $offset,
            'limit' => $limit,
            'total' => $total,
        ];
    }

    /**
     * @param $userId
     * @param int $page
     * @param int $limit
     * @return array
     */
    public function findFollowing($userId, $page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else {
            if ($limit >= 25) {
                $limit = 25;
            }
        }

        $offset = ($page - 1) * $limit;

        $total = $this->getTotal($userId, 'user_id');

        $sql = "
select 
  users.nickname, 
  users.id as user_id, 
  users.username, 
  users.birthday, 
  users.gender, 
  users.avatar, 
  users.followers, 
  users.followings,
  friend_ship.created_at 
from 
  users LEFT JOIN friend_ship 
  on users.id = friend_ship.follow_id 
WHERE friend_ship.user_id = ".$userId." ORDER BY friend_ship.created_at DESC LIMIT {$offset}, {$limit}";
        $data = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);

        return [
            'data' => $data,
            'offset' => $offset,
            'limit' => $limit,
            'total' => $total,
        ];
    }

    public function getTotal($userId, $where = 'user_id')
    {
        return $this->db->count('friend_ship', [$where => $userId]);
    }
}