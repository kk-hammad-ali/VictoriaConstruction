<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatsTable extends Migration
{
    public function up()
    {
        Schema::create('flats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id'); // Foreign key reference to properties table
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade'); // Defining the foreign key constraint
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('flat_number');
            $table->string('floor');
            $table->decimal('rent', 10, 2);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('flats');
    }
}
