<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'sasho',
            'email' => 's@s.s',
            'password' => bcrypt('password')
        ]);
    }
}
