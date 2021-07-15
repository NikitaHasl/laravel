<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class News extends Model
{
    protected $table = 'news';

    public function getNews()
    {
        return DB::table($this->table)
            ->join('users', 'news.user_id', '=', 'users.id')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select(['news.id as id', 'categories.title as category', 'users.firstname as username', 'news.title as title', 'news.slug as slug', 'news.status as status', 'news.description as description', 'news.created_at as created_at'])
            ->orderBy('id')
            ->get();
    }

    public function getNewsById(int $id)
    {
        return DB::table($this->table)
            ->join('users', 'news.user_id', '=', 'users.id')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select(['news.id as id', 'categories.title as category', 'users.firstname as username', 'news.title as title', 'news.slug as slug', 'news.status as status', 'news.description as description', 'news.created_at as created_at'])
            ->where('news.id', '=', $id)
            ->orderBy('id')
            ->get();
    }

    public function getNewsByCategory(int $categoryId)
    {
        return DB::table($this->table)
            ->join('users', 'news.user_id', '=', 'users.id')
            ->join('categories', 'news.category_id', '=', 'categories.id')
            ->select(['news.id as id', 'categories.title as category', 'users.firstname as username', 'news.title as title', 'news.slug as slug', 'news.status as status', 'news.description as description', 'news.created_at as created_at'])
            ->where('categories.id', '=', $categoryId)
            ->orderBy('id')
            ->get();
    }
}
