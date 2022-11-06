<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $content = "<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit at architectoobcaecati provident voluptatem nisi aut id nesciunt ut veniam!</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio consequunturtemporibus magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit.Hic velit dignissimos ipsam placeat dolorum enim sit aperiam quod! Doloredelectus veniam sapiente possimus, repellat culpa sequi ullam vitae deseruntnostrum beatae harum commodi debitis maiores? Soluta commodi maiores quidemrepudiandae natus porro illum architecto nemo.</p><p>Lorem ipsum dolor sit amet.</p>";
        Post::create([
            'title' => "Satürn'ün halkası",
            'slug' => Str::slug("Satürn'ün halkası"),
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 1days'),
            'images' => ['site/img/2.png'],
            'highlight' => '1',
            'is_active' => '1',
        ]);
        Post::create([
            'title' => "Trafik neden var",
            'slug' => Str::slug("Trafik neden var"),
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 2days'),
            'images' => ['site/img/1.png'],
            'highlight' => '1',
            'is_active' => '1',
        ]);
        Post::create([
            'title' => "Roketler nasıl çalışır",
            'slug' => Str::slug("Roketler nasıl çalışır"),
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 3days'),
            'images' => ['site/img/3.png'],
            'highlight' => '1',
            'is_active' => '0',
        ]);
        Post::create([
            'title' => "Transistör nedir",
            'slug' => Str::slug("Transistör nedir"),
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 4days'),
            'images' => ['site/img/4.png'],
            'highlight' => '0',
            'is_active' => '1',
        ]);
        Post::create([
            'title' => "Elektrikli araçlar nasıl çalışır",
            'slug' => Str::slug("Elektrikli araçlar nasıl çalışır"),
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 5days'),
            'images' => ['site/img/5.png'],
            'highlight' => '0',
            'is_active' => '1',
        ]);
    }
}
