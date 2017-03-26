<?php

namespace Model;

use FastD\Model\Model;

class AccountModel extends Model
{
    public function create($data)
    {

        $insertId = $this->db->insert('account', $data);

        if(!$insertId) {
            return [
                'status' => '0',
                'msg'    => '创建失败,请联系管理员'
            ];
        }

        return $this->findAccount($insertId);
    }

    public function findAccount($id){

        $account = $this->db->get('account', '*', [
            'user_id' => $id
        ]);

        return $account === false ? [] : $account;
    }
}