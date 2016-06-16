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
            [ 'name' => 'Editor 1'],
            [ 'name' => 'Editor 2'],
            [ 'name' => 'Editor 3'],
            [ 'name' => 'Editor 4'],
            [ 'name' => 'Editor 5'],
            [ 'name' => 'Editor 6'],
            [ 'name' => 'Editor 7'],
            [ 'name' => 'Editor 8'],
            [ 'name' => 'Editor 9'],
            [ 'name' => 'Editor 10']
        ];

        DB::table('editor')->insert($data);
    }
}
