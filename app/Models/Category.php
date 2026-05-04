<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'description',
        'slug',
        'book_count',
        'is_active',
    ];

    // Relationship
    public function books()
    {
        return $this->hasMany(Book::class);
    }
}