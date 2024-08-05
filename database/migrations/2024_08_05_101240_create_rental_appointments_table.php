<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('rental_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->string('phone');
            $table->string('need');
            $table->json('additional_needs')->nullable();
            $table->date('date_of_coming');
            $table->string('location');
            $table->string('id_card')->nullable();
            $table->string('driving_license')->nullable();
            $table->text('additional_requirements')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rental_appointments');
    }
}
