<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaywebSetpointLog extends Model
{
    use HasFactory;
    protected $table = 'bayweb_setpoint_logs';
    protected $guarded = [];
}
