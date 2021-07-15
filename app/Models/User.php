<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'users';

    public function getUsers()
    {
        return DB::table($this->table)
            ->select(['*'])
            ->get();
    }

    public function getUserById(int $id)
    {
        return DB::table($this->table)
            ->find($id, ['*']);
    }
}
