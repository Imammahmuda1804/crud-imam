<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    protected $fillable = [
        'title',
        'description',
        'published_year',
        'cover_image',
        'author_id',
        'category_id',
    ];

    public function author()
    {
        return $this->belongsTo(authors::class);
    }

    public function category()
    {
        return $this->belongsTo(categories::class);
    }
}



