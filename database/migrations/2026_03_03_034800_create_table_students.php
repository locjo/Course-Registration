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
        Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->foreignId('user_id')->constrained()->onDelete('cascade');

        $table->string('student_code')->unique();
        $table->string('name');
        $table->date('birthday');
        $table->enum('gender', ['Nam', 'Nữ', 'Khác']);
        $table->string('phone')->nullable();
        $table->string('identity_number')->nullable();
        $table->string('academic_year')->nullable();
        $table->string('place_of_birth')->nullable();
        $table->string('permanent_address')->nullable();
        $table->foreignId('class_id')->nullable()->constrained();
        $table->foreignId('department_id')->nullable()->constrained();
        $table->string('photo')->nullable();

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_students');
    }
};
