<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'langcode'
  ];

  /**
   * Get the Captions for Language.
   */
  public function captions() {
    return $this->hasMany(Caption::class);
  }

}
