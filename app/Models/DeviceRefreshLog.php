<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeviceRefreshLog extends Model
{
    use HasFactory;
    protected $table = 'device_refresh_logs';
    protected $guarded = [];
}
