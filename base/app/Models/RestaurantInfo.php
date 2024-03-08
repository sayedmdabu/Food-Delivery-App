<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantInfo extends Model
{
    use HasFactory;
    protected $table = 'restaurant_infos';

    protected $fillable = [
        'restaurant_id',
        'lat',
        'long',
    ];
}
