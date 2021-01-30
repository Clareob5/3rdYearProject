<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserRecsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_recs', function (Blueprint $table) {
            $table->id();
            $table->string('genres')->nullable();
            $table->string('movie_ids')->nullable();
            $table->bigInteger('user_id')->unsigned();

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
          //  $table->foreign('movie_id')->references('id')->on('movies');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_recs');
    }
}
