<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'property_type_id',
        'county',
        'country',
        'town',
        'description',
        'full_details_url',
        'address',
        'image_url',
        'thumbnail_url',
        'latitude',
        'longitude',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'price',
        'type',
    ];

    public function agents()
    {
        return $this->belongsToMany(Agent::class);
    }
}
