<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $fillable = [
        'agent', 'agent_id', 'identification_type', 'identification_number',
        'picture', 'name', 'email', 'phone', 'address',
    ];
}

