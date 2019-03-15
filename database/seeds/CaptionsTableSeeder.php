<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CaptionsTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('captions')->insert([
      'name' => 'Caption for Pulse Intro',
      'description' => 'A demo caption for Pulse by Rafael Lozano-Hemmer',
      'media_duration' => 19,
      'media_current_time' => 0,
      'user_id' => 1,
      'language_id' => 1,
      'caption' => 'WEBVTT

00:00:00.086 --> 00:00:01.596
My name\'s Rafael Lozano-Hemmer

00:00:01.706 --> 00:00:03.596
and this is an exhibition called Pulse.

00:00:03.986 --> 00:00:08.736
It features three artworks that you must populate with your fingerprint 

00:00:08.846 --> 00:00:09.596
with your heartbeat.

00:00:10.186 --> 00:00:14.956
There are sensors in this exhibition that will capture your biometrics and then 

00:00:14.966 --> 00:00:19.056
convert them into lighting projections and into sound.

00:00:14.966 --> 00:00:19.056
',
    ]);
  }
}
