<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'street',
        'city',
        'postal_code',
        'country'
    ];

    public function user()
    {
        return $this->belongsTo(Address::class);
    }
}
