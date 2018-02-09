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

        foreach (self::USER_NAMES as $name) {
            foreach (self::USER_LASTNAMES as $lastname) {
                $user = new User;
                $user->name = $name . ' ' . $lastname;
                $user->email = $name . '.' . $lastname . '@example.com';
                $user->password = password_hash('password', PASSWORD_BCRYPT);

                $user->saveOrFail();
            }
        }
    }
}
