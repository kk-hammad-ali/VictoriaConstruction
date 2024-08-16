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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->string('client_name');
            $table->string('client_email');
            $table->string('primary_phoneNo');
            $table->string('address');
            $table->string('country');
            $table->string('agent_name');
            $table->string('flat_number');
            $table->decimal('flat_rent', 8, 2);
            $table->decimal('amount_received', 8, 2);
            $table->decimal('remaining_balance', 8, 2);
            $table->date('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
