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
  protected $allowedFields    = ['title', 'image', 'slug', 'content', 'status', 'author_id', 'category_id'];

  public function index($status = '', $page = 1, $limit = 10)
  {
    if ($status === 'publish') {
      return $this
        ->join('categories', 'categories.id = articles.category_id')
        ->join('users', 'users.id = articles.author_id')
        ->where('status', 'publish')
        ->select('articles.*')
        ->select('users.name as author')
        ->select('categories.name as category')
        ->findAll();
    } else {
      //with raw query
      $db = db_connect();
      $result = $db
        ->query('SELECT
          T1.id, title, image, content, status, T2.name AS category, T3.name AS author, create_at, update_at
          FROM articles AS T1
          INNER JOIN categories AS T2 ON T1.category_id = T2.id
          INNER JOIN users AS T3 ON T1.author_id = T3.id')
        ->getResultObject();

      if (session()->get('role') === '1') { //filter by admin role
        //with model & query builder mixed
        return $this
          ->join('categories', 'categories.id = articles.category_id')
          ->join('users', 'users.id = articles.author_id')
          ->select('articles.id, articles.title, articles.image, articles.content, articles.status')
          ->select('users.name as author')
          ->select('categories.name as category')
          ->limit($limit, ($page - 1) * $limit)
          ->get()
          ->getResultObject();
      } else {
        return $this
          ->join('categories', 'categories.id = articles.category_id')
          ->join('users', 'users.id = articles.author_id')
          ->where('users.id', session()->get('id'))
          ->select('articles.*')
          ->select('users.name as author')
          ->select('categories.name as category')
          ->findAll();
      }
    }
  }
}
