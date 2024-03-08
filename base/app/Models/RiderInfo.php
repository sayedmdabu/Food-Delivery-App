<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiderInfo extends Model
{
    use HasFactory;
    protected $table = 'rider_infos';

    protected $fillable = [
        'rider_id',
        'service_name',
        'lat',
        'long',
        'capture_time',
        'service_start',
    ];
}
