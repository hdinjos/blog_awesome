<?php

namespace App\Models;

use CodeIgniter\Model;

class Users extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $allowedFields    = ['name', 'bio', 'email', 'password', 'role_id'];

    public function index($params = '')
    {
        return $this->select($params)->findAll();
    }

    public function indexJoin()
    {
        return $this
            ->join('roles', 'roles.id = users.role_id')
            ->select('users.id, users.name, users.email, users.bio, roles.name as role')
            ->findAll();
    }
}
