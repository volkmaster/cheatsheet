<?php

use Illuminate\Database\Seeder;

use App\Cheatsheet;
use App\KnowledgePiece;

class KnowledgePiecesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('knowledge_pieces')->delete();

        $languages = ['JavaScript', 'Java', 'C', 'C++', 'Python', 'Scala', 'HTML', 'CSS'];

        for ($i = 0; $i < 200; $i++) {
            $knowledgePiece = new KnowledgePiece;
            $knowledgePiece->description = $languages[rand(0, count($languages) - 1)] . ' knowledge piece';
            $knowledgePiece->code = 'arr = []; arr.push(2); arr.push(1); arr.sort(); print(arr);';
            $knowledgePiece->saveOrFail();

            $firstId = Cheatsheet::pluck('id')->all()[0];
            $cheatsheetIds = [];
            for ($j = 0; $j < rand(0, 24); $j++) {
                $cheatsheetIds[] = rand($firstId, $firstId + 49);
            }
            $knowledgePiece->cheatsheets()->attach(array_unique($cheatsheetIds));
        }
    }
}
