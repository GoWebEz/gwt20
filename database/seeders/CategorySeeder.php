<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
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
        Category::truncate();
        $categories = [
            ["name" => "Bayweb"],
            ["name" => "Water Watch"]
        ];
        DB::table('categories')->insert($categories);

        // foreach ($categories as  $category) {
        //     Category::create($category);
        // }
    }
}
