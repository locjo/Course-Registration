<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Department;

class DepartmentFactory extends Factory
{
    protected $model = Department::class;

    public function definition(): array
{
    $departments = [
        ['name' => 'Công nghệ thông tin', 'code' => 'CNTT'],
        ['name' => 'Quản trị kinh doanh', 'code' => 'QTKD'],
        ['name' => 'Kế toán', 'code' => 'KT'],
        ['name' => 'Tài chính ngân hàng', 'code' => 'TCNH'],
        ['name' => 'Luật', 'code' => 'LUAT'],
        ['name' => 'Ngoại ngữ', 'code' => 'NN'],
    ];

    return $this->faker->randomElement($departments);
}
}