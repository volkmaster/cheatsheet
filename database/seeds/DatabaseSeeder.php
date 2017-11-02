<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const LANGUAGES = [
        [
            'name'  => 'JavaScript',
            'image' => 'javascript'
        ],
        [
            'name'  => 'Java',
            'image' => 'java'
        ],
        [
            'name'  => 'C',
            'image' => 'c'
        ],
        [
            'name'  => 'C++',
            'image' => 'cpp'
        ],
        [
            'name'  => 'Python',
            'image' => 'python'
        ],
        [
            'name'  => 'Scala',
            'image' => 'scala'
        ],
        [
            'name'  => 'HTML',
            'image' => 'html'
        ],
        [
            'name'  => 'CSS',
            'image' => 'css'
        ]
    ];
    const N_CHEATSHEETS = 50;
    const N_KNOWLEDGE_PIECES = 200;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(CheatsheetsTableSeeder::class);
        $this->call(KnowledgePiecesTableSeeder::class);
    }
}
