<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class DepartmentFactory extends Factory
{
    public function definition(): array
    {
        $name = fake()->unique()->randomElement([
            'Công nghệ thông tin',
            'Quản trị kinh doanh',
            'Tài chính ngân hàng',
            'Marketing',
            'Ngôn ngữ Anh',
            'Luật kinh tế'
        ]);

        return [
            'name' => $name,
            'code' => $this->generateCode($name),
        ];
    }

    private function generateCode(string $name): string
    {
        // Bỏ dấu tiếng Việt
        $name = Str::ascii($name);

        // Tách thành từng từ
        $words = explode(' ', $name);

        // Lấy chữ cái đầu mỗi từ
        $code = '';
        foreach ($words as $word) {
            $code .= strtoupper(substr($word, 0, 1));
        }

        return $code;
    }
}