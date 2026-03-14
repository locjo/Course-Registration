<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('section_classes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('course_id')
                  ->constrained('courses')
                  ->cascadeOnDelete();

            $table->foreignId('lecturer_id')
                  ->constrained('users')
                  ->cascadeOnDelete();

            $table->string('section_code'); // VD: INT2201-01
            $table->dateTime('start_date');
            $table->dateTime('end_date');

            $table->integer('capacity')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('section_classes');
    }
};