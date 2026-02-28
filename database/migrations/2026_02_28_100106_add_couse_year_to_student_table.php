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
        Schema::table('users', function (Blueprint $table) {
            $table->integer('student_code')->unique(); // Mã sinh viên, duy nhất
            $table->string('course_year')->unique();

            // Ảnh
            $table->string('photo')->nullable(); // lưu path ảnh

            // Cá nhân
            $table->enum('gender', ['Nam', 'Nữ', 'Khác']);
            $table->date('birthday');

            // Niên khóa (VD: 2022-2026)
            $table->string('academic_year');

            // Thông tin địa phương
            $table->string('place_of_birth')->nullable();
            $table->string('permanent_address')->nullable();

            // Giấy tờ
            $table->string('identity_number')->nullable(); // CMND/CCCD

            // Liên hệ
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('student', function (Blueprint $table) {
            //
        });
    }
};
