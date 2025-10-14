<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'image',
        'banner',
        'order',
        'status',
        'description',
        'short_description',
        'parent_id',
        'fullslug',

        'seo_title',
        'seo_description',
        'seo_keywords',
        'seo_schema'
    ];

    public function packages()
    {
        return $this->belongsToMany(Package::class, 'activity_packages', 'activity_id', 'package_id');
    }

    public function parent()
    {
        return $this->belongsTo(Activity::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Activity::class, 'parent_id');
    }
}
