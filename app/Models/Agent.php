<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    use HasFactory;

    protected $appends = [
        'total_property_value',
    ];

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
    ];

    public function getTotalPropertyValueAttribute()
    {
        return $this->properties()
            ->sum('price') / 100;
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }
}
