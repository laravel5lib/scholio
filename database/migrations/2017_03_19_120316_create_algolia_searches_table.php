<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlgoliaSearchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('algolia_searches', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('type_id')->nullable();
            $table->integer('school_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->bigInteger('phone')->nullable();
            $table->integer('lengthStudents')->nullable();
            $table->integer('lengthTeachers')->nullable();
            $table->integer('lengthStudies')->nullable();
            $table->integer('lengthScholarships')->nullable();
            $table->string('image')->nullable();
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
            $table->string('background')->nullable();
            $table->timestamps();

            $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('algolia_searches');
    }
}
