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

    public function index()
    {
        //with raw query
        $db = db_connect();
        $result = $db
            ->query('select * from articles')
            ->getResultObject();

        //with model & query builder mixed
        return $this
            ->join('categories', 'categories.id = articles.category_id')
            ->join('users', 'users.id = articles.author_id')
            ->select('articles.*')
            ->select('users.name as author')
            ->select('categories.name as category')
            ->findAll();
    }
}
