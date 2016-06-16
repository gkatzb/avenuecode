<?php

use Illuminate\Database\Seeder;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'title' => 'Book 1', 'editor_id' => 1, 'year' => 2016, 'edition' => '1'],
            [ 'title' => 'Book 2', 'editor_id' => 2, 'year' => 2016, 'edition' => '3'],
            [ 'title' => 'Book 3', 'editor_id' => 3, 'year' => 2016, 'edition' => '5'],
            [ 'title' => 'Book 4', 'editor_id' => 4, 'year' => 2016, 'edition' => '2'],
            [ 'title' => 'Book 5', 'editor_id' => 5, 'year' => 2016, 'edition' => '10'],
            [ 'title' => 'Book 6', 'editor_id' => 6, 'year' => 2016, 'edition' => '4'],
            [ 'title' => 'Book 7', 'editor_id' => 7, 'year' => 2016, 'edition' => '7'],
            [ 'title' => 'Book 8', 'editor_id' => 8, 'year' => 2016, 'edition' => '9'],
            [ 'title' => 'Book 9', 'editor_id' => 9, 'year' => 2016, 'edition' => '6'],
            [ 'title' => 'Book 10', 'editor_id' => 10, 'year' => 2016, 'edition' => '8'],
        ];

        DB::table('book')->insert($data);
    }
}
