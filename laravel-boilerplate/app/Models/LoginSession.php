<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoginSession extends Model
{
    use HasFactory;

    protected $fillable = [
        'location',
        'device',
        'ip_address',
        'date_time',
        'user_id'
    ];
}
