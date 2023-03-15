<?php

namespace App\Models;

use App\Models\User;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLocation extends Model
{
    use HasFactory;

    protected $table = 'user_location';
    protected $fillable = [
        'user_id',
        'location_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id','id','name');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id','id','name','code');
    }
}
