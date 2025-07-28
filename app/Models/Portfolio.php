<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Portfolio extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'description',
        'featured_image',
        'gallery',
        'client_name',
        'project_url',
        'category',
        'technologies',
        'completion_date',
        'is_featured',
        'order'
    ];

    protected $casts = [
        'gallery' => 'array',
        'technologies' => 'array',
        'completion_date' => 'date',
        'is_featured' => 'boolean',
    ];

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('order');
    }

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($portfolio) {
            if (empty($portfolio->slug)) {
                $portfolio->slug = Str::slug($portfolio->title);
            }
        });
    }
}
