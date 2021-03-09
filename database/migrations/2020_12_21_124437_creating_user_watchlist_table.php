<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatingUserWatchlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_watchlists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('movie_id')->unsigned();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('restrict');;
            $table->foreign('movie_id')->references('id')->on('movies')->onUpdate('cascade')->onDelete('restrict');;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

          Schema::table('user_watchlists', function (Blueprint $table) {
                $table->dropForeign(['user_id']);
                $table->dropForeign(['movie_id']);
                $table->dropIfExists('user_watchlists');


          });


    }
}
