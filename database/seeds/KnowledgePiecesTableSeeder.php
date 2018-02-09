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

        $idCount = 1;

        for ($i = 0; $i < self::N_KNOWLEDGE_PIECES; $i++) {
            $languageName = self::LANGUAGES[rand(0, count(self::LANGUAGES) - 1)]['name'];

            $knowledgePiece = new KnowledgePiece;

            $knowledgePiece->user_id = $idCount;
            $idCount++;
            if($idCount > self::NUMBER_OF_USERS){
                $idCount = 1;
            }

            $knowledgePiece->description =  $languageName . ' knowledge piece ' . $i;

            $knowledgePiece->code = "arr = [];\narr.push(2);\narr.push(1);\narr.sort();\nprint(arr);";

            $language = Language::whereName($languageName)->first();
            $knowledgePiece->language()->associate($language);

            $knowledgePiece->saveOrFail();
        }
    }
}
