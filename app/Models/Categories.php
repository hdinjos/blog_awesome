<?php

namespace App\Models;

use CodeIgniter\Model;

class Categories extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $allowedFields    = ['name'];

    public function index()
    {
        return $this->findAll();
    }
}
