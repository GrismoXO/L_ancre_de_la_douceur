<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'image',
        'alt'  
    ];

    public function user()
    {
        return $this->belongsTo(Article::class);
    }
}
