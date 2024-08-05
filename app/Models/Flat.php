<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'flat_number', 'floor', 'rent',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
