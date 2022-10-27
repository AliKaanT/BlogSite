<?php

namespace Database\Seeders;

use App\Models\PostCategoryLink;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategoryLinkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
            //[post_id,category_id]
            [1, 1],
            [1, 2],
            [2, 3],
            [3, 2],
            [3, 3],
            [4, 4],
            [5, 3],
            [5, 4],
            [5, 1],
        ];
        foreach ($links as $value) {
            PostCategoryLink::create([
                'post_id' => $value[0],
                'category_id' => $value[1]
            ]);
        }
    }
}