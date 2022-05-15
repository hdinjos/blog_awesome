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
    protected $allowedFields    = [];

    public function index($params = '')
    {
        return $this->select($params)->findAll();
    }
}
