<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Romance',
        ]);
        Category::create([
            'name' => 'Ficção',
        ]);
        Category::create([
            'name' => 'Drama',
        ]);
        Category::create([
            'name' => 'Biografia',
        ]);
    }
}
