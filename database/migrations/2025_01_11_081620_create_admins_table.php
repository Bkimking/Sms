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
        Schema::create('admins', function (Blueprint $table) {
            $table->id()->nullable(); // Primary key
            $table->unsignedBigInteger('user_id')->nullable(); // Foreign key to the users table
            $table->string('firstname')->nullable();
            $table->string('middlename')->nullable();
            $table->string('lastname')->nullable();
            $table->string('profile_pic')->nullable(); // Optional profile picture
            $table->string('phone_number', 15)->nullable();
            $table->text('address')->nullable();
            $table->string('gender')->nullable();
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('inactive')->nullable();
            $table->timestamps();
        
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
