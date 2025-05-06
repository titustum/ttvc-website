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
        Schema::create('success_stories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the student
            $table->string('photo'); // captivating pic of the student
            $table->string('course'); // course taken by the student
            $table->string('year'); // year of graduation
            $table->string('occupation'); // occupation of the student
            $table->string('company'); // company where the student is employed
            $table->text('statement'); // statement from the student about their experience at the college
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('success_stories');
    }
};
