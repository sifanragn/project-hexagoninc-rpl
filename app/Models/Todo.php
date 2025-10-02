<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Todo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'is_done',
    ];

    // casting is_done ke boolean
    protected $casts = [
        'is_done' => 'boolean',
    ];

    // Relasi: todo milik user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
