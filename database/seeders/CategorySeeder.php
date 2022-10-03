<?php

namespace Database\Seeders;

use App\Models\Category;
use Database\Factories\ProductFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     dd  ( Category::factory(2)->create()->each(function ($category){
         Product::factory(rand(2, 4))->make()->each(function ($product) use ($category ){
        $category->products()->create($product->atributesToArray());
         });
     }));

    }
}
