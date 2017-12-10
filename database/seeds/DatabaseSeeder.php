<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    const LANGUAGES = [
        [
            'name'      => 'Bash',
            'image'     => 'bash',
            'highlight' => 'bash'
        ],
        [
            'name'      => 'C',
            'image'     => 'c',
            'highlight' => 'cpp'
        ],
        [
            'name'      => 'C++',
            'image'     => 'cpp',
            'highlight' => 'cpp'
        ],
        [
            'name'      => 'C#',
            'image'     => 'csharp',
            'highlight' => 'cs'
        ],
        [
            'name'      => 'CoffeeScript',
            'image'     => 'coffeescript',
            'highlight' => ''
        ],
        [
            'name'      => 'CSS',
            'image'     => 'css',
            'highlight' => 'css'
        ],
        [
            'name'      => 'HTML',
            'image'     => 'html',
            'highlight' => 'xml'
        ],
        [
            'name'      => 'Java',
            'image'     => 'java',
            'highlight' => 'java'
        ],
        [
            'name'      => 'JavaScript',
            'image'     => 'javascript',
            'highlight' => 'javascript'
        ],
        [
            'name'      => 'JSON',
            'image'     => 'json',
            'highlight' => 'json'
        ],
        [
            'name'      => 'LESS',
            'image'     => 'less',
            'highlight' => 'less'
        ],
        [
            'name'      => 'Matlab',
            'image'     => 'matlab',
            'highlight' => 'matlab'
        ],
        [
            'name'      => 'PHP',
            'image'     => 'php',
            'highlight' => 'php'
        ],
        [
            'name'      => 'PowerShell',
            'image'     => 'powershell',
            'highlight' => 'powershell'
        ],
        [
            'name'      => 'Processing',
            'image'     => 'processing',
            'highlight' => 'processing'
        ],
        [
            'name'      => 'Python',
            'image'     => 'python',
            'highlight' => 'python'
        ],
        [
            'name'      => 'R',
            'image'     => 'r',
            'highlight' => 'r'
        ],
        [
            'name'      => 'Ruby',
            'image'     => 'ruby',
            'highlight' => 'ruby'
        ],
        [
            'name'      => 'Scala',
            'image'     => 'scala',
            'highlight' => 'scala'
        ],
        [
            'name'      => 'SCSS',
            'image'     => 'scss',
            'highlight' => 'scss'
        ],
        [
            'name'      => 'SQL',
            'image'     => 'sql',
            'highlight' => 'sql'
        ],
        [
            'name'      => 'TeX',
            'image'     => 'tex',
            'highlight' => 'tex'
        ],
        [
            'name'      => 'TypeScript',
            'image'     => 'typescript',
            'highlight' => 'typescript'
        ],
        [
            'name'      => 'VB.NET',
            'image'     => 'vbnet',
            'highlight' => 'vbnet'
        ],
        [
            'name'      => 'XML',
            'image'     => 'xml',
            'highlight' => 'xml'
        ]
    ];
    const N_CHEATSHEETS = 100;
    const N_KNOWLEDGE_PIECES = 1000;
    const MAX_KNOWLEDGE_PIECES_PER_CHEATSHEET = 15;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LanguagesTableSeeder::class);
        $this->call(KnowledgePiecesTableSeeder::class);
        $this->call(CheatsheetsTableSeeder::class);
    }
}
