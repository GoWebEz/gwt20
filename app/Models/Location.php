<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'primary_email',
        'secondary_email',
        'state',
        'city',
        'ZMW',
        'time_zone',
        'opening_hour',
        'startup_hour',
        'closing_hour',
        'shutdown_hour',
        'measurement',
        'is_location_changed',
        'cost_per_measurement'
    ];
    public function state()
    {
        return $this->belongsTo(State::class, 'states', 'id');
    }

    public function device()
    {
        return $this->belongsTo(Device::class);
    }

    public function locationDevices()
    {
        return $this->hasMany(Device::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(ClientLocation::class, 'client_id', 'id');
    }

    public function weatherlocation()
    {
        return $this->belongsTo(WeatherLocation::class, 'city', 'id');
    }

}
