<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Foo';
        $user->email = 'foo@bar.com';
        $user->password = Hash::make('laravel1234');
        $user->is_admin = 1;
        $user->save();
    }
}
