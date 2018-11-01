<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLanguagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('langcode');
            $table->timestamps();
        });

        Schema::table('captions', function (Blueprint $table) {
          $table->unsignedInteger('language_id');
          $table->foreign('language_id')->references('id')->on('languages');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('captions', function (Blueprint $table) {
        $table->dropForeign(['language_id']);
        $table->dropColumn(['language_id']);
      });

      Schema::dropIfExists('languages');

    }
}
