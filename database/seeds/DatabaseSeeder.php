<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        factory(\App\Post::class, 10)->create();
        factory(\App\User::class)->create(
            [
            'name' => 'Jorge',
            'email' => 'jorgerrubio@gmail.com',
            'password' => bcrypt(123456),
            'remember_token' => str_random(10),
            ]
        );
        factory(\App\User::class, 10)->create();

        // $this->call('UserTableSeeder');

        Model::reguard();
    }
}
