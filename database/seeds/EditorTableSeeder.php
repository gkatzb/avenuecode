<?php

use Illuminate\Database\Seeder;

class EditorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'editor' => 'Editor 1'],
            [ 'editor' => 'Editor 2'],
            [ 'editor' => 'Editor 3'],
            [ 'editor' => 'Editor 4'],
            [ 'editor' => 'Editor 5'],
            [ 'editor' => 'Editor 6'],
            [ 'editor' => 'Editor 7'],
            [ 'editor' => 'Editor 8'],
            [ 'editor' => 'Editor 9'],
            [ 'editor' => 'Editor 10']
        ];

        DB::table('editor')->insert($data);
    }
}
