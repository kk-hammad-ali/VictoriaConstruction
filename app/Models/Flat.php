<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;

class Flat extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_id', 'user_id', 'flat_number', 'floor', 'rent'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
