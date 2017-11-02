<?php

use Illuminate\Database\Seeder;

use App\Cheatsheet;
use App\Language;

class CheatsheetsTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cheatsheets')->delete();

        for ($i = 0; $i < self::N_CHEATSHEETS; $i++) {
            $languageName = self::LANGUAGES[rand(0, count(self::LANGUAGES) - 1)]['name'];

            $cheatsheet = new Cheatsheet;

            $cheatsheet->name = $languageName . ' cheatsheet ' . $i;

            $language = Language::whereName($languageName)->first();
            $cheatsheet->language()->associate($language);

            $cheatsheet->saveOrFail();
        }
    }
}
