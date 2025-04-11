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
        Schema::create('social_network_users', function (Blueprint $table) {
            $table->id();
            $table->string("href");
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('our_users');
            $table->unsignedBigInteger('id_social');
            $table->foreign('id_social')->references('id')->on('social_networks');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_network_users');
    }
};
