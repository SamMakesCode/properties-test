<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->unsignedTinyInteger('property_type_id');
            $table->string('county');
            $table->string('country');
            $table->string('town');
            $table->longText('description');
            $table->string('address');
            $table->string('image_url');
            $table->string('thumbnail_url');
            $table->string('full_details_url');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('number_of_bedrooms');
            $table->string('number_of_bathrooms');
            $table->string('price');
            $table->string('type');
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
        Schema::dropIfExists('properties');
    }
}
