<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lecturers', function (Blueprint $table) {
            $table->id();

            // user login
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // thông tin giảng viên
            $table->string('lecturer_code')->unique();
            $table->string('name');

            $table->enum('gender', ['nam', 'nữ', 'khác']);

            $table->date('birthday');

            $table->string('identity_number')->unique();
            $table->string('phone')->nullable();

            // đổi thành ENUM
            $table->enum('degree', [
                'Cu nhan',
                'Thac si',
                'Tien si'
            ]);

            $table->enum('academic_title', [
                'Khong co',
                'Pho giao su',
                'Giao su'
            ])->default('Khong co');

            $table->string('photo')->nullable();

            $table->foreignId('department_id')
                  ->constrained('departments')
                  ->onDelete('cascade');

            $table->string('hometown')->nullable();
            $table->string('permanent_address')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lecturers');
    }
};