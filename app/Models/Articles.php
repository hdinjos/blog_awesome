<?php

namespace App\Models;

use CodeIgniter\Model;

class Articles extends Model
{
    protected $table            = 'articles';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $protectFields    = false;
    protected $allowedFields    = [''];
}
