<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::all();
        foreach ($posts as $post) {
            $numbers = $this->randomGen(1, 12, 4);
            for ($i=1; $i<=4; $i++){
                $postTag = new PostTag();
                $postTag->post_id = $post->id;
                $postTag->tag_id = $numbers[$i-1];
                $postTag->save();
            }
        }
    }

    function randomGen($min, $max, $quantity) {

        $numbers = range($min, $max);
        shuffle($numbers);
        return array_slice($numbers, 0, $quantity);
    }
}