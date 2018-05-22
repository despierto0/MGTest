<?php

use Illuminate\Database\Seeder;
use App\Product;
use App\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::truncate();

        $faker = \Faker\Factory::create();

        foreach (Category::all() as $category) {
            for ($i = 0; $i < 2; $i++) {
                Product::create([
                    'name'        => $faker->word,
                    'description' => $faker->words(5, true),
                    'image'       => 'default.jpeg',
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
