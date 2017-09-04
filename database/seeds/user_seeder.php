<?php

use App\User;
use Illuminate\Database\Seeder;

class user_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            "username" => "agus24",
            "password" => bcrypt('rahasia'),
            "email" => "agusx244@gmail.com",
            "name" => "Gustiawan Ouwawi",
            "remember_token" => str_random(10)
        ]);
        factory(App\User::class,10)->create();
    }
}
