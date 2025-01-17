<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateMoviesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('director');
            $table->string('cast');
            $table->string('country');
            $table->date('date_added');
            $table->integer('release_year');
            $table->decimal('rating');
            $table->string('duration');
            $table->string('genre');
            $table->string('description');
            $table->timestamps();
        });

        DB::statement(
            'ALTER TABLE movies ADD FULLTEXT fulltext_index(title, director, cast, country, duration, genre, description)'
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
}
