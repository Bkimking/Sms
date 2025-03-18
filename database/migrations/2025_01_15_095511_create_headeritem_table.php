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
        Schema::create('headeritem', function (Blueprint $table) {
            $table->id();
            $table->string('headertitle')->default('null');
            $table->string('headersubtitle')->default('null');
            $table->text('headerparagraph')->default('null');
            $table->string('headerimg')->default('null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headeritem');
    }
};
