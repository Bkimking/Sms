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
    Schema::create('student_guardians', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('student_id')->nullable();
        $table->string('guardianfullname')->nullable();
        $table->string('guardianemail')->nullable();
        $table->string('guardianoccupation')->nullable();
        $table->string('guardianidnumber')->nullable();
        $table->string('guardianhomeaddress')->nullable();
        $table->string('guardiancounty')->nullable();
        $table->string('guardiantel')->nullable();
        $table->timestamps();

        $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_guardians');
    }
};
