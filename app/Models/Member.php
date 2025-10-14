<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'image', 'email', 'phone', 'position', 'description', 'order', 'status'];

    public function location()
    {
        return $this->belongsTo(Location::class, 'id', 'location');
    }
}