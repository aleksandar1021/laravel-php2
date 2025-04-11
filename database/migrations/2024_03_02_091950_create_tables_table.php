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
        Schema::create('tables', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable()->unique();
            $table->string("description")->nullable();
            $table->string("image");
            $table->unsignedBigInteger("id_number");
            $table->foreign("id_number")->references("id")->on("number_of_chairs");
            $table->unsignedBigInteger("id_level");
            $table->foreign("id_level")->references("id")->on("table_premium_levels");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
