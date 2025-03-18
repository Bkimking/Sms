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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('course_name');
            $table->string('course_code');
            $table->text('course_description')->nullable();
            $table->string('course_img')->nullable();
            $table->unsignedBigInteger('depart_id')->nullable();
            $table->unsignedBigInteger('teacher_id')->nullable();
            $table->enum('category', ['Diploma', 'Certificate', 'Short Course'])->default('Certificate'); // New category field
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('depart_id')->references('id')->on('departments')->onDelete('cascade');
            $table->foreign('teacher_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
