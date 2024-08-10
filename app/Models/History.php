<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'client_name',
        'client_email',
        'primary_phoneNo',
        'address',
        'country',
        'agent_name',
        'flat_number',
        'flat_rent',
        'payment_date',
    ];
}
