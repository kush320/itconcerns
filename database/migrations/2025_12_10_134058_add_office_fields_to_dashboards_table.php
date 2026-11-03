<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOfficeFieldsToDashboardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dashboards', function (Blueprint $table) {
            // Office 1 fields
            $table->string('office1_name')->nullable();
            $table->text('office1_address')->nullable();
            $table->string('office1_phone')->nullable();
            $table->string('office1_email')->nullable();
            
            // Office 2 fields
            $table->string('office2_name')->nullable();
            $table->text('office2_address')->nullable();
            $table->string('office2_phone')->nullable();
            $table->string('office2_email')->nullable();
            
            // Office 3 fields
            $table->string('office3_name')->nullable();
            $table->text('office3_address')->nullable();
            $table->string('office3_phone')->nullable();
            $table->string('office3_email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dashboards', function (Blueprint $table) {
            $table->dropColumn([
                'office1_name', 'office1_address', 'office1_phone', 'office1_email',
                'office2_name', 'office2_address', 'office2_phone', 'office2_email',
                'office3_name', 'office3_address', 'office3_phone', 'office3_email'
            ]);
        });
    }
}
