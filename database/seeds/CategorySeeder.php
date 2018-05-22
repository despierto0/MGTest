<?php

use Illuminate\Database\Seeder;
use App\Category;

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

        $root = Category::create(['name' => 'Root']);
        $child1 = $root->children()->create(['name' => 'Child 1']);
        $child2 = $root->children()->create(['name' => 'Child 2']);
        $child1_1 = $child1->children()->create(['name' => 'Child 1.1']);
        $child1_2 = $child1->children()->create(['name' => 'Child 1.2']);
        $child2_1 = $child2->children()->create(['name' => 'Child 2.1']);
        $child2_2 = $child2->children()->create(['name' => 'Child 2.2']);
    }
}
