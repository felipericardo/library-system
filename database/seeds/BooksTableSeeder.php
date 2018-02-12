<?php

use App\Models\Book;
use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::create([
            'category_id' => 3,
            'title' => 'O Rei Leão',
            'quantity' => 5,
        ]);
    }
}
