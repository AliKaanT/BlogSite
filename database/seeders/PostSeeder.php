<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $content = "<h3>Satürnün halkası nedir?</h3><p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Odit at architectoobcaecati provident voluptatem nisi aut id nesciunt ut veniam!</p><p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Optio consequunturtemporibus magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit.Hic velit dignissimos ipsam placeat dolorum enim sit aperiam quod! Doloredelectus veniam sapiente possimus, repellat culpa sequi ullam vitae deseruntnostrum beatae harum commodi debitis maiores? Soluta commodi maiores quidemrepudiandae natus porro illum architecto nemo.</p><p>Lorem ipsum dolor sit amet.</p>";
        Post::create([
            'title' => "Satürn'ün halkası",
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 1days'),
            // uzay bilim
        ]);
        Post::create([
            'title' => "Trafik neden var",
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'highlight' => 1,
            'posted_at' => Carbon::parse('now - 2days'),
            // ulaşım
        ]);
        Post::create([
            'title' => "Roketler nasıl çalışır",
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'highlight' => 1,
            'posted_at' => Carbon::parse('now - 3days'),
            //uzay ulaşım
        ]);
        Post::create([
            'title' => "Transistör nedir",
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 4days'),
            //teknoloji
        ]);
        Post::create([
            'title' => "Elektrikli araçlar nasıl çalışır",
            'content' => $content,
            'preview_content' => substr($content, 0, 128),
            'posted_at' => Carbon::parse('now - 5days'),
            //ulaşım,teknoloji,bilim
        ]);
    }
}
