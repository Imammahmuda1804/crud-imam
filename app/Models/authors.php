<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory; // Sebaiknya ditambahkan

class authors extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'bio',
        'photo',
    ];

    public function books()
    {
        return $this->hasMany(books::class, 'author_id');
    }
}
