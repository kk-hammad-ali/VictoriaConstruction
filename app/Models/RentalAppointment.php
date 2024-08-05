<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalAppointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'email', 'photo', 'phone', 'need', 'additional_needs',
        'date_of_coming', 'location', 'id_card', 'driving_license', 'additional_requirements'
    ];

    protected $casts = [
        'additional_needs' => 'array',
    ];
}
