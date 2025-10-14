<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'banner',
        'gallery',
        'status',
        'description',
        'short_description',
        'map',
        'discount',
        'location',
        'price',
        'overview',
        'inclusions',
        'exclusions',
        'special_title',
        'special',

        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema',
    ];

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_packages', 'package_id', 'destination_id');
    }

    public function category()
    {
        return $this->belongsToMany(Activity::class, 'activity_packages', 'package_id', 'activity_id');
    }
    public function itenaries()
    {
        return $this->hasMany(ItenaryPackage::class, 'package_id');
    }

    public function faqs()
    {
        return $this->hasMany(PackageFaq::class, 'package_id');
    }

    public function activity()
    {
        return $this->hasOne(PackageActivity::class);
    }
}
