<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Caption;

class User extends Authenticatable
{
  use Notifiable;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'name', 'email', 'password', 'organization',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
      'email', 'organization_id', 'created_at', 'updated_at', 'password', 'remember_token', 'email_verified_at',
  ];

  /**
   * Get the Captions for User.
   */
  public function captions() {
    return $this->hasMany(Caption::class);
  }

  /**
   * Get the Organization of User.
   */
  public function organization() {
    return $this->belongsTo(Organization::class);
  }

}
