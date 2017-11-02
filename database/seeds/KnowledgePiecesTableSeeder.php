<?php

use Illuminate\Database\Seeder;

use App\Cheatsheet;
use App\KnowledgePiece;
use App\Language;

class KnowledgePiecesTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledge_pieces')->delete();

        $cheatsheets = [];
        foreach (self::LANGUAGES as $item) {
            $language = Language::where('name', $item['name'])->first();
            $cheatsheets[$item['name']] = $language->cheatsheets()->pluck('id')->all();
        }

        for ($i = 0; $i < self::N_KNOWLEDGE_PIECES; $i++) {
            $languageName = self::LANGUAGES[rand(0, count(self::LANGUAGES) - 1)]['name'];

            $knowledgePiece = new KnowledgePiece;

            $knowledgePiece->description =  $languageName . ' knowledge piece ' . $i;

            $knowledgePiece->code = 'arr = [];\narr.push(2);\narr.push(1);\narr.sort();\nprint(arr);';

            $language = Language::whereName($languageName)->first();
            $knowledgePiece->language()->associate($language);

            $knowledgePiece->saveOrFail();

            if (array_key_exists($languageName, $cheatsheets)) {
                $ids = [];
                $nCheatsheets = rand(0, count($cheatsheets[$languageName]));
                for ($j = 0; $j < $nCheatsheets; $j++) {
                    $ids[] = $cheatsheets[$languageName][rand(0, count($cheatsheets[$languageName]) - 1)];
                }
                $knowledgePiece->cheatsheets()->attach(array_unique($ids));
            }
        }
    }
}
