<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = "bookings";
    protected $fillable = [
        'full_name',
        'booking_seat',
        'booking_email',
        'booking_phone',
        'booking_date',
        'booking_status'
    ];
}
