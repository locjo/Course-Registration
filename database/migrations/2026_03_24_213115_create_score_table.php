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
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->foreignId('student_id')
            ->constrained('students')
            ->onDelete('cascade');

        // Học phần
            $table->foreignId('section_class_id')
                ->constrained()
                ->onDelete('cascade');

            // Các cột điểm (số lượng SV)
            $table->integer('A')->default(0);
            $table->integer('B1')->default(0);
            $table->integer('B2')->default(0);
            $table->integer('C1')->default(0);
            $table->integer('C2')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('score');
    }
};
