<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookings extends Model
{
    use HasFactory;

    protected $primaryKey = 'booking_id';

    protected $fillable = [
        'room_id',
        'user_id',
        'start_date',
        'end_date',
    ];
}
