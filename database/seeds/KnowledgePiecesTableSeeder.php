<?php

use Illuminate\Database\Seeder;

use App\Cheatsheet;
use App\KnowledgePiece;

class KnowledgePiecesTableSeeder extends Seeder
{
    const N = 200;
    const M = 25;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledge_pieces')->delete();

        $languages = ['JavaScript', 'Java', 'C', 'C++', 'Python', 'Scala', 'HTML', 'CSS'];

        for ($i = 0; $i < self::N; $i++) {
            $knowledgePiece = new KnowledgePiece;
            $knowledgePiece->description = $languages[rand(0, count($languages) - 1)] . ' knowledge piece';
            $knowledgePiece->code = 'arr = []; arr.push(2); arr.push(1); arr.sort(); print(arr);';
            $knowledgePiece->saveOrFail();

            $cheatsheetIds = Cheatsheet::pluck('id')->all();
            $ids = [];
            for ($j = 0; $j < rand(0, self::M); $j++) {
                $ids[] = $cheatsheetIds[rand(0, count($cheatsheetIds) - 1)];
            }
            $knowledgePiece->cheatsheets()->attach(array_unique($ids));
        }
    }
}
