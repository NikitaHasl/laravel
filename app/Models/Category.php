<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'categories';

    public function getCategories()
    {
        return DB::table($this->table)
            ->select(['*'])
            ->get();
    }

    public function getCategoryById(int $id)
    {
        return DB::table($this->table)
            ->find($id, ['*']);
    }
}
