<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \TCG\Voyager\Models\User
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'ic',
        'age',
        'order',
        'differently_abled',
        'leadership',
        'accomodation',
        'diet',
        'mobile',
        'allergy',
        'category',
        'details',
        'involvement',
        'filled',
        'role_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function entities()
    {
        return $this->hasMany(Entity::class);
    }

    public function isAdmin(){
        return $this->role_id==1 || $this->role_id==3;
    }

    public function scopeClergy($query){
        return $query->whereIn('role_id', [4,5]);
    }
    public function scopeAdminSecretariat($query){
        if(auth()->user()->role_id==1) return $query;
        return $query->whereIn('role_id', [4,5]);
    }
}
