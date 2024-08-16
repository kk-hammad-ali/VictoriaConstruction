<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    // Define which attributes are mass assignable
    protected $fillable = [
        'client_name',
        'client_id',
        'client_email',
        'identification_type',
        'license_picture',
        'address',
        'country',
        'agent_id',
        'property_id',
        'flat_id',
        'picture',
        'status',
        'start_date',
        'end_date',
        'primary_phoneNo',
        'secondary_phoneNo',
        'payment_date'
    ];

    // Define the relationship with the Agent (User model)
    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    // Define the relationship with the Property model
    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    // Define the relationship with the Flat model
    public function flat()
    {
        return $this->belongsTo(Flat::class, 'flat_id');
    }

    // Define the relationship with the Rent model
    public function rents()
    {
        return $this->hasMany(Rent::class);
    }
}
