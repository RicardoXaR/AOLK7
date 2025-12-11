<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charity extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'description', 'official_url',
        'country', 'impact_score', 'vetting_source',
        'is_high_impact', 'is_verified'
    ];

    protected $casts = [
        'is_high_impact' => 'boolean',
        'is_verified' => 'boolean',
        'impact_score' => 'float',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'charity_category');
    }
}
