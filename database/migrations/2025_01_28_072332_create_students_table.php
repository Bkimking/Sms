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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('surname')->nullable();
        $table->string('firstname')->nullable();
        $table->string('middlename')->nullable();
        $table->string('email')->unique();
        $table->date('dob')->nullable();
        $table->string('idnumber')->unique();
        $table->string('gender')->nullable();
        $table->string('marital_status')->nullable();
        $table->string('tshirtsize')->nullable();
        $table->text('homeaddress')->nullable();
        $table->string('county')->nullable();
        $table->string('subcounty')->nullable();
        $table->string('tel')->nullable();
        $table->string('kcpe_certificate')->nullable();
        $table->string('kcse_certificate')->nullable();
        $table->boolean('agreetorules')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
