<?php

namespace App\Models;

use App\Models\Device;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'name'
    ];

    public function device()
    {
        return $this->hasMany(Device::class,'category_id','id');
    }

    public function location()
    {
        return $this->hasMany(Location::class,'category_id','id');
    }
}
