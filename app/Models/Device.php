<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'category_id',
        'key_code',
        'name',
        'location_id',
        'mode',
        'setpoint'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id','name');
    }

    public function location()
    {
        return $this->belongsTo(Location::class,'location_id','id','name');
    }
}
