<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageActivity extends Model
{
    use HasFactory;

    protected $fillable = [
        'priceprefix',
        'priceper',
        'priceperusd',
        'duration',
        'durationinfo',
        'type',
        'typeinfo',
        'size',
        'sizeinfo',
        'transportation',
        'transportationinfo',
        'activity',
        'activityinfo',
        'season',
        'seasoninfo',
        'accomod',
        'accomodinfo',
        'meal',
        'mealinfo',
        'package_id',
    ];
}
