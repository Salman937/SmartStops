<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWaypointsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('waypoints_categories', function (Blueprint $table) 
        {
            $table->increments('id');
            $table->string('category_name');
            $table->string('waypoint_name');
            $table->text('sub_cat');
            $table->string('lat')->nullable();
            $table->string('long')->nullable();
            $table->text('addrs');
            $table->text('postal_code')->nullable();
            $table->string('additional_info')->nullable();
            $table->string('country');
            $table->string('province');
            $table->string('waypoint_id');
            $table->string('exp_date');
            $table->string('email_id');
            $table->string('phone_number');
            $table->text('location_name');
            $table->string('operater_name');
            $table->string('pulse')->nullable();
            $table->string('latitude');
            $table->string('longitude');
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
        Schema::dropIfExists('waypoints_categories');
    }
}
