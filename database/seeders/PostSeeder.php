<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
        $category = Category::all();

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');       
        Post::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 
        

        for ($i=0; $i < 10; $i++) { 
            $posted = rand(0, 1) ? "yes" : "not";
            $id_category = Category::inRandomOrder()->first();
            Post::create([
                'title' => 'Post '.$i,
                'slug' => 'post-'.$i,
                'content' => Str::random(),
                'description' => Str::random(),
                'category_id' => $id_category,
                'posted' => $posted,
            ]);
        }
    }
}
