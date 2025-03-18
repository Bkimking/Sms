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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('surname');
            $table->string('first_name');
            $table->string('email')->unique();
            $table->date('dob');
            $table->string('gender');
            $table->string('tel');
            $table->string('kcpe_certificate')->nullable();
            $table->string('kcse_certificate')->nullable();
            $table->string('kin_name');
            $table->string('kin_email');
            $table->string('kin_id');
            $table->string('kin_tel');
            $table->unsignedBigInteger('course_id')->nullable();
            $table->unsignedBigInteger('subcourse_id')->nullable();
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
