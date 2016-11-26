<?php

use Illuminate\Database\Seeder;
use App\Book;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<20;$i++) {
            Book::create(array(
                'title' => 'book_title',
                'price' => '19.99',
                'author' => 'author_name',
                'editor' => 'editor_name',
            ));
        }
    }
}
