<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DestinationPackage extends Model
{
    use HasFactory;

    protected $fillable = [
        'package_id',
        'destination_id',
    ];
}
