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
       $user = App\User::create([
            'name' => 'sasho',
            'email' => 's@s.s',
            'password' => bcrypt('111111'),
            'admin' => 1
        ]);
        App\Profile::create([
            'user_id' => $user->id,
            'avatar' => '/uploads/avatar/liza.jpg',
            'about' => 'some text some text some text',
            'facebook' => 'facebook.co',
            'github' => 'github.com'
        ]);
    }
}
