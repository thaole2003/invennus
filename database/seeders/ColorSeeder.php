<?php

namespace Database\Seeders;

use App\Models\Color;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
       // Tạo các màu cơ bản
        Color::create([
            'name' => 'Đỏ',
            'code' => 'red',
        ]);

        Color::create([
            'name' => 'Xanh',
            'code' => 'blue',
        ]);

        Color::create([
            'name' => 'Vàng',
            'code' => 'yellow',
        ]);

        Color::create([
            'name' => 'Trắng',
            'code' => 'white',
        ]);

        Color::create([
            'name' => 'Đen',
            'code' => 'black',
        ]);

        Color::create([
            'name' => 'Xám',
            'code' => 'gray',
        ]);

        Color::create([
            'name' => 'Cam',
            'code' => 'orange',
        ]);

        Color::create([
            'name' => 'Hồng',
            'code' => 'pink',
        ]);

        Color::create([
            'name' => 'Tím',
            'code' => 'purple',
        ]);

        Color::create([
            'name' => 'Nâu',
            'code' => 'brown',
        ]);

        Color::create([
            'name' => 'Xanh dương',
            'code' => 'navy',
        ]);

        Color::create([
            'name' => 'Xanh lá cây',
            'code' => 'green',
        ]);

    }
}
