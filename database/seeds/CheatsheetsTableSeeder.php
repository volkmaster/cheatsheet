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

        $idCount = 1;

        $knowledgePieces = [];
        foreach (self::LANGUAGES as $item) {
            $language = Language::where('name', $item['name'])->first();
            $knowledgePieces[$item['name']] = $language->knowledgePieces()->pluck('id')->all();
        }

        for ($i = 0; $i < self::N_CHEATSHEETS; $i++) {
            $languageName = self::LANGUAGES[rand(0, count(self::LANGUAGES) - 1)]['name'];

            $cheatsheet = new Cheatsheet;

            $cheatsheet->name = $languageName . ' cheatsheet ' . $i;

            $cheatsheet->user_id = $idCount;
            $idCount++;
            if($idCount > self::NUMBER_OF_USERS){
                $idCount = 1;
            }

            $language = Language::whereName($languageName)->first();
            $cheatsheet->language()->associate($language);

            $cheatsheet->saveOrFail();

            if (array_key_exists($languageName, $knowledgePieces)) {
                $values = [];

                $nKnowledgePieces = count($knowledgePieces[$languageName]);
                $indices = range(0, $nKnowledgePieces - 1);
                shuffle($indices);

                $positions = range(0, min([$nKnowledgePieces, self::MAX_KNOWLEDGE_PIECES_PER_CHEATSHEET]) - 1);
                shuffle($positions);
                $n = rand(0, count($positions));

                if ($n > 0) {
                    for ($j = 0; $j < $n; $j++) {
                        $id = $knowledgePieces[$languageName][$indices[$j]];
                        $position = $positions[$j];
                        $values[$id] = ['position' => $position];
                    }
                    $cheatsheet->knowledgePieces()->attach($values);
                }
            }
        }
    }
}
