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
        Schema::create('staffids', function (Blueprint $table) {
            $table->id(); // Primary key (Auto-incrementing ID)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade'); // Foreign key
            $table->string('staff_id')->unique(); // Unique Staff ID
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staffids');
    }
};
