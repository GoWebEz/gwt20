<?php

namespace App\Models;

use App\Models\Device;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherLocation extends Model
{
    use HasFactory;
    protected $table = 'weatherlocations';
    protected $guarded = [];
    public function device()
    {
        return $this->belongsTo(Device::class);
    }
    public function locations()
    {
        return $this->belongsTo(Location::class);
    }

}
