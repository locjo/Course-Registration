<?php

namespace Database\Seeders;

use App\Models\Classes;
use App\Models\Department;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
   public function run(): void
    {
        
        Department::factory(6)->create(); // chỉ seed 1 lần tại đây

        Classes::factory(10)->create(); // seed các lớp học thuộc các department đã tạo
        
        User::factory(50)->create(); // users lấy department_id từ code đã có
    }
    
}
