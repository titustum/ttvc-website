<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('phone');
            $table->enum('gender', ['male', 'female']);
            $table->integer('id_number');
            $table->date('date_of_birth');
            $table->foreignId('course_id')->constrained();
            $table->enum('start_term', ['sept_2024', 'jan_2025', 'may_2025']);
            $table->string('high_school');
            $table->enum('high_school_grade', ['c++', 'c', 'c-', 'd+', 'd', 'd-', 'e', 'kcpe', 'none']);
            $table->string('parent_name')->nullable();
            $table->string('parent_phone');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications');
    }
};
