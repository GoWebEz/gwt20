<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'opening_hour',
        'startup_hour',
        'closing_hour',
        'shutdown_hour',
        'measurement',
        'cost_per_measurement'
        ];
}
