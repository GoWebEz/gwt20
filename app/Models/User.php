<?php

namespace App\Models;

use App\Models\UserLocation;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'designation_id'    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'pivot'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id', 'name');
    }

    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id', 'id', 'name');
    }

    public function userlocation()
    {
        return $this->belongsToMany(Location::class, 'user_location', 'user_id', 'location_id')->withPivot('is_active as is_active_user_location');
    }

    public function userMultiLocation()
    {
        return $this->belongsToMany(Location::class, 'user_location')->select('location_id', 'name', 'code')->where('category_id', '=', 1)->wherePivot('is_active', '1')->orderBy('code', 'ASC');
    }

}

