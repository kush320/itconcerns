<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrosoftSolutionEnquiriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microsoft_solution_enquiries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('full_name');
            $table->string('business_email');
            $table->string('organization_name');
            $table->string('organization_size');
            $table->string('microsoft_service');
            $table->string('industry');
            $table->string('domain_name');
            $table->string('country');
            $table->string('zip_code');
            $table->string('phone_number');
            $table->boolean('privacy_agreed')->default(1);
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
        Schema::dropIfExists('microsoft_solution_enquiries');
    }
}

