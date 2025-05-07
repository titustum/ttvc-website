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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id(); 
            $table->string('name'); // Name of the gallery item
            $table->string('category'); // Category of the gallery item
            $table->string('slug')->unique(); // Slug for the gallery item
            $table->string('description')->nullable();
            $table->string('image'); // URL or path to the image 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
