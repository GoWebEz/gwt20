<?php

namespace App\Models;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Designation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'code',
        'role_id'
    ];

    public function user()
    {
        return $this->belongsto(User::class);
    }
    public function role()
    {
        return $this->belongsto(Role::class, 'role_id', 'id','name');
    }
}
