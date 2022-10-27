<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = ['bilim', 'uzay', 'ulaşım', 'teknoloji'];
        foreach ($arr as $value) {
            Category::create([
                'name' => $value,
            ]);
        }
    }
}