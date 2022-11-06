<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actives = ['bilim', 'uzay', 'ulaşım', 'teknoloji', 'yatırım'];
        $passives = ['arablar', 'spor', 'seyahat'];
        foreach ($actives as $value) {
            Category::create([
                'name' => $value,
                'is_active' => '1',
            ]);
        }
        foreach ($passives as $value) {
            Category::create([
                'name' => $value,
                'is_active' => '0',
            ]);
        }
    }
}
