<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Caption extends Model
{
  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'user_id', 'language_id',
  ];

  /**
   * Get the User relationship
   */
  public function user() {
    return $this->belongsTo(User::class);
  }

  /**
   * Get the Language relationship
   */
  public function language() {
    return $this->belongsTo(Language::class);
  }

}
