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
        Schema::create('galleries', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the gallery i.e. 2025 - TVET Games, 2025 - Graduation
            $table->string('slug')->unique(); // Slug for the gallery
            $table->string('category'); // Category of the gallery i.e. Graduation, Sports, etc.
            $table->string('description')->nullable(); // Description of the gallery
            $table->string('image'); // URL or path to the image
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galleries');
    }
};
