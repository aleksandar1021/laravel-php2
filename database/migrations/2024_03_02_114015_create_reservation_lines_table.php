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
        Schema::create('reservation_lines', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("id_reservation");
            $table->foreign("id_reservation")->references("id")->on("reservations");
            $table->dateTime('date_time_of');
            $table->unsignedBigInteger('id_table');
            $table->foreign('id_table')->references('id')->on('tables');
            $table->dateTime('date_time_until');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservation_lines');
    }
};
