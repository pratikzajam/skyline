<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_no',
        'room_name',
        'total_capacity',
        'price',
        'image_path'
    ];
}
