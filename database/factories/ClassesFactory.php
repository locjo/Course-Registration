<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClassesFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => 'Class ' . fake()->unique()->numberBetween(1, 100),
            'code' => 'CLS' . fake()->unique()->numberBetween(100, 999),

            // FK tới departments
            'department_id' => Department::inRandomOrder()->value('id')
                                ?? Department::factory(),
        ];
    }
}