<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');       
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;'); 

        for ($i=0; $i < 10; $i++) { 
            Category::create([
                // 'title' => Str::random(),
                // 'slug' => Str::random()
                'title' => 'Category '.$i,
                'slug' => 'category-'.$i
            ]);
        }
    }
}
