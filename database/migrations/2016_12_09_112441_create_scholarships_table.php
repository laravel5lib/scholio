<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scholarships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id')->index();
            $table->integer('financial_id')->index();
            $table->string('financial_amount');
            $table->integer('study_id')->index();
            $table->string('level_id');
            $table->integer('criteria_id')->index();
            $table->date('end_at');
            $table->integer('winner_id')->index()->nullable();
            $table->text('terms')->nullable();
            $table->boolean('exam')->default(0);
            $table->date('exam_date')->nullable();
            $table->boolean('active')->default(1);
            $table->boolean('multiple')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('scholarships');
    }
}
