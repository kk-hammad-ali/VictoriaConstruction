<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rent extends Model
{
    protected $fillable = [
        'client_id', 'month', 'year', 'amount_due', 'amount_received', 'remaining_balance', 'payment_date',
    ];

    /**
     * Get the client that owns the rent record.
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
