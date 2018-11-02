<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $orgs = ['SAAM', 'Hirshhorn', 'Freer|Sackler'];
      foreach ($orgs as $org) {
        DB::table('organizations')->insert([
          'name' => $org,
        ]);
      }
    }
}
