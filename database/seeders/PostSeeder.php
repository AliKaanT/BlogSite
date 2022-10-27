<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $description = "<h3>Satürnün halkası nedir?</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit at architectoobcaecati provident voluptatem nisi aut id nesciunt ut veniam!</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio consequunturtemporibus magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit.Hic velit dignissimos ipsam placeat dolorum enim sit aperiam quod! Doloredelectus veniam sapiente possimus, repellat culpa sequi ullam vitae deseruntnostrum beatae harum commodi debitis maiores? Soluta commodi maiores quidemrepudiandae natus porro illum architecto nemo.</p><p>Lorem ipsum dolor sit amet.</p>";
        Post::create([
            'title' => "Satürn'ün halkası",
            'description' => $description
            // uzay bilim
        ]);
        Post::create([
            'title' => "Trafik neden var",
            'description' => $description
            // ulaşım
        ]);
        Post::create([
            'title' => "Roketler nasıl çalışır",
            'description' => $description
            //uzay ulaşım
        ]);
        Post::create([
            'title' => "Transistör nedir",
            'description' => $description
            //teknoloji
        ]);
        Post::create([
            'title' => "Elektrikli araçlar nasıl çalışır",
            'description' => $description
            //ulaşım,teknoloji,bilim
        ]);
    }
}