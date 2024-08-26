<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Flat;


class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'address',
    ];


    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function flats()
    {
        return $this->hasMany(Flat::class);
    }
}
