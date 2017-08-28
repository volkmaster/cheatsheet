<?php

use Illuminate\Database\Seeder;

use App\Cheatsheet;

class CheatsheetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cheatsheets')->delete();

        for ($i = 0; $i < 50; $i++) {
            $cheatsheet = new Cheatsheet;
            $cheatsheet->name = 'Cheatsheet ' . $i;
            $cheatsheet->saveOrFail();
        }
    }
}
