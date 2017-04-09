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
    public function select($page = 1)
    {
        $offset = ($page - 1) * static::LIMIT;
        return $this->db->select(static::TABLE, '*', [
            'LIMIT' => [$offset, static::LIMIT]
        ]);
    }

    /**
     * @param $id
     * @return bool|mixed
     */
    public function find($id)
    {
        return $this->db->get(static::TABLE, '*', [
            'OR' => [
                'id' => $id,
            ]
        ]);
    }

    /**
     * @param $id
     * @param array $data
     * @return bool|mixed
     */
    public function patch($id, array $data)
    {
        $affected = $this->db->update(static::TABLE, $data, [
            'OR' => [
                'id' => $id,
            ]
        ]);

        return $this->find($id);
    }

    /**
     * @param array $data
     * @return bool|mixed
     */
    public function create(array $data)
    {
        $data['created'] = date('Y-m-d H:i:s');
        $this->db->insert(static::TABLE, $data);

        return $this->find($this->db->id());
    }

    /**
     * @param $id
     * @return bool|int
     */
    public function deleteUser($id)
    {
        return $this->db->delete(static::TABLE, [
            'id' => $id
        ]);
    }
}