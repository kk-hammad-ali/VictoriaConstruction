<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
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

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function property()
    {
        return $this->belongsTo(Property::class, 'property_id');
    }

    public function flat()
    {
        return $this->belongsTo(Flat::class, 'flat_id');
    }


}
