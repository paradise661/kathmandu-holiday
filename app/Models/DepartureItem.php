<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartureItem extends Model
{
    use HasFactory;
    protected $fillable = ['departure_id', 'name', 'date'];
}
