<?php

use Illuminate\Database\Seeder;

use App\Language;

class LanguagesTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('languages')->delete();

        foreach (self::LANGUAGES as $item) {
            $language = new Language;

            $language->name = $item['name'];
            $language->image = '/images/' . $item['image'] . '.png';

            $language->saveOrFail();
        }
    }
}
