<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'banner', 'status', 'description', 'route', 'seo_title', 'seo_description', 'seo_keywords'];

    public function items()
    {
        return $this->hasMany(DepartureItem::class, 'departure_id');
    }
    public function package()
    {
        return $this->hasOne(Package::class);
    }
}
