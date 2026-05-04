<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Builder;
use App\Models\User;
use App\Models\Category;

class Book extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'category_id',
        'title',
        'author',
        'isbn',
        'description',
        'published_date',
        'pages',
        'price',
        'available_copies',
        'total_copies',
        'publisher',
        'created_by',
        'updated_by',
        'deleted_by',
    ];

    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Audit Relations
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updater()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deleter()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

    // SCOPES

    public function scopeAvailable(Builder $query)
    {
        return $query->where('available_copies', '>', 0);
    }

    public function scopeByCategory(Builder $query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    public function scopeExpensive(Builder $query, $price = 1000)
    {
        return $query->where('price', '>', $price);
    }
}