<?php

namespace Model;


use FastD\Model\Model;

/**
 * Class GroupModel
 * @package Model
 */
class GroupModel extends Model
{
    const TABLE = 'groups';
    const LIMIT = '15';

    /**
     * @param int $page
     * @return array
     */
    public function select($page = 1, $limit = 15)
    {
        if ($limit <= 5) {
            $limit = 5;
        } else {
            if ($limit >= 25) {
                $limit = 25;
            }
        }
        $offset = ($page - 1) * $limit;

        $data = $this->db->select(
            static::TABLE,
            '*',
            [
                'LIMIT' => [$offset, $limit],
                'ORDER' => ['created_at' => 'DESC'],
            ]
        );

        return [
            'data' => $data,
            'total' => $this->db->count(static::TABLE),
            'offset' => $offset,
            'limit' => $limit
        ];
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function find($id)
    {
        return $this->db->get(
            static::TABLE,
            '*',
            [
                'OR' => [
                    'id' => $id,
                ],
            ]
        );
    }

    /**
     * @param $id
     * @param array $data
     * @return bool|mixed
     */
    public function patch($id, array $data)
    {
        $this->db->update(
            static::TABLE,
            $data,
            [
                'OR' => [
                    'id' => $id,
                ],
            ]
        );

        return $this->find($id);
    }

    /**
     * @param array $data
     * @return bool|mixed
     */
    public function create(array $data)
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->db->insert(static::TABLE, $data);

        return $this->find($this->db->id());
    }

    /**
     * @param $id
     * @return bool|int
     */
    public function delete($id)
    {
        return $this->db->delete(
            static::TABLE,
            [
                'id' => $id,
            ]
        );
    }
}