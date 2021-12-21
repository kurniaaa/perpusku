<?php

namespace App\Models;

use Myth\Auth\Models\UserModel as MythModel;

class UserModel extends MythModel
{
    protected $allowedFields = [
        'email', 'username', 'password_hash', 'reset_hash', 'reset_at', 'reset_expires', 'activate_hash',
        'status', 'status_message', 'active', 'force_pass_reset', 'permissions', 'deleted_at',
        'fullname', 'address', 'phone', 'perpus', 'user_image',
    ];

    public function getKolektor($id_user = false)
    {
        if ($id_user == false) {
            return $this->select('users.id as id_user, email, username, fullname, address, phone, user_image, active, created_at, name')
                ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
                ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
                ->orderBy('users.created_at', 'DESC');
        }
        return $this->select('users.id as id_user, email, username, fullname, address, phone, user_image, active, created_at, auth_groups.id as id_group, name')
            ->join('auth_groups_users', 'auth_groups_users.user_id = users.id')
            ->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id')
            ->where('users.id', $id_user)
            ->orderBy('users.created_at', 'DESC');
    }

    public function getLimitUser()
    {
        return $this->orderBy('created_at', 'DESC')
            ->limit(4)
            ->find();
    }
}
