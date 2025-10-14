<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'banner', 'icon', 'description', 'seo_title', 'seo_description', 'seo_keywords', 'order', 'status'];
}