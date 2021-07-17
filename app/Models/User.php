<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'firstname',
        'surname',
        'email',
        'birthday',
        'gender',
        'role',
        'password_hash'
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'user_id', 'id');
    }
}
