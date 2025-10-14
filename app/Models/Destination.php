<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'fullslug',
        'image',
        'banner',
        'order',
        'status',
        'description',
        'short_description',
        'parent_id',

        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema',
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'destination_packages', 'destination_id', 'package_id');
    }

    public function parent()
    {
        return $this->belongsTo(Destination::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Destination::class, 'parent_id');
    }
}
