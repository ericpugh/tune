<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Language;

class LanguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->insert([
          'name' => 'English',
          'langcode' => 'en'
        ]);
        DB::table('languages')->insert([
          'name' => 'Spanish',
          'langcode' => 'es'
        ]);
    }
}
