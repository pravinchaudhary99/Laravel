<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'event_name',
        'date_time',
        'event_organiser',
        'send_event_details_to',
        'user_id'
    ];
}
