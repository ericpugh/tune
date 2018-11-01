<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Caption extends Model
{
  /**
   * Get the User relationship
   */
  public function user() {
    return $this->belongsTo(User::class);
  }

}
