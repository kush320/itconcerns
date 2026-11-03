<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keyphrase')->nullable();
            $table->text('canonical_url')->nullable();
            $table->text('keyword')->nullable();
            $table->string('course_title')->nullable();
            $table->string('slug')->nullable();
            $table->longText('short_description', 300)->nullable();
            $table->longText('description')->nullable();
            $table->string('duration')->nullable();
            $table->string('time')->nullable();
            $table->string('venue')->nullable();
          $table->date('date')->nullable();
            $table->string('pre_requisite')->nullable();
            $table->tinyInteger('published')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
