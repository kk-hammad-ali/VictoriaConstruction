<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('client_id')->unique();
            $table->string('client_email');
            $table->string('identification_type');
            $table->string('license_picture')->nullable();
            $table->string('address');
            $table->string('country');
            $table->foreignId('agent_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('property_id')->constrained('properties')->onDelete('cascade');
            $table->foreignId('flat_id')->constrained('flats')->onDelete('cascade');
            $table->string('picture')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->date('start_date');  // Add start date of rent
            $table->date('end_date');    // Add end date of rent
            $table->string('primary_phoneNo');
            $table->string('secondary_phoneNo')->nullable();
            $table->date('payment_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

