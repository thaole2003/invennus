<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Size::create([
            'name' => 'S',
            'description' => 'Size S'
        ]);

        Size::create([
            'name' => 'M',
            'description' => 'Size M'
        ]);

        Size::create([
            'name' => 'L',
            'description' => 'Size L'
        ]);

        Size::create([
            'name' => 'XL',
            'description' => 'Size XL'
        ]);

        Size::create([
            'name' => '31',
            'description' => 'Size 31'
        ]);

        Size::create([
            'name' => '32',
            'description' => 'Size 32'
        ]);

        // Và các size số khác 33, 34, ..., 45
        for ($i = 33; $i <= 45; $i++) {
            Size::create([
                'name' => (string)$i,
                'description' => 'Size ' . $i
            ]);
        }

    }
}
