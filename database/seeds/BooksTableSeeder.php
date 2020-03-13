<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('books')->insert([
            'id' => 1,
            'name' => 'Harry Potter and the Cursed Child',
            'category_id' => 1,
            'author_id' => 2,
            'shelf_id' => 1,
            'publisher_id' => 1,
            'ISBN' => '9781338099133',
            'book_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'key_word' => 'Magic, Powers, Wand',
            'user_id' => 2,
            'created_at' => '2018-11-25 03:21:24',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 1,
            'books_total_count' => 12,
            'books_available' => 12,
            'created_at' => '2018-11-25 03:21:24',
            'updated_at' => now(),
        ]);

        DB::table('books')->insert([
            'id' => 2,
            'name' => 'Game of Thrones',
            'category_id' => 1,
            'author_id' => 2,
            'shelf_id' => 1,
            'publisher_id' => 3,
            'ISBN' => '0-553-10354-7',
            'book_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'key_word' => 'Swords, kings,',
            'user_id' => 2,
            'created_at' => '2018-11-27 11:31:24',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 2,
            'books_total_count' => 8,
            'books_available' => 8,
            'created_at' => '2018-11-27 11:31:24',
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'id' => 3,
            'name' => 'Lord of The Rings',
            'category_id' => 1,
            'author_id' => 4,
            'shelf_id' => 2,
            'publisher_id' => 3,
            'ISBN' => '1487587',
            'book_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'key_word' => 'Swords, kings,',
            'user_id' => 5,
            'created_at' => '2018-11-23 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 3,
            'books_total_count' => 5,
            'books_available' => 5,
            'created_at' => '2018-11-23 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'id' => 4,
            'name' => "Harry Potter and the Philosopher's Stone",
            'category_id' => 1,
            'author_id' => 4,
            'shelf_id' => 2,
            'publisher_id' => 3,
            'ISBN' => '0-7475-3269-9',
            'book_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'key_word' => 'Swords, kings,',
            'user_id' => 5,
            'created_at' => '2018-11-23 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 4,
            'books_total_count' => 5,
            'books_available' => 5,
            'created_at' => '2018-11-23 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'id' => 5,
            'name' => "Mrs. Everything ",
            'category_id' => 1,
            'author_id' => 5,
            'shelf_id' => 2,
            'publisher_id' => 4,
            'ISBN' => '02-7ds3269-9',
            'book_description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
            'key_word' => 'Love, Fun,',
            'user_id' => 5,
            'created_at' => '2018-11-23 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 5,
            'books_total_count' => 23,
            'books_available' => 23,
            'created_at' => '2018-11-23 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'id' => 6,
            'name' => "Hamlet: The Tragedy of Hamlet",
            'category_id' => 4,
            'author_id' => 6,
            'shelf_id' => 3,
            'publisher_id' => 5,
            'ISBN' => '1979482055',
            'book_description' => "The Tragedy of Hamlet, Prince of Denmark, often shortened to Hamlet, is a tragedy written by William Shakespeare at an uncertain date between 1599 and 1602. One of the greatest plays of all time, the compelling tragedy of the tormented young prince of Denmark continues to capture the imaginations of modern audiences worldwide. William Shakespeare's Hamlet follows the young prince Hamlet home to Denmark to attend his father's funeral. Hamlet is shocked to find his mother already remarried to his Uncle Claudius, the dead king's brother.",
            'key_word' => 'Love, Fun,',
            'user_id' => 1,
            'created_at' => '2020-3-12 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 6,
            'books_total_count' => 6,
            'books_available' => 6,
            'created_at' => '2020-3-12 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books')->insert([
            'id' => 7,
            'name' => "Mrs. Dalloway",
            'category_id' => 4,
            'author_id' => 7,
            'shelf_id' => 3,
            'publisher_id' => 6,
            'ISBN' => '978-1946963000',
            'book_description' => "The Tragedy of Hamlet, Prince of Denmark, often shortened to Hamlet, is a tragedy written by William Shakespeare at an uncertain date between 1599 and 1602. One of the greatest plays of all time, the compelling tragedy of the tormented young prince of Denmark continues to capture the imaginations of modern audiences worldwide. William Shakespeare's Hamlet follows the young prince Hamlet home to Denmark to attend his father's funeral. Hamlet is shocked to find his mother already remarried to his Uncle Claudius, the dead king's brother.",
            'key_word' => 'Love, Fun,',
            'user_id' => 1,
            'created_at' => '2020-3-12 09:24:14',
            'updated_at' => now(),
        ]);
        DB::table('books_number')->insert([
            'book_id' => 7,
            'books_total_count' => 10,
            'books_available' => 10,
            'created_at' => '2020-3-12 09:24:14',
            'updated_at' => '2020-3-12 09:24:14',
        ]);
    }
}
