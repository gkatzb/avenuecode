<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [ 'login' => 'uncle_bob', 'password' => Hash::make('@initial1')],
        ];

        DB::table('user')->insert($data);
    }
}
