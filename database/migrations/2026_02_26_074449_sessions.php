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
        Schema::create('session', function (Blueprint $table) {
    $table->id()->primary();

    $table->foreignId('course_id')
          ->constrained()
          ->cascadeOnDelete();

    $table->date('session_date');
    $table->integer('session_number');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session');
    }
};
