<?php

use Illuminate\Database\Seeder;

use App\User;

class UsersTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();

        $user = new User;
        $user->name = 'John Doe';
        $user->email = 'John@example.com';
        $user->password = 'password';

        $user->saveOrFail();
    }
}
