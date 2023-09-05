<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'title',
        'content',
        'image',
        'alt',
        'price',
        'quantity',
    ];

    public static function boot()
    {
        parent::boot();

        self::updating(function ($article) {
            $article->category()->associate(request()->category);
        });
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
}
