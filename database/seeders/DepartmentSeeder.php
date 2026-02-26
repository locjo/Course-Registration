<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
 public function run(): void
    {
        $departments = [
            ['name' => 'Công nghệ thông tin', 'code' => 'CNTT'],
            ['name' => 'Quản trị kinh doanh', 'code' => 'QTKD'],
            ['name' => 'Kế toán', 'code' => 'KT'],
            ['name' => 'Tài chính ngân hàng', 'code' => 'TCNH'],
            ['name' => 'Luật', 'code' => 'LUAT'],
            ['name' => 'Ngoại ngữ', 'code' => 'NN'],
        ];

        foreach ($departments as $department) {
            Department::updateOrCreate(
                ['code' => $department['code']],
                ['name' => $department['name']]
            );
        }
    }
}
