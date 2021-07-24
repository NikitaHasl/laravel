<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
    ];

    public function news(): HasMany
    {
        return $this->hasMany(News::class, 'user_id', 'id');
    }

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'bool'
    ];
}
