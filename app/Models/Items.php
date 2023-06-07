<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Items extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'name',
        'brand',
        'description',
        'photo',
        'slug',
        'category_id',
        'unit_id',
        'admin_unit_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function bookings()
    {
        return $this->hasMany(Bookings::class);
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class);
    }

    public function units()
    {
        return $this->belongsTo(Units::class);
    }

    public function admin_units()
    {
        return $this->belongsTo(AdminUnits::class);
    }
}
