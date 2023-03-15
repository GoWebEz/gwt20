<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation_name',
        'designation_code',
        'role_id'
    ];

    public function user()
    {
        return $this->belongsto(User::class);
    }
    public function role()
    {
        return $this->belongsto(Role::class, 'role_id', 'id');
    }
}
