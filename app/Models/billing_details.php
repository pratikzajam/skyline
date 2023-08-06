<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class billing_details extends Model
{
    use HasFactory;

    protected $fillable=[
    'booking_id',
    'country',
    'address',
    'payment_status',
    'payment_id',
    'amount',
    'phone',
    ];
}
