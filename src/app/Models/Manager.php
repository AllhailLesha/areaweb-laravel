<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use function PHPUnit\Framework\isNull;

class Manager extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'managers';
    protected $fillable = [
        'name', 'phone', 'password', 'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'password' => 'hashed',
    ];

    protected $hidden = [
        'password'
    ];

}
