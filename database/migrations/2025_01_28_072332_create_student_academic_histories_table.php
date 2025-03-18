<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('student_academic_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->nullable();
            $table->string('primaryschoolname')->nullable();
            $table->year('primaryyear')->nullable();
            $table->string('primarygrade')->nullable();
            $table->string('secondaryschoolname')->nullable();
            $table->year('secondaryyear')->nullable();
            $table->string('secondarygrade')->nullable();
            $table->string('tertiaryschoolname')->nullable();
            $table->year('tertiaryyear')->nullable();
            $table->string('tertiarygrade')->nullable();
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_academic_histories');
    }
};
