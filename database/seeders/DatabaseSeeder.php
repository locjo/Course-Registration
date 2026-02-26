<?php

namespace Database\Seeders;

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
        $this->call([
            DepartmentSeeder::class, // chỉ seed 1 lần tại đây
        ]);

        User::factory(50)->create(); // users lấy department_id từ code đã có
    }
    
}
