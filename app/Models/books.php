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
        // Pastikan nama model Author sudah benar (biasanya 'App\Models\Author')
        return $this->belongsTo(authors::class);
    }

    /**
     * Mendefinisikan relasi "belongsTo" ke model Category.
     */
    public function category()
    {
        // Pastikan nama model Category sudah benar (biasanya 'App\Models\Category')
        return $this->belongsTo(categories::class);
    }
}



