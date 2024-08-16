<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;

    protected $table = 'history';

    protected $fillable = [
        'client_id',
        'client_name',
        'client_email',
        'primary_phoneNo',
        'address',
        'country',
        'agent_name',
        'flat_number',
        'flat_rent',
        'amount_received',
        'remaining_balance',
        'payment_date',
    ];

    // Optionally define relationships if needed
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
