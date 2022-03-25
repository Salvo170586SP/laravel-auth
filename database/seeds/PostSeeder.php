<?php

use App\Models\Post;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
            $post = new Post();

            $post->title = $faker->text(30);
            $post->content = $faker->paragraph(2, false);
            $post->image = $faker->imageUrl(300, 300);
            $post->slug = Str::slug($post->title, '-');
            
            $post->save();
        }
    }
}
