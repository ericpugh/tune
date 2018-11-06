<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Podlove\Webvtt\Parser;
use Podlove\Webvtt\ParserException;

class Caption extends Model
{

  /**
   * @var \Podlove\Webvtt\Parser $parser
   */
  protected $parser;

  public function __construct()
  {
    parent::__construct();
    $this->parser = new Parser();
  }

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

  /**
   * Get the parsed VVT array of cues.
   *
   * @return array
   * @throws ParserException
   */
  public function getParsedCaption() {
    try {
      return $this->parser->parse($this->caption);
    }catch(ParserException $e) {
      throw $e;
    }
  }

  /**
   * Parse a WebVTT text block to array of cues.
   *
   * @return array
   * @throws ParserException
   */
  public function parse($text) {
    try {
      return $this->parser->parse($text);
    }catch(ParserException $e) {
      throw $e;
    }
  }

}
