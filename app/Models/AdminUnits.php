<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminUnits extends Model
{
    use HasFactory;

    protected $table = 'admin_units';

    public function items()
    {
        return $this->hasMany(Items::class);
    }

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function units()
    {
        return $this->belongsTo(Units::class);
    }

}
