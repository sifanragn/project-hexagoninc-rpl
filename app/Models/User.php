<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Laravel\Sanctum\HasApiTokens; // <-- tambahkan ini

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // <-- tambahkan HasApiTokens

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi: satu user punya banyak todos
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
}
