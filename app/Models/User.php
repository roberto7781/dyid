<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
  use HasApiTokens, HasFactory, Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var string[]
   */
  protected $fillable = [
    'userName',
    'userGender',
    'userEmail',
    'userAddress',
    'roleID',
    'userPassword',
  ];

  /**
   * The attributes that should be hidden for serialization.
   *
   * @var array
   */
  protected $hidden = [
    'userPassword',
    'remember_token',
  ];

  /**
   * The attributes that should be cast.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  // User has many cart items
  public function cart()
  {
    return $this->hasMany('App\Models\Cart');
  }

  // User belong to one role
  public function roles()
  {
    return $this->belongsTo('App\Models\Role', 'roleID', 'id');
  }

  // To get user role
  public function hasRole($role)
  {
    if ($this->roles()->where('roleName', $role)->first()) {
      return true;
    }
    return false;
  }

  // For Password authentication (Because the attribute name we used isn't the default Laravel name)
  public function getAuthPassword()
  {
    return $this->userPassword;
  }
}
